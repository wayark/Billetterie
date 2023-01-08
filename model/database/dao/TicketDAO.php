<?php

class TicketDAO extends DAO implements IObjectDAO {

    public function getAll(): array
    {
        // TODO: Implement getAll() method for TicketDAO.
        return array();
    }

    public function getById($id): Ticket
    {
        // TODO: Implement getById() method for TicketDAO.
        return new Ticket();
    }

    function getLastId(): int
    {   
        // TODO: Implement getLastId() method for TicketDAO.
        return 0;
    }

    function getNumberOfTicketsBought(Event $evt): int
    {
        $query = "SELECT COUNT(*) AS NB_TICKETS FROM ticket WHERE ID_EVENT = :idEvent";
        $result = $this->queryRow($query, array(
            "idEvent" => $evt->getIdEvent()
        ));
        if (empty($result)) return 0;
        return $result["NB_TICKETS"];
    }

}