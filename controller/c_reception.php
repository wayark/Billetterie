<?php

$presenter = new ReceptionPresenter(null, null);

$displayArray = $presenter->formatDisplay();

$eventDAO = new EventDAO();
$tendancies = $eventDAO->getTendancies();

require_once (PATH_VIEWS . 'reception.php');