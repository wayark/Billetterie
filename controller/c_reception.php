<?php

require_once './model/database/dao/EventDAO.php';
require_once './application/presenter/ReceptionPresenter.php';

$presenter = new ReceptionPresenter(null, null);

$displayArray = $presenter->formatDisplay();

require_once (PATH_VIEWS . 'reception.php');