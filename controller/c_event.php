<?php

require_once PATH_MODELS . 'database/dao/EventDAO.php';

if (isset($_GET['event'])) {
    $eventDAO = new EventDAO();
    $eventToDisplay = $eventDAO->getEventById($_GET['event']);
}

require_once PATH_VIEWS . "event.php";