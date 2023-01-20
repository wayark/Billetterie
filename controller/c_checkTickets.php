<?php

$presenter = new TicketsPresenter($_SESSION['tickets']);
$display = $presenter->formatDisplay();

require_once PATH_VIEWS . 'checkTickets.php';
