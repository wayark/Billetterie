<?php

$presenter = new ReceptionPresenter(null, null);

$displayArray = $presenter->formatDisplay();

require_once (PATH_VIEWS . 'reception.php');