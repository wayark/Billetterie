<?php

require_once PATH_MODELS . 'database/dao/EventDAO.php';
require_once PATH_MODELS . 'database/dao/EventDTO.php';

if (isset($_GET['event'])) {
    $eventDAO = new EventDAO();
    $eventDTO = new EventDTO();
    $event = $eventDAO->getEventById($_GET['event']);

    if (isset($_POST["resume"])) {
        $resume = $_POST["resume"];
        $event->getEventInfo->setEventDescription($resume);
    }

    if (isset($_POST["country"]) && isset($_POST["city"]) && isset($_POST["street"])) {
        $country = $_POST["country"];
        $city = $_POST["city"];
        $street = $_POST["street"];

        $event->getEventPlace()->setCountry($country);
        $event->getEventPlace()->setCity($city);
        $event->getEventPlace()->setStreet($street);
    }

    if (isset($_POST["date"])) {
        $date = $_POST["date"];
        $event->getEventInfo->setEventDate($date);
    }

    if (isset($_POST["ticketNumberS"]) && isset($_POST["ticketNumberP"])) {
        $ticketNumberS = $_POST["ticketNumberS"];
        $ticketNumberP = $_POST["ticketNumber¨P"];
        $event->getEventPlace->setNbPlacesPit($ticketNumberP);
        $event->getEventPlace->setNbPlacesStair($ticketNumberS);
    }

    if (isset($_POST["ticketPriceG"]) && isset($_POST["ticketPriceF"])) {
        $ticketPriceG = $_POST["ticketPriceG"];
        $ticketPriceF = $_POST["ticketPriceF"];
    }

    $eventDTO->update($event);

    require_once(PATH_VIEWS . "eventModification.php");
} else {
    require_once(PATH_VIEWS . "404.php");
}
