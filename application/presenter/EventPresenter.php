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
}