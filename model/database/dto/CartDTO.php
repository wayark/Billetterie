<?php



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