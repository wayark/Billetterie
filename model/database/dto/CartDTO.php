<?php

class CartDTO extends DTO {

function add(User $user, Event $event, int $quantity): void
{
    $fields = [
        "ID_USER",
        "ID_TICKET_PRICING",
        "QUANTITY"
    ];

    $values = [
        $user->getId(),
        $event->getIdEvent(),
        $quantity
    ];

    $this->insertQuery("cart", $fields, $values);
}

/**
 * @throws NoDatabaseException
 */
function update(User $user, Event $event, int $quantity): void
{

    $this->_sendQuery("UPDATE CART SET QUANTITY = $quantity WHERE ID_USER = ? AND ID_TICKET_PRICING = ?",
        [$user->getId(), $event->getIdEvent()]);

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