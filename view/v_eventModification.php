<?php require_once(PATH_VIEWS . 'header.php');
?>
    <link href="<?= PATH_CSS ?>eventModification.css" rel="stylesheet">

    <section class="eventModification">
        <div class="event-modification-frame">
            <div class="event-modification-title">
                <div class="imageFrame"><img src="<?= PATH_IMAGES ?>museImage.png" alt="museImage" class="imageEvent">
                </div>
                <div class="event-modification-name">
                    <h1>Muse en tournée (lyon)</p>
                        <h2>26 décembre 2022</p>
                </div>

            </div>

            <form action="Post">
                <div class="event-modification-summary">
                    <h2>Résumé</h2>
                    <textarea name="resume" id="" cols="30" rows="10" maxlength="1000"></textarea>
                </div>

                <div class="event-modification-information">
                    <h2>Informations</h2>

                    <div class="event-modification-place">
                        <h3>Lieu</h3>
                        <input type="text" class="textPlace" name="place">
                    </div>

                    <div class="event-modification-ticket">
                        <div>
                            <h3>Date</h3>
                            <input type="date" class="textDate" name="date">
                        </div>
                        <div>
                            <h3>Nombre de ticket</h3>
                            <input type="number" name="ticketNumber">
                        </div>
                        <div>
                            <h3>Prix des tickets</h3>
                            <input type="number" name="ticketPrice">
                        </div>
                    </div>
                    <button class="modify">Modifier</button>
                </div>
            </form>

        </div>

    </section>


<?php require_once(PATH_VIEWS . 'footer.php');
?>