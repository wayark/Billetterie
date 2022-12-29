<?php

require_once './model/database/dao/EventDAO.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$EventData = new EventDAO();

try {
    $EventOrga = $EventData->getAllEventsByArtistId($_SESSION['user']);
} catch (Exception $e) {
}

require_once(PATH_VIEWS . "eventList.php");
