<?php

require_once '../../Event.php';
require_once '../EventPlace.php';
require_once '../EventInfo.php';

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

    public function withHall(string $hall): EventBuilder
    {
        $this->_event->getEventPlace()->setHall($hall);
        return $this;
    }

    public function withDate(string $date): EventBuilder
    {
        $this->_event->getEventInfo()->setEventDate($date);
        return $this;
    }

    public function withTypeEvent(int $typeEvent): EventBuilder
    {
        $this->_event->getEventInfo()->setEventType($typeEvent);
        return $this;
    }

    public function withNbPlaces(int $nbPlacesPit, int $nbPlacesStair): EventBuilder
    {
        $this->_event->getEventPlace()->setNbPlacesPit($nbPlacesPit);
        $this->_event->getEventPlace()->setNbPlacesStair($nbPlacesStair);
        return $this;
    }

    public function withOrganizer(User $organizer): EventBuilder
    {
        $this->_event->setOrganizer($organizer);
        return $this;
    }

    public function withArtiste(int $artiste): EventBuilder
    {
        $this->_event->setArtist($artiste);
        return $this;
    }

    public function withPhoto(int $photo): EventBuilder
    {
        $this->_event->getEventInfo()->setPicturePath($photo);
        return $this;
    }

    public function build(): Event
    {
        return $this->_event;
    }
}