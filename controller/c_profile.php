<?php

if (!isset($_GET['user']) /* || $_GET['user'] == "" */) {
    require_once PATH_VIEWS . "404.php";
} else if (isset($_GET["part"])) {
    require_once (PATH_VIEWS . $_GET["part"] . ".php");
} else {
    require_once (PATH_VIEWS . "profile.php");
}