 <?php

if (session_id() == '') session_start();

$presenter = new CreateEventPresenter($_GET, $_POST);
$result = $presenter->formatDisplay();

$artistDAO = new ArtistDAO();
    try {
        $allArtist = $artistDAO->getAll();
    } catch (Exception $e) {
    }

    /*if (isset($_POST['createevent'])) {
        $resultDisplayRegister = handle_createevent();
    }*/
require_once(PATH_VIEWS . 'createevent.php');