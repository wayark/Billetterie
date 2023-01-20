<?php

class Event
{
    private int $idEvent;
    private EventInfo $_eventInfo;
    private EventPlace $_eventPlace;
    private User $organizer;
    private Artist $artist;

    public function __construct(int        $idEvent = -1,
                                EventInfo  $eventInfo = null,
                                EventPlace $eventPlace = null,
                                User       $organizer = null,
                                Artist     $artist = null)
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

        if ($artist == null) {
            $artist = new Artist(-1, "", "", "", "");
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
     * @return Artist
     */
    public function getArtist(): Artist
    {
        return $this->artist;
    }

    /**
     * @param Artist $artist
     */
    public function setArtist(Artist $artist): void
    {
        $this->artist = $artist;
    }

}