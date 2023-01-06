<?php

require_once PATH_MODELS . 'Ticket.php';

class Cart {

    private array $cart;

    public function __construct() {
    }

    public function add(Ticket $item) {
        $this->cart[] = $item;
    }

    public function remove(Ticket $ticket) {
        $this->cart = array_diff($this->cart, [$ticket]);
    }

    public function getCart(): array {
        return $this->cart;
    }

    public function setCart(array $cart): void {
        $this->cart = $cart;
    }

/*     public function getTotal(): float {
        $total = 0;
        foreach ($this->cart as $ticket) {
            $total += $ticket->getPrice();
        }
        return $total;
    } */
}
