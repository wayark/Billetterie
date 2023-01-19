<?php

class MakeCreateEventStrategy implements CreateEventStrategy
{
    private string $error = '';

    public function handle(array $post): array
    {
        try {
            $data = $this->gatherData($post);
            $event = $this->createEvent($data);
            $eventDTO = new EventDTO();
            $eventDTO->add($event);
        } catch (ArtistAlreadyInBaseException $e) {
            $this->error = "L'article est déjà dans la base de données";
        } catch (EventAlreadyInBaseException $e) {
            $this->error = "L'événement est déjà dans la base de données";
        } catch (Exception $e) {
            $this->error = "Une erreur est survenue";
        }

        return array('error' => $this->error);
    }

    private function gatherData(array $post): array
    {
        $infos = array();
        $infos['name'] = htmlspecialchars($post['eventName']);
        $infos['description'] = htmlspecialchars($post['description']);
        $infos['country'] = htmlspecialchars($post['country']);
        $infos['city'] = htmlspecialchars($post['city']);
        $infos['place'] = htmlspecialchars($post['Hall']);
        $infos['address'] = htmlspecialchars($post['street']);
        $infos['date'] = htmlspecialchars($post['Date']);
        $infos['artist-stage'] = htmlspecialchars($post['artist-stage']);
        $infos['artist-first'] = htmlspecialchars($post['artist-first']);
        $infos['artist-last'] = htmlspecialchars($post['artist-last']);
        $infos['biographie'] = htmlspecialchars($post['biographie']);
        $infos['event-type-id'] = htmlspecialchars($post['event-type']);

        $infos['pricings'] = array();
        $maxPricingId = intval($post['last-pricing-id']);

        for ($i = 0; $i < $maxPricingId; $i++) {
            if (isset($post['pricing-name-' . $i]) && isset($post['pricing-price-' . $i])) {
                if ($post['pricing-name-' . $i] != "" && $post['pricing-price-' . $i] != "") {
                    $infos['pricings'][$i]['name'] = htmlspecialchars($post['pricing-name-' . $i]);
                    $infos['pricings'][$i]['price'] = htmlspecialchars($post['pricing-price-' . $i]);
                    $infos['pricings'][$i]['quantity'] = htmlspecialchars($post['pricing-max-quantity-' . $i]);
                }
            }
        }

        return $infos;
    }

    /**
     * Saves the image in the server in PATH_IMAGES . 'events'
     * @param int $maxSizeInMb
     * @return string The path to the saved image without the PATH_IMAGES part
     */
    private function processFileInput(int $maxSizeInMb): string
    {
        $maxSize = $maxSizeInMb * 1024 * 1024;
        $extensions = array('jpg', 'jpeg', 'png', 'gif');
        $path = PATH_IMAGES . 'events' . DIRECTORY_SEPARATOR;

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            if ($_FILES['image']['size'] <= $maxSize) {
                $fileInfo = pathinfo($_FILES['image']['name']);
                $extension = $fileInfo['extension'];
                if (in_array($extension, $extensions)) {
                    $name = $fileInfo['filename'] . '_' . time() . '.' . $extension;
                    move_uploaded_file($_FILES['image']['tmp_name'], $path . $name);
                    return 'events' . DIRECTORY_SEPARATOR . $name;
                }
            }
        }
        $this->error = "L'image n'a pas été envoyée";
        return '';
    }

    /**
     * @throws ArtistAlreadyInBaseException
     */
    private function createEvent(array $data): Event
    {
        $eventDAO = new EventDAO();
        $locationDAO = new EventLocationDAO();
        $eventTypeInfoDAO = new EventTypeDAO();
        $artistDAO = new ArtistDAO();

        $event = EventBuilder::createEvent()
            ->withId($eventDAO->getLastId() + 1)
            ->withLocation(new EventPlace($locationDAO->getLastId() + 1, $data['country'],
                $data['city'], $data['place'], $data['address']))
            ->withTypeEvent($eventTypeInfoDAO->getById($data['event-type-id']))
            ->withOrganizer($_SESSION['user'])
            ->withArtist(new Artist($artistDAO->getLastId() + 1, $data['artist-stage'],
                $data['artist-first'], $data['artist-last'], $data['biographie']))
            ->withName($data['name'])
            ->withDescription($data['description'])
            ->withDate($data['date'])
            ->withPhoto(new Picture($this->processFileInput(10), $data['name']))
            ->build();

        $locationDTO = new EventLocationDTO();
        $locationDTO->add($event->getEventPlace());

        $artistDTO = new ArtistDTO();
        $artistDTO->add($event->getArtist());

        $pricingDTO = new EventPricingDTO();
        $pricingDAO = new TicketPricingDAO();
        foreach ($data['pricings'] as $pricing) {
            $pricingDTO->add(new TicketPricing($pricingDAO->getLastId() + 1, $event, $pricing['name'], $pricing['price'], $pricing['quantity']));
        }

        return $event;
    }
}