<?php

class TicketDAO extends DAO implements IObjectDAO {

    public function getAll(): array
    {
        // TODO: Implement getAll() method for TicketDAO.
        return array();
    }

    public function getById($id): ?Ticket
    {
        $result = $this->queryRow("SELECT * FROM ticket WHERE id_ticket = ?", array($id));
        if ($result) {
            $eventDAO = new EventDAO();
            $paymentMethodDAO = new PaymentMethodDAO();
            $ticketPricingDAO = new TicketPricingDAO();
            $userDAO = new UserDAO();
            return new Ticket($result['ID_TICKET'], $eventDAO->getById($result['ID_EVENT']),
                $paymentMethodDAO->getById($result['ID_PAYMENT_METHOD']),
                $ticketPricingDAO->getById($result['ID_TICKET_PRICING']),
                $userDAO->getUserById($result['ID_USER']),
                $result['TICKET_NUMBER']);
        }
        return null;
    }

    function getLastId(): int
    {   
        return $this->getTableLastId("TICKET", "ID_TICKET");
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