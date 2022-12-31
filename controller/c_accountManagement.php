<?php
require_once PATH_PRESENTER . 'AccountManagementPresenter.php';

if (session_id() == '') session_start();

if (!isset($_SESSION) || !isset($_SESSION['user'])) {
    require_once PATH_VIEWS . '404.php';
    exit();
}

$presenter = new AccountManagementPresenter($_GET, $_POST, $_FILES);
$display = $presenter->formatDisplay();

require_once(PATH_VIEWS . 'accountManagement.php');
