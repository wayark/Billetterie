<?php

class EventInfo
{
    private string $eventDate;
    private EventType $eventType;
    private Picture $picture;
    private string $eventName;
    private string $eventDescription;

    public function __construct(string    $eventName = "",
                                string    $eventDate = "",
                                EventType $eventType = null,
                                Picture   $picture = null,
                                string    $eventDescription = "")
    {
        if ($picture == null) {
            $picture = new Picture();
        }

        if ($eventType == null) {
            $eventType = new EventType(-1, "");
        }

        $this->eventName = $eventName;
        $this->eventDate = $eventDate;
        $this->eventType = $eventType;
        $this->picture = $picture;
        $this->eventDescription = $eventDescription;;
    }

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return $this->eventName;
    }

    /**
     * @param string $eventName
     */
    public function setEventName(string $eventName): void
    {
        $this->eventName = $eventName;
    }

    /**
     * @return string
     */
    public function getEventDate(): string
    {
        return $this->eventDate;
    }

    /**
     * @param string $eventDate
     */
    public function setEventDate(string $eventDate): void
    {
        $this->eventDate = $eventDate;
    }

    /**
     * @return EventType
     */
    public function getEventType(): EventType
    {
        return $this->eventType;
    }

    /**
     * @param EventType $eventType
     */
    public function setEventType(EventType $eventType): void
    {
        $this->eventType = $eventType;
    }

    /**
     * @return Picture
     */
    public function getPicture(): Picture
    {
        return $this->picture;
    }

    /**
     * @param Picture $picture
     */
    public function setPicture(Picture $picture): void
    {
        $this->picture = $picture;
    }

    /**
     * @return string
     */
    public function getEventDescription(): string
    {
        return $this->eventDescription;
    }

    /**
     * @param string $eventDescription
     */
    public function setEventDescription(string $eventDescription): void
    {
        $this->eventDescription = $eventDescription;
    }

}
