<?php
$eventDTO = new EventDTO;
$eventDAO = new EventDAO;

$event = $eventDAO->getById($_GET["event"]);
$eventDTO->delete($event);

require_once(PATH_CONTROLLERS . "eventList.php");
