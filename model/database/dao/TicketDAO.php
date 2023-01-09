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

    function getNumberOfTicketsBought(Event $evt, TicketPricing $pricing = null): int
    {
        $comp = "";
        $args = array($evt->getIdEvent());
        if ($pricing != null) {
            $comp = " AND id_ticket_pricing = ?";
            $args[] = $pricing->getIdTicketPricing();
        }
        $query = "SELECT COUNT(*) AS NB_TICKETS FROM ticket WHERE ID_EVENT = ?" . $comp;
        $result = $this->queryRow($query, $args);
        if (empty($result)) return 0;
        return $result["NB_TICKETS"];
    }

}