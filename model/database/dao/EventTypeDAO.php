<?php
class EventTypeDAO extends DAO implements IObjectDAO
{
    public function getById(int $id) : ?EventType {
        $sql = "SELECT * FROM event_type WHERE ID_EVENT_TYPE = ?";
        $result = $this->queryRow($sql, array($id));
        if ($result) {
            return new EventType(intval($result['ID_EVENT_TYPE']), $result['EVENT_TYPE_NAME']);
        } else {
            return null;
        }
    }

    public function getAll() : array {
        $sql = "SELECT * FROM event_type";
        $result = $this->queryAll($sql);
        $eventTypes = array();
        foreach ($result as $row) {
            $eventTypes[] = new EventType(intval($row['ID_EVENT_TYPE']), $row['EVENT_TYPE_NAME']);
        }
        return $eventTypes;
    }

    public function getLastId(): int
    {
        return $this->getTableLastId("event_type", "ID_EVENT_TYPE");
    }
}