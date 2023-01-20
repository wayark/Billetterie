<?php

class EventLocationDAO extends DAO implements IObjectDAO
{
    function getById(int $id)
    {
        $sql = "SELECT * FROM location WHERE ID_LOCATION = ?";
        $result = $this->queryRow($sql, [$id]);
        if ($result) {
            return new EventPlace($result['ID_LOCATION'], $result['COUNTRY'], $result['CITY'],
                $result['PLACE_NAME'], $result['ADDRESS']);
        }
        return null;
    }

    function getAll()
    {
        $sql = "SELECT * FROM location";
        $result = $this->queryAll($sql);
        $ans = array();
        foreach ($result as $row) {
            $ans[] = new EventPlace($row['ID_LOCATION'], $row['COUNTRY'], $row['CITY'],
                $row['PLACE_NAME'], $row['ADDRESS']);
        }
        return $ans;
    }

    function getLastId(): int
    {
        return $this->getTableLastId("LOCATION", "ID_LOCATION");
    }
}