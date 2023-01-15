<?php
require_once(PATH_VIEWS . "header.php");
/**
 * @var array{
 *     events: string
 * } $display
 */
?>
<link href="<?= PATH_CSS ?>eventList.css" rel="stylesheet">


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