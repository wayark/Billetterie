<?php require_once(PATH_VIEWS . "header.php"); ?>
<link href="<?= PATH_CSS ?>eventList.css" rel="stylesheet">


<section class="eventList">

    <div class="eventList-frame">
        <h1>Vos Événements</h1>

        <?php
        foreach ($EventOrga as $event) {
            echo '
            <div class="eventList-exempleEvent" id="eventList-exempleEvent">
                <div class="eventImg">
                    <a href="index.php?page=event&&event=' . $event->getIdEvent() . '">
                        <img src="' . $event->getEventInfo()->getPicture()->getPicturePath() . '" alt="' . $event->getEventInfo()->getPicture()->getPictureName() . '">
                    </a>
                </div>
                <div class="eventTitre">
                    <h1>' . $event->getEventInfo()->getEventName() . '</h1>
                </div>
                <div class="eventButton">
                    <a href="./index.php?page=eventModification&&event=' . $event->getIdEvent() . '">
                        <button>Modifier</button>
                    </a>
                    <a href="./index.php?page=statEvent&&event=' . $event->getIdEvent() . '">
                        <button>Statistiques</button>
                    </a>
                </div>
            </div>
                ';
        }
        ?>
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