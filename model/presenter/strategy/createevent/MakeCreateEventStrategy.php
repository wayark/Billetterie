<?php

class MakeCreateEventStrategy implements CreateEventStrategy
{
    private string $error = '';
    private array $files;
    private array $post;

    public function handle(array $post, array $files): array
    {
        $this->files = $files;
        $this->post = $post;
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
            if (isset($post['pricing-name-' . $i]) && isset($post['pricing-price-' . $i]) && isset($post['pricing-max-quantity-' . $i]))
            {
                if ($post['pricing-name-' . $i] != "" && $post['pricing-price-' . $i] != "") {
                    $infos['pricings'][$i]['name'] = htmlspecialchars($post['pricing-name-' . $i]);
                    $infos['pricings'][$i]['price'] = htmlspecialchars($post['pricing-price-' . $i]);
                    $infos['pricings'][$i]['quantity'] = htmlspecialchars($post['pricing-max-quantity-' . $i]);
                }
            }
        }

        return $infos;
    }

    private function processFileInput(Event $event, string $path, int $max_size_megaoctet = 5): ?string
    {
        // Récupération des données du fichier
        $file = $this->files['image-event'];
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];

        // Vérification de l'extension du fichier
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array($file_ext, $allowed_extensions)) {
            $this->error = "L'extension du fichier n'est pas valide.";
            return null;
        }

        // Vérification de la taille du fichier
        if ($file_size > $max_size_megaoctet * 1048576) {
            $this->error = "Fichier trop volumineux";
            return null;
        }

        // Vérification des erreurs de chargement du fichier
        if ($file_error !== 0) {
            $this->error = "Une erreur est survenue lors du chargement du fichier.";
            return null;
        }

        // Déplacement du fichier du répertoire temporaire vers le répertoire de destination
        $file_destination = $path . '/' . $file_name;
        if (move_uploaded_file($file_tmp, $file_destination)) {
            $event->getEventInfo()->setPicture(new Picture(substr($file_destination, strlen(PATH_IMAGES)), $file_name));
            return $file_destination;
        } else {
            $this->error = "Une erreur est survenue lors du déplacement du fichier.";
        }

        return null;
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
            ->build();

        $picture = $this->processFileInput($event, PATH_IMAGES . "events");
        $event->getEventInfo()->setPicture(new Picture(substr($picture, strlen(PATH_IMAGES)), $event->getEventInfo()->getEventName()));
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