<?php

class EventBuilder
{
    private Event $_event;

    private function __construct()
    {
        $this->_event = new Event();
    }

    public static function createEvent(): EventBuilder
    {
        return new EventBuilder();
    }

    public function withId(int $id): EventBuilder
    {
        $this->_event->setIdEvent($id);
        return $this;
    }

    public function withName(string $name): EventBuilder
    {
        $this->_event->getEventInfo()->setEventName($name);
        return $this;
    }

    public function withCountry(string $country): EventBuilder
    {
        $this->_event->getEventPlace()->setCountry($country);
        return $this;
    }

    public function withCity(string $city): EventBuilder
    {
        $this->_event->getEventPlace()->setCity($city);
        return $this;
    }

    public function withPlaceName(string $hall): EventBuilder
    {
        $this->_event->getEventPlace()->setPlaceName($hall);
        return $this;
    }

    public function withDate(string $date): EventBuilder
    {
        $this->_event->getEventInfo()->setEventDate($date);
        return $this;
    }

    public function withTypeEvent(EventType $typeEvent): EventBuilder
    {
        $this->_event->getEventInfo()->setEventType($typeEvent);
        return $this;
    }

    public function withOrganizer(User $organizer): EventBuilder
    {
        $this->_event->setOrganizer($organizer);
        return $this;
    }

    public function withArtist(Artist $artiste): EventBuilder
    {
        $this->_event->setArtist($artiste);
        return $this;
    }

    public function withPhoto(Picture $photo): EventBuilder
    {
        $this->_event->getEventInfo()->setPicture($photo);
        return $this;
    }

    public function withDescription(string $description) : EventBuilder
    {
        $this->_event->getEventInfo()->setEventDescription($description);
        return $this;
    }

    public function withStreet(string $stree) : EventBuilder
    {
        $this->_event->getEventPlace()->setStreet($stree);
        return $this;
    }

    public function withIdLocation(int $idLocation) : EventBuilder
    {
        $this->_event->getEventPlace()->setIdLocation($idLocation);
        return $this;
    }

    public function withLocation(EventPlace $location) : EventBuilder
    {
        $this->_event->setEventPlace($location);
        return $this;
    }

    public function build(): Event
    {
        return $this->_event;
    }
}