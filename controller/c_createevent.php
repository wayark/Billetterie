<?php

require_once './model/database/dao/ArtistDAO.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$artistDAO = new ArtistDAO();
try {
    $allArtist = $artistDAO->getAllArtists();
} catch (Exception $e) {
}

 require_once(PATH_VIEWS . 'createevent.php');
