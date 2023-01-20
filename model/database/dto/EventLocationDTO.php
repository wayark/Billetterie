<?php

class EventLocationDTO extends DTO implements IObjectDTO
{

    /**
     * @param EventPlace $object
     * @return void
     */
    function add($object): void
    {
        $fields = array("ID_LOCATION", "COUNTRY", "CITY", "PLACE_NAME", "ADDRESS");
        $values = array($object->getIdLocation(), $object->getCountry(), $object->getCity(), $object->getPlaceName(), $object->getStreet());
        $this->insertQuery("LOCATION", $fields, $values);
    }

    function update($object): void
    {
        $fields = array("COUNTRY", "CITY", "PLACE_NAME", "ADDRESS");
        $values = array($object->getCounty(), $object->getCity(), $object->getPlaceName(), $object->getAddress());
        $this->updateQuery("LOCATION", $fields, $values, "ID_LOCATION", $object->getId());
    }

    function delete($object): void
    {
        $this->deleteQuery("LOCATION", "ID_LOCATION", $object->getId());
    }
}