<?php

class CartDTO extends DTO {

    function add(User $user, TicketPricing $ticketPricing, int $quantity): void
    {
        $fields = [
            "ID_USER",
            "ID_TICKET_PRICING",
            "QUANTITY"
        ];
    
        $values = [
            $user->getId(),
            $ticketPricing->getIdTicketPricing(),
            $quantity
        ];
    
        $this->insertQuery("cart", $fields, $values);
    }
    
    /**
     * @throws NoDatabaseException
     */
    function update(User $user, TicketPricing $ticketPricing, int $quantity): void
    {
    
        $this->_sendQuery("UPDATE CART SET QUANTITY = $quantity WHERE ID_USER = ? AND ID_TICKET_PRICING = ?",
            [$user->getId(), $ticketPricing->getIdTicketPricing()]);
    
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