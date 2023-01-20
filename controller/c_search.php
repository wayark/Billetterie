<?php

$presenter = new SearchPresenter($_GET, $_POST);

$display = $presenter->formatDisplay();

require_once PATH_VIEWS . 'search.php';