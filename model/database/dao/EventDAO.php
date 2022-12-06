<?php

require_once './model/database/DAO.php';
require_once './model/database/dao/UserDAO.php';
require_once './model/database/dao/EventTypeDAO.php';
require_once './model/database/dao/ArtistDAO.php';
require_once './model/database/dao/PictureDAO.php';
require_once './model/components/builder/EventBuilder.php';

class EventDAO extends DAO
{
    /**
     * @throws Exception
     */
    public function getAllEvents() : array {
        $sql = "SELECT * FROM event";
        $result = $this->queryAll($sql);
        $events = array();
        if ($result) {
            foreach ($result as $row) {
                $id = $row['IdEvent'];
                $events[$id] = $this->processRow($row);
            }
        }
        return $events;
    }

    public function getEventById(int $id) : Event
    {
        $sql = "SELECT * FROM event WHERE IdEvent = ?";
        $result = $this->queryRow($sql, array($id));
        return $this->processRow($result);
    }

    private function processRow(array $row) : Event
    {
        $userDAO = new UserDAO();
        $eventTypeDAO = new EventTypeDAO();
        $artistDAO = new ArtistDAO();
        $pictureDAO = new PictureDAO();

        $idEvent = $row['IdEvent'];
        $tmp = EventBuilder::createEvent()
            ->withId($idEvent)
            ->withName($row['EventName'])
            ->withCountry($row['Country'])
            ->withCity($row['City'])
            ->withHall($row['Hall'])
            ->withStreet($row['street'])
            ->withDate($row['Date'])
            ->withDescription($row['description'])
            ->withNbPlaces(intval($row['NbPlacesPit']), intval($row['NbSeatsStaircase']));

        // Missing : TypeEvent, Picture, Organizer, Artist
        $eventTypeResult = $eventTypeDAO->getEventTypeById($row['idtypeEvent']);
        if ($eventTypeResult != null) {
            $tmp->withTypeEvent($eventTypeResult);
        }

        $pictureResult = $pictureDAO->getPictureById($row['idPicture']);
        if ($pictureResult != null) {
            $tmp->withPhoto($pictureResult);
        }

        $organizerResult = $userDAO->getUserById($row['OrganizerId']);
        if ($organizerResult != null) {
            $tmp->withOrganizer($organizerResult);
        }

        $artistResult = $artistDAO->getArtistById($row['IdArtist']);
        if ($artistResult != null) {
            $tmp->withArtist($artistResult);
        }

        return $tmp->build();
    }
}