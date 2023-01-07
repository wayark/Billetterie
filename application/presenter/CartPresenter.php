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
    }

    public function formatDisplay(): array {
    }
}