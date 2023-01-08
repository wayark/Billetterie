<?php

class CartDAO extends DAO implements IObjectDAO {
        private string $baseQuery = "SELECT * FROM cart
                            NATURAL JOIN event
                            NATURAL JOIN location
                            NATURAL JOIN artist
                            NATURAL JOIN event_type";

        public function getAll(): array {
            $res = array();
            return $res;
        }

        public function getById(int $id)
        {
            $res = null;
            return $res;
        }

        public function getLastId(): int
        {
            $res = 0;
            return $res;
        }

        public function getCartByUserId($userId) : ?array
        {
            // TOFIX: The cart is not the same
            return null;
        }
}