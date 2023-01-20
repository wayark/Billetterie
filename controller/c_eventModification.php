<?php

$presenter = new EventModificationPresenter($_GET, $_POST);

$display = $presenter->formatDisplay();

if ($display['type'] == 'success') {
    require_once(PATH_VIEWS . "eventModification.php");
} else {
    require_once(PATH_VIEWS . "404.php");
}
