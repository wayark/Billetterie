<?php
require_once './application/presenter/EventPresenter.php';

$presenter = new EventPresenter(null, $_GET, $_POST);

$display = $presenter->formatDisplay();

require_once PATH_VIEWS . "event.php";