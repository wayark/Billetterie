<?php
if (session_id() == '') session_start();

if (!isset($_SESSION['cart'])) {
    require_once PATH_CONTROLLERS . 'connection.php';
} else {
    $presenter = new CartPresenter($_GET, $_POST);
    $display = $presenter->formatDisplay();
    require_once PATH_VIEWS . "cart.php";
}