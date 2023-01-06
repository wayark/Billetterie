<?php

class Ticket{
    private $idEvent;
    private $idUser;
    private $isPit;
    private $quantity;

    public function __construct($idEvent, $idUser, $isPit, $quantity) {
        $this->idEvent = $idEvent;
        $this->idUser = $idUser;
        $this->isPit = $isPit;
        $this->quantity = $quantity;
    }

    public function getIdEvent() {
        return $this->idEvent;
    }

    public function setIdEvent($idEvent) {
        $this->idEvent = $idEvent;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function getIsPit() {
        return $this->isPit;
    }

    public function setIsPit($isPit) {
        $this->isPit = $isPit;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

/*     public function getPrice() {
        return $this->quantity * 10;
    } */
}