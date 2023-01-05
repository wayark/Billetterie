<?php
require_once './application/presenter/EventPresenter.php';
require_once './application/presenter/ReceptionPresenter.php';

$presenter = new EventPresenter($_GET, $_POST);

$display = $presenter->formatDisplay();

if(isset($_POST['type'])){
    $presenterReception = new ReceptionPresenter(null, null);
    $ticketAddedToCart = $presenterReception->formatDisplayById($_GET['event'], $_POST['type']);
}

require_once PATH_VIEWS . "event.php";