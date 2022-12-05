<?php

require_once './model/database/dao/EventDAO.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$eventDAO = new EventDAO();
try {
    $allEvents = $eventDAO->getAllEvents();
} catch (Exception $e) {
}

require_once (PATH_VIEWS . 'reception.php');