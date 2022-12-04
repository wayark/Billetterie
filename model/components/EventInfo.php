<?php

class EventInfo
{
    private string $eventDate;
    private string $eventType;
    private string $picturePath;
    private string $eventName;

    public function __construct(string $eventName = "",
                                string $eventDate = "",
                                string $eventType = "",
                                string $picturePath = "")
    {
        $this->eventName = $eventName;
        $this->eventDate = $eventDate;
        $this->eventType = $eventType;
        $this->picturePath = $picturePath;
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
     * @return string
     */
    public function getEventType(): string
    {
        return $this->eventType;
    }

    /**
     * @param string $eventType
     */
    public function setEventType(string $eventType): void
    {
        $this->eventType = $eventType;
    }

    /**
     * @return string
     */
    public function getPicturePath(): string
    {
        return $this->picturePath;
    }

    /**
     * @param string $picturePath
     */
    public function setPicturePath(string $picturePath): void
    {
        $this->picturePath = $picturePath;
    }
}
