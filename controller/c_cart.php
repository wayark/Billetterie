<?php

require_once PATH_PRESENTER . "CartPresenter.php";

$cart = new CartPresenter($_GET, $_POST);

require_once PATH_VIEWS . "cart.php";