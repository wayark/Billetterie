<?php

$presenter = new ReceptionPresenter(null, null);

$displayArray = $presenter->formatDisplay();

$DAO = new EventDAO();
$tendancies = $DAO->getTendancies();

require_once (PATH_VIEWS . 'reception.php');