<?php

require_once PATH_MODELS . 'Cart.php';
require_once PATH_MODELS . 'database/DTO.php';
require_once './model/database/IObjectDTO.php';

class CartDTO extends DTO implements IObjectDTO{

    function add($event): void
    {
        $fields = [
            "ID_EVENT",
            "ID_USER",
            "IS_PIT",
            "QUANTITY"
        ];

        $values = [
            $event->getIdEvent(),
            $event->getUser()->getIdUser(),
            $event->getEvent()->getIdEvent(),
            $event->getQuantity()
        ];

        $this->insertQuery("cart", $fields, $values);
    }

    function update($object): void
    {
    }

    function delete($object): void
    {
    }

    function getById(int $id)
    {
    }

    function getAll(): array
    {
    }

    function getLastId(): int
    {
    }

    private function createObject($row): Cart
    {
    }
}