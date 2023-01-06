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


</section>


<?php require_once(PATH_VIEWS . "footer.php"); ?>