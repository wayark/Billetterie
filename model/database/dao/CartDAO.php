<?php

class CartDAO extends DAO implements IObjectDAO
{
    private string $baseQuery = "SELECT * FROM cart
                            NATURAL JOIN event
                            NATURAL JOIN location
                            NATURAL JOIN artist
                            NATURAL JOIN event_type";

    public function getAll(): array
    {
        $res = array();
        return $res;
    }

    /**
     * @param int $id User id
     * @return ?Cart Cart object of the user
     */
    public function getById(int $id) : ?Cart
    {
        $sql = "SELECT * FROM cart WHERE ID_USER = ?";
        $result = $this->queryAll($sql, array($id));
        if ($result) {
            $inCartPricing = array();
            foreach ($result as $row) {
                $inCartPricing[$row['ID_TICKET_PRICING']] = $row['QUANTITY'];
            }
            return new Cart($id, $inCartPricing);
        }
        return null;
    }

    public function getLastId(): int
    {
        $res = 0;
        return $res;
    }
}