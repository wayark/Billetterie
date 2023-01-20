<?php

unset($_SESSION['user']);
unset($_SESSION);
session_unset();
session_destroy();

require_once PATH_CONTROLLERS . 'reception.php';