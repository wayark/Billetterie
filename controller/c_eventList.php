<?php

require_once PATH_PRESENTER . 'EventListPresenter.php';

if (session_id() == '') session_start();

if (!isset($_SESSION) || !isset($_SESSION['user'])) {
    require_once PATH_VIEWS . '404.php';
    exit();
}


require_once(PATH_VIEWS . "eventList.php");
