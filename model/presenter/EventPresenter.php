<?php

class EventPresenter extends Presenter
{
    private array $display;
    private Event $eventToDisplay;

    public function __construct(?array $get, ?array $post)
    {
        parent::__construct($get, $post);
    }

    protected function checkProcess(): void
    {
        if (isset($this->get['event'])) {
            $this->eventToDisplay = $this->loadEvent();
        }
    }

    private function loadEvent(): Event
    {
        $eventDAO = new EventDAO();
        return $eventDAO->getById($this->get['event']);
    }


    /**
     * @inheritDoc
     */
    public function formatDisplay(): array
    {
        $this->display = array(
            'eventName' => $this->eventToDisplay->getEventInfo()->getEventName(),
            'eventPicture' => $this->eventToDisplay->getEventInfo()->getPicture()->getPicturePath(),
            'eventPictureDescription' => $this->eventToDisplay->getEventInfo()->getPicture()->getPictureDescription(),
            'eventDate' => DateDisplayService::formatDatetime($this->eventToDisplay->getEventInfo()->getEventDate()),
            'eventDescription' => $this->eventToDisplay->getEventInfo()->getEventDescription(),
            'eventPlaceName' => $this->eventToDisplay->getEventPlace()->getPlaceName(),
            'eventPlaceStreet' => $this->eventToDisplay->getEventPlace()->getStreet(),
            'eventPlaceCity' => $this->eventToDisplay->getEventPlace()->getCity(),
            'eventPlaceCountry' => $this->eventToDisplay->getEventPlace()->getCountry(),
            'eventId' => $this->eventToDisplay->getIdEvent(),
        );

        $this->display['pricings'] = $this->formatTicketDisplay($this->eventToDisplay);
        $this->display['pricingsSelect'] = $this->formatPrincingChoice($this->eventToDisplay);

        return $this->display;
    }

    public function formatDisplayById($id, $type, $quantity)
    {
        $pricingDAO = new TicketPricingDAO();
        $pricing = $pricingDAO->getById($type);
        $typeofplace = $pricing->getName();

        $tmp = $quantity . " place";
        if ($quantity > 1) {
            $tmp .= "s";
        }

        $event = $this->eventToDisplay;
        $displayString = "";

        if ($event->getIdEvent() == $id) {
            $event = $this->eventToDisplay;
            $displayString .= '<div class=events>';
            $displayString .= '<div class=eventimg>';
            $displayString .= '<a href="?page=event&event=' . $event->getIdEvent() . '">';
            $displayString .= '<img src="' . $event->getEventInfo()->getPicture()->getPicturePath() . '" draggable="false">';
            $displayString .= '</a>';
            $displayString .= '</div>';
            $displayString .= '<div class="eventtext-container">';
            $displayString .= '<div id="containertextleft">';
            $displayString .= '<p class="eventtitle-cart eventtext">' . $event->getEventInfo()->getEventName() . '</p>';
            $displayString .= '<p class="eventdate eventtext">' . DateDisplayService::formatDatetime($event->getEventInfo()->getEventDate()) . '</p>';
            $displayString .= '<p class="eventdesc eventtext">' . $event->getEventInfo()->getEventDescription() . '</p>';
            $displayString .= "</div>";
            $displayString .= '<div id="containertextright">';
            $displayString .= '<p class="eventplace eventtext">' . $event->getEventPlace()->getCountry() . '</p>';
            $displayString .= '<p class="eventcity eventext">' . $event->getEventPlace()->getCity() . '</p>';
            $displayString .= '<p id="type-place-recap-text">' . $typeofplace . '</p>';
            $displayString .= '<p id="quantity-recap-text">' . $tmp . '</p>';
            $displayString .= "</div>";
            $displayString .= "</div></div>";
        }
        $display['event'] = $displayString;
        return $display;
    }

    private function formatTicketDisplay(Event $evt) : string
    {
        $ticketPricingDAO = new TicketPricingDAO();
        $pricings = $ticketPricingDAO->getPricingsForEventId($evt->getIdEvent());
        $displayString = "";
        foreach ($pricings->getPricingList() as $pricing) {
            $displayString .= "<p>" . $pricing->getName() . " : " . $pricing->getPrice() . "€ - " .
                NumberOfTicketsService::getNumberOfRemainingTicketsForPricing($pricing) .
                " / " . NumberOfTicketsService::getNumberOfRemainingTicketsForPricing($pricing) . " places restantes</p>";
        }
        return $displayString;
    }

    private function formatPrincingChoice(Event $evt) : string
    {
        $ticketPricingDAO = new TicketPricingDAO();
        $pricings = $ticketPricingDAO->getPricingsForEventId($evt->getIdEvent());
        $displayString = "<select id=\"type-place\" name=\"type\">";
        foreach ($pricings->getPricingList() as $pricing) {
            $displayString .= "<option value=\"" . $pricing->getIdTicketPricing() . "\">" . $pricing->getName() . "</option>";
        }
        $displayString .= "</select>";
        return $displayString;
    }
}