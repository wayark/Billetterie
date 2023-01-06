<?php
require_once './application/presenter/EventPresenter.php';
require_once './application/presenter/ReceptionPresenter.php';
require_once PATH_MODELS . 'Ticket.php';
require_once PATH_DTO . 'TicketDTO.php';

session_start();

$presenter = new EventPresenter($_GET, $_POST);

$display = $presenter->formatDisplay();

$posted = false;
if(isset($_POST['type'])){
    $posted = true;
    $ticketAddedToCart = $presenter->formatDisplayById($_GET['event'], $_POST['type'], $_POST['quantity']);
    $event = $presenter->getEventToDisplay();

    switch ($_POST['type']) {
        case 'pit':
            $isPit = 1;
            break;
        case 'stair':
            $isPit = 0;
            break;
    }

    $ticket = new Ticket($event->getIdEvent(), $_SESSION["user"]->getId(),$isPit, $_POST['quantity']);
    $TicketDTO = new TicketDTO();
    $TicketDTO->add($ticket);
}

require_once PATH_VIEWS . "event.php";