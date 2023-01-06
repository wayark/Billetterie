<?php
require_once PATH_DTO . 'EventDTO.php';
require_once PATH_DAO . 'EventDAO.php';

$eventDTO = new EventDTO;
$eventDAO = new EventDAO;

$event = $eventDAO->getById($_GET["event"]);
$eventDTO->delete($event);

require_once(PATH_CONTROLLERS . "eventList.php");
