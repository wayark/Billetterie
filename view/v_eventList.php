<?php
require_once(PATH_VIEWS . "header.php");
/**
 * @var array{
 *     events: string
 * } $display
 */
?>
<head>
    <link href="<?= PATH_CSS ?>eventList.css" rel="stylesheet">
    <link href="<?= PATH_MEDIA ?>EventList.css" rel="stylesheet">
</head>


<section class="eventList">

    <div class="eventList-frame">
        <h1>Vos Événements</h1>
        <?= $display['events'] ?>
        <a href="index.php?page=createevent">
            <button class="addEvent">Ajouter un événement</button>
        </a>

    </div>

</section>


<?php require_once(PATH_VIEWS . "footer.php"); ?>