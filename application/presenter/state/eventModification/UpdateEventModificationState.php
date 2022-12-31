<?php

require_once PATH_PRESENTER . 'state/eventModification/EventModificationState.php';
require_once PATH_DAO . 'EventDAO.php';
require_once PATH_DTO . 'EventDTO.php';
require_once PATH_DAO . 'EventPricingDAO.php';
require_once PATH_DTO . 'EventPricingDTO.php';
require_once PATH_APPLICATION . 'display/formatDate.php';

class UpdateEventModificationState implements EventModificationState
{

    private array $get;
    private array $post;
    private Event $currentEvent;


    public function handle(array $get, array $post): array
    {
        $eventDAO = new EventDAO();
        $eventDTO = new EventDTO();

        $this->get = $get;
        $this->post = $post;
        $this->currentEvent = $eventDAO->getById($this->get['event']);

        if (isset($this->post["resume"]) && !empty($this->post["resume"])) {
            $resume = $this->post["resume"];
            $this->currentEvent->getEventInfo()->setEventDescription($resume);
        }

        if (isset($this->post["country"]) && isset($this->post["city"]) && isset($this->post["street"]) &&
            !empty($this->post["country"]) && !empty($this->post["city"]) && !empty($this->post["street"])) {
            $this->updateLocation();
        }

        if (isset($this->post["date"]) && !empty($this->post["date"])) {
            $date = $this->post["date"];
            $this->currentEvent->getEventInfo()->setEventDate($date);
        }

        if (isset($this->post["ticketNumberS"]) && isset($this->post["ticketNumberP"]) &&
            isset($this->post["ticketNumberF"]) && !empty($this->post["ticketNumberS"])) {
            $this->updateNbPlace();
        }

        if (isset($this->post["ticketPriceG"]) && isset($this->post["ticketPriceF"])
            && !empty($this->post["ticketPriceG"]) && !empty($this->post["ticketPriceF"])) {
            $this->updatePrices();
        }

        $eventDTO->update($this->currentEvent);

        return array(
            "type" => "success",
            "event" => $this->currentEvent
        );
    }

    private function updatePrices(): void
    {
        $pricingDAO = new EventPricingDAO();
        $pricingDTO = new EventPricingDTO();

        $ticketPriceG = $this->post["ticketPriceG"];
        $ticketPriceF = $this->post["ticketPriceF"];

        $lastId = $pricingDAO->getLastId();
        $this->currentEvent->getEventInfo()->addPrice(new EventPricing($lastId+1, "Gradin", $ticketPriceG));
        $this->currentEvent->getEventInfo()->addPrice(new EventPricing($lastId+2, "Fosse", $ticketPriceF));

        $pricingDTO->add($this->currentEvent);
    }

    private function updateNbPlace()
    {
        $ticketNumberS = $this->post["ticketNumberS"];
        $ticketNumberP = $this->post["ticketNumberP"];
        $this->currentEvent->getEventPlace()->setNbPlacesPit($ticketNumberP);
        $this->currentEvent->getEventPlace()->setNbPlacesStair($ticketNumberS);
    }

    private function updateLocation()
    {
        $country = $this->post["country"];
        $city = $this->post["city"];
        $street = $this->post["street"];

        $this->currentEvent->getEventPlace()->setCountry($country);
        $this->currentEvent->getEventPlace()->setCity($city);
        $this->currentEvent->getEventPlace()->setStreet($street);
    }

}