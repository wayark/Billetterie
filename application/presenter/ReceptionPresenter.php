<?php

require_once './model/Presenter.php';
require_once './model/database/dao/EventDAO.php';
require_once './model/Event.php';
require_once './application/display/formatDate.php';

class ReceptionPresenter extends Presenter
{
    private array $events;

    /**
     * @inheritDoc
     */
    public function __construct(array $get = null, array $post = null)
    {
        parent::__construct($get, $post);
    }

    protected function checkProcess(): void
    {
        $eventDAO = new EventDAO();
        try {
            $this->events = $eventDAO->getAll();
        } catch (Exception $e) {

        }
    }

    /**
     * @inheritDoc
     */
    public function formatDisplay(): array
    {
        $display = array();
        $displayString = "";
        for ($i = 0; $i < count($this->events) && $i <= 5; $i++) {
            $event = $this->events[$i];
            $displayString .= '<div class=events>';
            $displayString .= '<div class=eventimg>';
            $displayString .= '<a href="?page=event&event=' . $event->getIdEvent() . '">';
            $displayString .= '<img src="' . $event->getEventInfo()->getPicture()->getPicturePath() . '" alt="' . $event->getEventInfo()->getPicture()->getPictureDescription() . '">';
            $displayString .= '</a>';
            $displayString .= '</div>';
            $displayString .= '<div class="eventtext-container">';
            $displayString .= '<div id="containertextleft">';
            $displayString .= '<p class="eventtitle eventtext">' . $event->getEventInfo()->getEventName() . '</p>';
            $displayString .= '<p class="eventdate eventtext">' . format_datetime($event->getEventInfo()->getEventDate()) . '</p>';
            $displayString .= '<p class="eventdesc eventtext">' . $event->getEventInfo()->getEventDescription() . '</p>';
            $displayString .= "</div>";
            $displayString .= '<div id="containertextright">';
            $displayString .= '<p class="eventplace eventtext">' . $event->getEventPlace()->getCountry() . '</p>';
            $displayString .= '<p class="eventcity eventext">' . $event->getEventPlace()->getCity() . '</p>';
            $displayString .= '<p class="eventplacesremaining eventtext">' . strval($event->getEventPlace()->getNbPlacesPit() + $event->getEventPlace()->getNbPlacesStair()) . ' places restantes' . '</p>';
            $displayString .= "</div>";
            $displayString .= "</div></div>";
        }
        $display['events'] = $displayString;
        return $display;
    }

    /**
     * @inheritDoc
     */
    public function formatDisplayById($id, $type) : array {
        if ($type == "pit") {
            $typeofplace = "Fosse";
        } else {
            $typeofplace = "Gradin";
        }
        $display = array();
        $displayString = "";
        for ($i = 0; $i < count($this->events) && $i <= 5; $i++) {
            $event = $this->events[$i];
            if($event->getIdEvent() == $id) {
                $event = $this->events[$i];
                $displayString .= '<div class=events>';
                $displayString .= '<div class=eventimg>';
                $displayString .= '<div>';
                $displayString .= '<img src="' . $event->getEventInfo()->getPicture()->getPicturePath() . '" draggable="false">';
                $displayString .= '</div>';
                $displayString .= '</div>';
                $displayString .= '<div class="eventtext-container">';
                $displayString .= '<div id="containertextleft">';
                $displayString .= '<p class="eventtitle eventtext">' . $event->getEventInfo()->getEventName() . '</p>';
                $displayString .= '<p class="eventdate eventtext">' . format_datetime($event->getEventInfo()->getEventDate()) . '</p>';
                $displayString .= '<p class="eventdesc eventtext">' . $event->getEventInfo()->getEventDescription() . '</p>';
                $displayString .= "</div>";
                $displayString .= '<div id="containertextright">';
                $displayString .= '<p class="eventplace eventtext">' . $event->getEventPlace()->getCountry() . '</p>';
                $displayString .= '<p class="eventcity eventext">' . $event->getEventPlace()->getCity() . '</p>';
                $displayString .= '<p id="type-place">'. $typeofplace .'</p>';
                $displayString .= "</div>";
                $displayString .= "</div></div>";
            }
        }
        $display['event'] = $displayString;
        return $display;
    }
}