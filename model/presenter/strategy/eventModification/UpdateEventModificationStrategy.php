<?php

class UpdateEventModificationStrategy implements EventModificationStrategy
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

        $this->updatePricing();

        $eventDTO->update($this->currentEvent);

        return array(
            "type" => "success",
            "event" => $this->currentEvent
        );
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

    private function updatePricing()
    {
        $pricingDAO = new TicketPricingDAO();
        $pricings = $pricingDAO->getPricingsForEventId($this->currentEvent->getIdEvent());

        $pricingDTO = new EventPricingDTO();

        foreach ($pricings->getPricingList() as $pricing) {
            if (isset($this->post['quantity-' . $pricing->getIdTicketPricing()])
                && $this->post['quantity-' . $pricing->getIdTicketPricing()] != "") {
                $pricing->setMaxQuantity($this->post['quantity-' . $pricing->getIdTicketPricing()]);
            }

            if (isset($this->post['price-' . $pricing->getIdTicketPricing()])
                && $this->post['price-' . $pricing->getIdTicketPricing()] != "") {
                $pricing->setPrice($this->post['price-' . $pricing->getIdTicketPricing()]);
            }

            $pricingDTO->update($pricing);
        }
    }

}