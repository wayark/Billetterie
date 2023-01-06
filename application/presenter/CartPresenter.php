<?php

require_once PATH_MODELS . "Presenter.php";
require_once PATH_MODELS . 'database/dao/CartDAO.php';
require_once PATH_MODELS . 'Cart.php';
require_once './application/display/formatDate.php';

class CartPresenter extends Presenter {

    private User $user;
    private array $cart;

    public function __construct(?array $get, ?array $post) {
        parent::__construct($get, $post);
    }

    protected function checkProcess() : void {
        $eventDAO = new CartDAO();
        $this->user = $_SESSION['cart'];
        try {
            $this->events = $cartDAO->getIFrom($this->user->getId());
        } catch (Exception $e) {
            $this->events = [];
        }
    }

    public function formatDisplay(): array {
    }
}