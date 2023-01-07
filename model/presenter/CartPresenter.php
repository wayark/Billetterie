<?php

class CartPresenter extends Presenter
{

    private User $user;
    private array $cart;

    public function __construct(?array $get, ?array $post)
    {
        parent::__construct($get, $post);
    }

    protected function checkProcess(): void
    {
        $eventDAO = new CartDAO();
    }

    public function formatDisplay(): array
    {
    }
}