<?php
if (session_id() == '') session_start();

$presenter = new CartPresenter($_GET, $_POST);
$display = $presenter->formatDisplay();

require_once PATH_VIEWS . "cart.php";
