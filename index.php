<?php

if (isset($_GET['page'])) {
    $page = htmlspecialchars($_GET['page']);
    if (!is_file(PATH_CONTROLLERS . $_GET['page'] . ".php")) {
        $page = '404'; //the page do not exist
    }
} else
    $page = 'connexion';



require_once(PATH_CONTROLLERS . $page . '.php');