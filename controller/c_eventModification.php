<?php require_once(PATH_VIEWS . "eventModification.php");

if (isset($_POST["resume"])) {
    $resume = $_POST["resume"];
}

if (isset($_POST["place"])) {
    $place = $_POST["place"];
}

if (isset($_POST["date"])) {
    $date = $_POST["date"];
}

if (isset($_POST["ticketNumber"])) {
    $ticketNumber = $_POST["ticketNumber"];
}

if (isset($_POST["ticketPrice"])) {
    $ticketPrice = $_POST["ticketPrice"];
}
