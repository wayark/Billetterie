<?php 

require_once './model/database/DAO.php';
require_once './model/database/dao/UserDAO.php';
require_once './model/database/IObjectDAO.php';

require_once './model/components/EventPricing.php';
require_once './model/components/builder/EventBuilder.php';

class CartDAO extends DAO implements IObjectDAO {
    
        private string $baseQuery = "SELECT * 
                                        FROM cart
                                        NATURAL JOIN event
                                        NATURAL JOIN location
                                        NATURAL JOIN artist
                                        NATURAL JOIN event_type";
    
        public function getAll(): array {
            $res = [];
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
}