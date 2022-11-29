<?php

class EventBuilder
{
    private Event $_event;

    private function __construct()
    {
        $this->_event = new Event();
    }

    public static function createEvent() : EventBuilder
    {
        return new EventBuilder();
    }

    public function withId(int $id) : EventBuilder
    {
        $this->_event->setIdEvent($id);
        return $this;
    }

    public function withName(string $name) : EventBuilder
    {
        $this->_event->setName($name);
        return $this;
    }

    public function withCountry(string $country) : EventBuilder
    {
        $this->_event->setCountry($country);
        return $this;
    }

    public function withCity(string $city) : EventBuilder
    {
        $this->_event->setCity($city);
        return $this;
    }

    public function withHall(string $hall) : EventBuilder
    {
        $this->_event->setHall($hall);
        return $this;
    }

    public function withDate(string $date) : EventBuilder
    {
        $this->_event->setDate($date);
        return $this;
    }

    public function withTypeEvent(int $typeEvent) : EventBuilder
    {
        $this->_event->setTypeEvent($typeEvent);
        return $this;
    }

    public function withNbPlaces(int $nbPlaces) : EventBuilder
    {
        $this->_event->setNbplace($nbPlaces);
        return $this;
    }

    public function withOrganizer(int $organizer) : EventBuilder
    {
        $this->_event->setOrganizer($organizer);
        return $this;
    }

    public function withArtiste(int $artiste) : EventBuilder
    {
        $this->_event->setArtiste($artiste);
        return $this;
    }

    public function withPhoto(int $photo) : EventBuilder
    {
        $this->_event->setPhoto($photo);
        return $this;
    }

    public function build() : Event
    {
        return $this->_event;
    }
}