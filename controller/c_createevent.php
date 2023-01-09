<?php

$artistDAO = new ArtistDAO();
try {
    $allArtist = $artistDAO->getAllArtists();
} catch (Exception $e) {
}

if (isset($_POST['createevent'])) {
    $resultDisplayRegister = handle_createevent();
} 

function handle_createevent(): array
{
    $resultDisplay = ['message' => '', 'type' => ''];

    $eventName = htmlspecialchars($_POST['eventName']);
    $description = htmlspecialchars($_POST['description']);
    $country = htmlspecialchars($_POST['country']);
    $city = htmlspecialchars($_POST['city']);
    $Hall = htmlspecialchars($_POST['Hall']);
    $street = htmlspecialchars($_POST['street']);
    $Date = htmlspecialchars($_POST['Date']);
    $Artist = htmlspecialchars($_POST['Artist']);
    $NbPlacesPit = htmlspecialchars($_POST['NbPlacesPit']);
    $NbSeatsStaircase = htmlspecialchars($_POST['NbSeatsStaircase']);
    if (!empty($eventName) && !empty($description) && !empty($country) && !empty($city) && !empty($Hall)&& !empty($street)&& !empty($Date)&& !empty($Artist)) {
        try {
            $eventDAO = new EventDAO();

            $event = new Event($eventDAO->getLastId()+1,new EventInfo($eventName,$Date,null,null,$description), new EventPlace($country,$city,$Hall,$street,$NbPlacesPit,$NbSeatsStaircase));

            $resultDisplay['message'] = "L'évènement' a bien été créé";
            $resultDisplay['type'] = "success";
        } catch (NoDatabaseException $e) {
            $resultDisplay['message'] = "La base de données n'est pas disponible";
            $resultDisplay['type'] = 'error';
        } catch (Exception $e) {
            $resultDisplay['message'] = "Une erreur est survenue";
            $resultDisplay['type'] = 'error';
        }
    }else {
        $resultDisplay['message'] .= "Tous les champs doivent être complétés" . "<br>";
        $resultDisplay['type'] = "error";
    }
    return $resultDisplay;
}



 require_once(PATH_VIEWS . 'createevent.php');
