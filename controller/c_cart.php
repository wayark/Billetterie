<?php

session_start();

/* require_once PATH_PRESENTER . "CartPresenter.php"; */
require_once PATH_MODELS . "database/dao/CartDAO.php";
require_once PATH_MODELS . "database/dto/CartDTO.php";
require_once PATH_MODELS . "User.php";
/* $cart = new CartPresenter($_GET, $_POST); */

print_r($_SESSION);

$cartDAO = new CartDAO();
$cart = $cartDAO->getCartByUserId($_SESSION["user"]->getId());

var_dump($cart);

require_once PATH_VIEWS . "cart.php";