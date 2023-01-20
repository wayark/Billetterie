<?php 
class MenuInitialiser{

    private $nbNotifications;
    private $nbTickets;
    private $nbCartItems;

    public function __construct(){
        $this->setNbNotifications();
        $this->setNbTickets();
        $this->setNbCartItems();
    }

    public function setNbNotifications(){
        $this->nbNotifications = 0;
    }

    public function setNbTickets(){
        $this->nbTickets = 0;
    }

    public function setNbCartItems(){
        $nbItems = $_SESSION['cart']->getNbItems();
        $this->nbCartItems = $nbItems;
    }

    public function export(){
        return [
            'nbNotifications' => $this->nbNotifications,
            'nbTickets' => $this->nbTickets,
            'nbCartItems' => $this->nbCartItems
        ];
    }
}