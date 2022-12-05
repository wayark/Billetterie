<?php

require_once PATH_MODELS . 'database/dao/EventDAO.php';
$eventDAO = new EventDAO();
try {
    $allEvents = $eventDAO->getAllEvents();
} catch (Exception $e) {

}
require_once PATH_VIEWS . "event.php";