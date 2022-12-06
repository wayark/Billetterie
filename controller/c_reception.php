<?php

require_once './model/database/dao/EventDAO.php';

$eventDAO = new EventDAO();
try {
    $allEvents = $eventDAO->getAllEvents();
} catch (Exception $e) {
}

require_once (PATH_VIEWS . 'reception.php');