<?php

require_once PATH_MODELS . 'Ticket.php';
require_once PATH_MODELS . 'database/DAO.php';
require_once PATH_MODELS . 'database/IObjectDAO.php';

class TicketDAO extends DAO implements IObjectDAO {

    public function getAll(): array
    {
        $tmp = $this->queryAll('SELECT * FROM Ticket');
        $tickets = [];
        foreach ($tmp as $t) {
            $tickets[] = new Ticket($t['ID_TICKET'], $t['ID_USER'], $t['ID_EVENT'], $t['ID_SEAT'], $t['PRICE']);
        }
        return $tickets;
    }

    public function getById($id): Ticket
    {
        $tmp = $this->queryRow('SELECT * FROM Ticket WHERE ID_TICKET = :id', [':id' => $id]);
        $ticket = new Ticket($tmp['ID_TICKET'], $tmp['ID_USER'], $tmp['ID_EVENT'], $tmp['ID_SEAT'], $tmp['PRICE']);
        return $ticket;
    }

    function getLastId(): int
    {   
        $id = $this->queryRow('SELECT MAX(ID_TICKET) FROM Ticket', []);
        if ($id[0] == null) {
            return 0;
        } else {
            return $id[0];
        }
    }

    function getByUserIdAndEventId($id_user, $id_event): Ticket
    {
        $tmp = $this->queryRow('SELECT * FROM Ticket WHERE ID_USER = :id_user AND ID_EVENT = :id_event', [':id_user' => $id_user, ':id_event' => $id_event]);
        $ticket = new Ticket($tmp['ID_TICKET'], $tmp['ID_USER'], $tmp['ID_EVENT'], $tmp['ID_SEAT'], $tmp['PRICE']);
        return $ticket;
    }
}