<?php

$presenter = new ConnectionPresenter($_GET, $_POST);
$result = $presenter->formatDisplay();


if ($result['type'] == 'success') {
    require_once PATH_CONTROLLERS . 'accountManagement.php';
} else {
    require_once(PATH_VIEWS . 'connection.php');
}