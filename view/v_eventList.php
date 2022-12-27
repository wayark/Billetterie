<?php require_once(PATH_VIEWS . "header.php"); ?>
    <link href="<?= PATH_CSS ?>eventList.css" rel="stylesheet">


    <section class="eventList">

        <div class="eventList-frame">
            <h1>Vos Événements</h1>


            <div class="eventList-exempleEvent" id="eventList-exempleEvent">
                <div class="eventImg">
                    <img src="<?= PATH_IMAGES ?>museImage.png" alt="imageEvent">
                </div>
                <div class="eventTitre">
                    <h1>Muse en tourné (Lyon)</h1>
                </div>
                <div class="eventButton">
                    <a href="./index.php?page=eventModification">
                        <button>Modifier</button>
                    </a>
                    <a href="./index.php?page=statEvent">
                        <button>Statistiques</button>
                    </a>
                </div>
            </div>

            <div class="addButton">
                <a href="./index.php?page=addEvent">
                    <button>Ajouter Événement</button>
                </a>
            </div>
        </div>


    </section>


<?php require_once(PATH_VIEWS . "footer.php"); ?>