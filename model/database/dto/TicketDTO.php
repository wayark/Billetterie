<?php

class TicketDTO extends DTO implements IObjectDTO {

    /**
     * @param Ticket $object
     * @return void
     * @throws UserAlreadyInBaseException
     */
    public function add($object): void
    {
        $fields = ["ID_TICKET", "ID_EVENT", "ID_PAYMENT_METHOD", "ID_TICKET_PRICING", "ID_USER", "TICKET_NUMBER"];
        $values = [$object->getIdTicket(), $object->getEvent()->getIdEvent(), $object->getPaymentMethod()->getIdPaymentMethod(),
            $object->getTicketPricing()->getIdTicketPricing(), $object->getOwner()->getId(), $object->getCode()];
        try {
            $this->insertQuery('Ticket', $fields, $values);
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                throw new UserAlreadyInBaseException($e->getMessage());
            } else {
                throw new Exception($e->getMessage());
            }
        }
    }

    public function delete($ticket): void
    {
        $this->deleteQuery('Cart', 'ID_TICKET', $ticket->getId());
    }

    public function update($object): void
    {
        
    }
}
