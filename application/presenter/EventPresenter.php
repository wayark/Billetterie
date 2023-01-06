<?php

require_once PATH_MODELS . "Presenter.php";
require_once PATH_MODELS . 'database/dao/EventDAO.php';
require_once PATH_MODELS . 'Event.php';
require_once './application/display/formatDate.php';

class EventPresenter extends Presenter
{
    private array $display;
    private Event $eventToDisplay;

    public function __construct(?array $get, ?array $post)
    {
        parent::__construct($get, $post);
    }

    protected function checkProcess() : void
    {
        if (isset($this->get['event'])) {
            $this->eventToDisplay = $this->loadEvent();
        }
    }

    private function loadEvent() : Event
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
            'eventDate' => format_datetime($this->eventToDisplay->getEventInfo()->getEventDate()),
            'eventDescription' => $this->eventToDisplay->getEventInfo()->getEventDescription(),
            'eventPlaceName' => $this->eventToDisplay->getEventPlace()->getPlaceName(),
            'eventPlaceStreet' => $this->eventToDisplay->getEventPlace()->getStreet(),
            'eventPlaceCity' => $this->eventToDisplay->getEventPlace()->getCity(),
            'eventPlaceCountry' => $this->eventToDisplay->getEventPlace()->getCountry(),
            'eventPlaceNbPlacesPit' => $this->eventToDisplay->getEventPlace()->getNbPlacesPit(),
            'eventPlaceNbPlacesStair' => $this->eventToDisplay->getEventPlace()->getNbPlacesStair(),
        );
        return $this->display;
    }

    public function formatDisplayById($id, $type, $quantity) {
        if ($type == "pit") {
            $typeofplace = "Fosse";
        } else {
            $typeofplace = "Gradin";
        }

        $quantity = $quantity . " place";
        if ($quantity > 1) {
            $quantity .= "s";
        }

        $event = $this->eventToDisplay;
        $displayString = "";

        if($event->getIdEvent() == $id) {
            $event = $this->eventToDisplay;
            $displayString .= '<div class=events>';
            $displayString .= '<div class=eventimg>';
            $displayString .= '<a href="?page=event&event='. $event->getIdEvent().'">';
            $displayString .= '<img src="' . $event->getEventInfo()->getPicture()->getPicturePath() . '" draggable="false">';
            $displayString .= '</a>';
            $displayString .= '</div>';
            $displayString .= '<div class="eventtext-container">';
            $displayString .= '<div id="containertextleft">';
            $displayString .= '<p class="eventtitle-cart eventtext">' . $event->getEventInfo()->getEventName() . '</p>';
            $displayString .= '<p class="eventdate eventtext">' . format_datetime($event->getEventInfo()->getEventDate()) . '</p>';
            $displayString .= '<p class="eventdesc eventtext">' . $event->getEventInfo()->getEventDescription() . '</p>';
            $displayString .= "</div>";
            $displayString .= '<div id="containertextright">';
            $displayString .= '<p class="eventplace eventtext">' . $event->getEventPlace()->getCountry() . '</p>';
            $displayString .= '<p class="eventcity eventext">' . $event->getEventPlace()->getCity() . '</p>';
            $displayString .= '<p id="type-place-recap-text">'. $typeofplace .'</p>';
            $displayString .= '<p id="quantity-recap-text">'. $quantity .'</p>';
            $displayString .= "</div>";
            $displayString .= "</div></div>";
        }
        $display['event'] = $displayString;
        return $display;
    }

    public function getEventToDisplay() : Event
    {
        return $this->eventToDisplay;
    }
}