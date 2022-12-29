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
        <!--<div class="eventList-exempleEvent" id="eventList-exempleEvent">
            <div class="eventImg">
                <a href="">
                    <img src="museImage.png" alt="imageEvent">
                </a>
            </div>
            <div class="eventTitre">
                <h1>Muse en tourné (Lyon)</h1>
            </div>

            <div class="addButton">
                <a href="./index.php?page=addEvent">
                    <button>Ajouter Événement</button>
                </a>
            </div>
        </div>-->


    </section>


<?php require_once(PATH_VIEWS . "footer.php"); ?>