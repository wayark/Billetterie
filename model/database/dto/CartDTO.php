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

    function addOne(User $user, $ticketId){
        $userId = $user->getId();
        $this->sendTextQuery("UPDATE cart set QUANTITY = QUANTITY + 1 WHERE ID_USER = $userId AND ID_TICKET_PRICING = $ticketId");
    }

    function removeOne(User $user,$ticketId){
        $userId = $user->getId();
        $this->sendTextQuery("UPDATE cart set QUANTITY = QUANTITY - 1 WHERE ID_USER = $userId AND ID_TICKET_PRICING = $ticketId");  
    }

    function setQuantity(User $user, $ticketId, int $quantity){
        $userId = $user->getId();
        $this->sendTextQuery("UPDATE cart set QUANTITY = $quantity WHERE ID_USER = $userId AND ID_TICKET_PRICING = $ticketId");
    }

    /**
     * @param TicketPricing $object
     * @return void
     */
    function delete(TicketPricing $object): void
    {
        $this->deleteQuery("CART", "ID_TICKET_PRICING", $object->getIdTicketPricing());
    }
    
    function getById(int $id)
    {
    }
}