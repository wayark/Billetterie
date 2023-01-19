<?php
$eventDTO = new EventDTO;
$eventDAO = new EventDAO;
$date = date("Y-m-d H:i:s", time());
$divError = "";

$event = $eventDAO->getById($_GET["event"]);
if ($event->getEventInfo()->getEventDate() < $date) {
    $eventDTO->delete($event);
}


require_once(PATH_CONTROLLERS . "eventList.php");
