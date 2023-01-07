<?php

require_once PATH_MODELS . 'Ticket.php';
require_once PATH_MODELS . 'database/DTO.php';
require_once PATH_MODELS . 'database/IObjectDTO.php';


class TicketDTO extends DTO implements IObjectDTO {

    public function add($object): void
    {
        $fields = ["ID_EVENT", "ID_USER", "IS_PIT", "QUANTITY"];
        $values = [$object->getIdEvent(), $object->getIdUser(), $object->getIsPit(), $object->getQuantity()];
        try {
            $this->insertQuery('Cart', $fields, $values);
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
