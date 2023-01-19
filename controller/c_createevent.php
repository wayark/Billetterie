 <?php

if (session_id() == '') session_start();

$presenter = new CreateEventPresenter($_GET, $_POST);
$display = $presenter->formatDisplay();

require_once(PATH_VIEWS . 'createevent.php');