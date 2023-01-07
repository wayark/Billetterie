<?php
session_start();

/* require_once PATH_PRESENTER . "CartPresenter.php"; */
require_once PATH_DAO . "CartDAO.php";
require_once PATH_DTO . "CartDTO.php";
/* $cart = new CartPresenter($_GET, $_POST); */

print_r($_SESSION['user']);

$cartDAO = new CartDAO();
$cart = $cartDAO->getCartByUserId($_SESSION["user"]->getId());

require_once PATH_VIEWS . "cart.php";