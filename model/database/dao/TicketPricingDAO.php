<?php

class TicketPricingDAO extends DAO implements IObjectDAO
{
    private EventDAO $eventDAO;

    public function __construct()
    {
        $this->eventDAO = new EventDAO();
    }

    function getById(int $id)
    {
        $query = "SELECT * FROM ticket_pricing WHERE id_ticket_pricing = :id";
        $result = $this->queryRow($query, array(":id" => $id));
        if ($result) {
            return $this->processrow($result);
        }
        return null;
    }

    function getAll() : PricingList
    {
        $query = "SELECT * FROM ticket_pricing";
        $result = $this->queryAll($query);
        $tickets = new PricingList();
        if ($result) {
            foreach ($result as $row) {
                $ticketPricing = $this->processrow($row);
                $tickets->addPricing($ticketPricing);
            }
        }
        return $tickets;
    }

    function getLastId(): int
    {
        return $this->getTableLastId("ticket_pricing", "ID_TICKET_PRICING");
    }

    private function processrow(array $row) : ?TicketPricing
    {
        $tmp = $this->eventDAO->getById($row["ID_EVENT"]);
        return new TicketPricing($row["ID_TICKET_PRICING"],
            $tmp, $row["NAME_TICKET_PRICING"], $row["PRICE"], $row["MAX_TICKET_NUMBER"]);
    }

    public function getPricingsForEventId(int $id) : ?PricingList
    {
        $query = "SELECT * FROM TICKET_PRICING WHERE id_event = :id";
        $result = $this->queryAll($query, array(":id" => $id));
        $tickets = new PricingList();
        if ($result) {
            foreach ($result as $row) {
                $tickets->addPricing($this->processrow($row));
            }
        }
        return $tickets;
    }
}