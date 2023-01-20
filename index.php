<?php

// Display erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config/configuration.php';

require_once PATH_AUTOLOAD;

if (session_id() == '') session_start();

if (isset($_GET['page'])) {
    $page = htmlspecialchars($_GET['page']);
    if (!is_file(PATH_CONTROLLERS . $_GET['page'] . ".php")) {
        $page = '404'; //the page do not exist
    } else {
        $page = $_GET['page'];
    }
} else
    $page = 'reception';

require_once(PATH_CONTROLLERS . $page . '.php');
