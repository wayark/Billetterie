<?php
if (session_id() == '') session_start();


/* $cart = new CartPresenter($_GET, $_POST); */

print_r($_SESSION['user']);

$cartDAO = new CartDAO();
$cart = $cartDAO->getCartByUserId($_SESSION["user"]->getId());

require_once PATH_VIEWS . "cart.php";