<?php

class EventDAO extends DAO implements IObjectDAO
{
    private string $baseQuery = "SELECT * 
                                    FROM event
                                    NATURAL JOIN location
                                    NATURAL JOIN artist
                                    NATURAL JOIN event_type";


    /**
     * @throws Exception
     */
    public function getAll(): array
    {
        $sql = $this->baseQuery . " ORDER BY event_date ASC";
        $result = $this->queryAll($sql);
        $events = array();
        if ($result) {
            foreach ($result as $row) {
                $events[] = $this->processRow($row);
            }
        }
        return $events;
    }

    public function getTendancies(): array
    {
        $sql = $this->baseQuery . " ORDER BY event_date DESC LIMIT 3";
        $result = $this->queryAll($sql);
        $events = array();
        if ($result) {
            foreach ($result as $row) {
                $events[] = $this->processRow($row);
            }
        }
        return $events;
    }

    public function getById(int $id): ?Event
    {
        $sql = $this->baseQuery . " WHERE ID_EVENT = ?";
        $result = $this->queryRow($sql, array($id));
        if (!$result) return null;
        return $this->processRow($result);
    }


    private function processRow(array $row): Event
    {
        $userDAO = new UserDAO();

        $idEvent = $row['ID_EVENT'];

        $tmp = EventBuilder::createEvent()
            ->withId($idEvent)
            ->withName($row['EVENT_NAME'])
            ->withStreet($row['ADDRESS'])
            ->withIdLocation($row['ID_LOCATION'])
            ->withCity($row['CITY'])
            ->withCountry($row['COUNTRY'])
            ->withPlaceName($row['PLACE_NAME'])
            ->withDate($row['EVENT_DATE'])
            ->withTypeEvent(new EventType($row['ID_EVENT_TYPE'], $row['EVENT_TYPE_NAME']))
            ->withPhoto(new Picture($row['PICTURE_PATH'], $row['PICTURE_DESCRIPTION']))
            ->withArtist(new Artist($row['ID_ARTIST'], $row['ARTIST_FIRST_NAME'], $row['ARTIST_LAST_NAME'], $row['STAGE_NAME'], $row['BIOGRAPHY']))
            ->withDescription($row['EVENT_DESCRIPTION']);

        $organizer = $userDAO->getUserById($row['ID_ORGANIZER']);
        if ($organizer) {
            $tmp->withOrganizer($organizer);
        }

        return $tmp->build();
    }

    /**
     * @return int the last id of the even
     */
    public function getLastId(): int
    {
        return $this->getTableLastId("event", "ID_EVENT");
    }

    public function getEventsFrom(int $organizerId) : array
    {
        $sql = $this->baseQuery . " WHERE ID_ORGANIZER = ? ORDER BY event_date ASC";
        $result = $this->queryAll($sql, array($organizerId));
        $events = array();
        if ($result) {
            foreach ($result as $row) {
                $events[] = $this->processRow($row);
            }
        }
        return $events;
    }
}
