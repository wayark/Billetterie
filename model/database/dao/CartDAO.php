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
            $sql = $this->baseQuery . " ORDER BY event_date ASC";
            $result = $this->queryAll($sql);
            $events = array();
            if ($result) {
                foreach ($result as $row) {
                    $events[] = $this->processRow($row);
                }
            }
            return $events;
        }

        public function getById(int $id)
        {
            
        }

        public function getLastId(): int
        {
            
        }
}