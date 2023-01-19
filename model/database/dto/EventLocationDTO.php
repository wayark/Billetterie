<?php

class EventLocationDTO extends DTO implements IObjectDTO
{

    function add($object): void
    {
        $fields = array("ID_LOCATION", "COUNTY", "CITY", "PLACE_NAME", "ADDRESS");
        $values = array($object->getId(), $object->getCounty(), $object->getCity(), $object->getPlaceName(), $object->getAddress());
        $this->insertQuery("LOCATION", $fields, $values);
    }

    function update($object): void
    {
        $fields = array("COUNTY", "CITY", "PLACE_NAME", "ADDRESS");
        $values = array($object->getCounty(), $object->getCity(), $object->getPlaceName(), $object->getAddress());
        $this->updateQuery("LOCATION", $fields, $values, "ID_LOCATION", $object->getId());
    }

    function delete($object): void
    {
        $this->deleteQuery("LOCATION", "ID_LOCATION", $object->getId());
    }
}