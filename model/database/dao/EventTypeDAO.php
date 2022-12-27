<?php

require_once ('./model/database/DAO.php');

class EventTypeDAO extends DAO
{
    public function getEventTypeById(int $idEventType) : ?EventType {
        $sql = "SELECT * FROM event_type WHERE ID_EVENT_TYPE = ?";
        $result = $this->queryRow($sql, array($idEventType));
        if ($result) {
            return new EventType(intval($result['ID_EVENT_TYPE']), $result['EVENT_TYPE_NAME']);
        } else {
            return null;
        }
    }

    public function getAllEventType() : array {
        $sql = "SELECT * FROM event_type";
        $result = $this->queryAll($sql);
        $eventTypes = array();
        foreach ($result as $row) {
            $eventTypes[] = new EventType(intval($row['ID_EVENT_TYPE']), $row['EVENT_TYPE_NAME']);
        }
        return $eventTypes;
    }
}