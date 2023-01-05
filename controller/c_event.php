<?php
require_once './application/presenter/EventPresenter.php';
require_once './application/presenter/ReceptionPresenter.php';

$presenter = new EventPresenter($_GET, $_POST);

$display = $presenter->formatDisplay();

$posted = false;
if(isset($_POST['type'])){
    $posted = true;
    $ticketAddedToCart = $presenter->formatDisplayById($_GET['event'], $_POST['type']);
}

require_once PATH_VIEWS . "event.php";