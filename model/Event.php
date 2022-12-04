<?php

require_once 'components/EventInfo.php';
require_once 'components/EventPlace.php';
require_once 'User.php';

class Event
{
    private int $idEvent;
    private EventInfo $_eventInfo;
    private EventPlace $_eventPlace;
    private User $organizer;
    private string $artist;

    public function __construct(int        $idEvent = -1,
                                EventInfo  $eventInfo = null,
                                EventPlace $eventPlace = null,
                                User       $organizer = null,
                                string     $artist = "")
    {
        if ($eventInfo == null) {
            $eventInfo = new EventInfo();
        }
        if ($eventPlace == null) {
            $eventPlace = new EventPlace();
        }
        if ($organizer == null) {
            $organizer = new User(-1, "", "", "", "", "", "");
        }

        $this->idEvent = $idEvent;
        $this->_eventInfo = $eventInfo;
        $this->_eventPlace = $eventPlace;
        $this->organizer = $organizer;
        $this->artist = $artist;
    }

    /**
     * @return int
     */
    public function getIdEvent(): int
    {
        return $this->idEvent;
    }

    /**
     * @param int $idEvent
     */
    public function setIdEvent(int $idEvent): void
    {
        $this->idEvent = $idEvent;
    }

    /**
     * @return EventInfo
     */
    public function getEventInfo(): EventInfo
    {
        return $this->_eventInfo;
    }

    /**
     * @param EventInfo $eventInfo
     */
    public function setEventInfo(EventInfo $eventInfo): void
    {
        $this->_eventInfo = $eventInfo;
    }

    /**
     * @return EventPlace
     */
    public function getEventPlace(): EventPlace
    {
        return $this->_eventPlace;
    }

    /**
     * @param EventPlace $eventPlace
     */
    public function setEventPlace(EventPlace $eventPlace): void
    {
        $this->_eventPlace = $eventPlace;
    }

    /**
     * @return User
     */
    public function getOrganizer(): User
    {
        return $this->organizer;
    }

    /**
     * @param User $organizer
     */
    public function setOrganizer(User $organizer): void
    {
        $this->organizer = $organizer;
    }

    /**
     * @return string
     */
    public function getArtist(): string
    {
        return $this->artist;
    }

    /**
     * @param string $artist
     */
    public function setArtist(string $artist): void
    {
        $this->artist = $artist;
    }
}