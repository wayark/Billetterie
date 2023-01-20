 <?php

if (session_id() == '') session_start();

$presenter = new CreateEventPresenter($_GET, $_POST, $_FILES);
$display = $presenter->formatDisplay();

require_once(PATH_VIEWS . 'createevent.php');