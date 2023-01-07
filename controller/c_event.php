<?php
require_once './application/presenter/EventPresenter.php';
require_once './application/presenter/ReceptionPresenter.php';
require_once './model/Ticket.php';
require_once PATH_DTO . 'TicketDTO.php';
require_once PATH_DAO . 'TicketDAO.php';

$presenter = new EventPresenter($_GET, $_POST);

$display = $presenter->formatDisplay();

$posted = false;
if(isset($_POST['type']) && isset($_POST['quantity'])){
    session_start();
    
    $quantity = $_POST['quantity'];
    if($quantity == 1)
        $textToDisplay = "Votre ticket a bien été ajouté au panier.";
    else 
        $textToDisplay = "Vos tickets ont bien été ajoutés au panier.";

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
    
    /* Si l'utilisteur avait déjà ce ticket dans son panier, on supprime l'ancien et on ajoute au nouveau la quantité
    de l'ancien */

    $TicketDTO = new TicketDTO();
    $TicketDAO = new TicketDAO();

    $table = "Cart";
    $field1 = "ID_USER";
    $field2 = "ID_EVENT";
    $value1 = $_SESSION["user"]->getId();
    $value2 = $event->getIdEvent();
    
    $SamesTickets = $TicketDAO->getQueryDoubleCondition($table, $field1, $field2, $value1, $value2);
    
    $newQuantity = $_POST['quantity'];
    foreach ($SamesTickets as $tmpTicket) {
        $newQuantity += $tmpTicket['QUANTITY'];
    }

    $ticket = new Ticket($event->getIdEvent(), $_SESSION["user"]->getId(),$isPit, $newQuantity);

    $TicketDTO->deleteQueryDoubleCondition($table, $field1, $field2, $value1, $value2);

    $TicketDTO->add($ticket);    
}

require_once PATH_VIEWS . "event.php";