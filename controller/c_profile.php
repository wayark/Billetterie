<?php

require_once (PATH_VIEWS . "header.php");

if (isset($_GET["part"])){
    require_once (PATH_VIEWS . $_GET["part"] . ".php");
} else {
    require_once (PATH_VIEWS . "profile.php");
}

require_once (PATH_VIEWS . "footer.php");