<?php

require_once ('./model/database/DAO.php');

class EventTypeDAO extends DAO
{
    public function getEventTypeById(int $idEventType) : ?EventType {
        $sql = "SELECT * FROM typeevent WHERE IdType = ?";
        $result = $this->queryRow($sql, array($idEventType));
        if ($result) {
            return new EventType(intval($result['IdType']), $result['TypeName']);
        } else {
            return null;
        }
    }

    public function getAllEventType() : array {
        $sql = "SELECT * FROM typeevent";
        $result = $this->queryAll($sql);
        $eventTypes = array();
        foreach ($result as $row) {
            $eventTypes[] = new EventType(intval($row['IdType']), $row['TypeName']);
        }
        return $eventTypes;
    }
}