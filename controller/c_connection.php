<?php
require_once PATH_PRESENTER . 'ConnectionPresenter.php';

if (session_id() == '') session_start();

$presenter = new ConnectionPresenter($_SESSION, null, $_POST);
$result = $presenter->formatDisplay();


if ($result['type'] == 'success') {
    require_once PATH_CONTROLLERS . 'accountManagement.php';
} else {
    require_once(PATH_VIEWS . 'connection.php');
}
