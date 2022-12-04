<?php

class EventDAO extends DAO
{
    /**
     * @throws Exception
     */
    public function getAllEvents() : array {
        $userDAO = new UserDAO();
        $eventTypeDAO = new EventTypeDAO();
        $artistDAO = new ArtistDAO();

        $sql = "SELECT * FROM event";
        $result = $this->queryAll($sql);
        $events = array();
        foreach ($result as $row) {
            $idEvent = $row['idEvent'];
            $tmp = EventBuilder::createEvent()
                ->withId($idEvent)
                ->withName($row['eventName'])
                ->withCountry($row['country'])
                ->withCity($row['city'])
                ->withHall($row['hall'])
                ->withDate($row['eventDate'])
                ->withNbPlaces(intval($row['NbPlacesPit']), intval($row['NbSeatsStaircase']));

            // Missing : TypeEvent, Picture, Organizer, Artist
            $eventTypeResult = $eventTypeDAO->getEventTypeById($row['idEventType']);
            if ($eventTypeResult != null) {
                $tmp->withTypeEvent($eventTypeResult);
            }


        }
        return $events;
    }
}