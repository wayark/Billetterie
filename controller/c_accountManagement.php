<?php

if (!isset($_SESSION['user'])) {
    require_once PATH_VIEWS . '404.php';
} else if(!isset($_GET["part"]) || $_GET["part"]=="account"){

    $presenter = new AccountManagementPresenter($_GET, $_POST, $_FILES);
    $display = $presenter->formatDisplay();

    if(isset($_POST["dldata"])) {
        echo $presenter->getDataInJson();
    }

    require_once(PATH_VIEWS . 'accountManagement.php');
    
} else if ($_GET["part"]=="profile") {
    require_once PATH_VIEWS . 'profileManager.php';
} else {
    require_once PATH_VIEWS . '404.php';
}
