<?php require_once(PATH_VIEWS . 'header.php');
?>
<link href="<?= PATH_CSS ?>eventModification.css" rel="stylesheet">

<section class="eventModification">
    <div class="event-modification-frame">
        <div class="event-modification-title">
            <div class="imageFrame"><img src="<?= PATH_IMAGES ?>museImage.png" alt="museImage" class="imageEvent"></div>
            <div class="event-modification-name">
                <h1>Muse en tournée (lyon)</p>
                    <h2>26 décembre 2022</p>
            </div>

        </div>
        <div class="event-modification-summary">
            <h2>Résumé</h2>
            <input type="text">
            <button class="modify">Modifier</button>
        </div>
        <div class="event-modification-information">
            <div class="event-modification-place">

            </div>

            <div class="event-modification-date">

            </div>

            <div class="event-modification-ticket">
                <div class="event-modification-ticket-number">

                </div>
                <div class="event-modification-ticket-price"></div>
            </div>
        </div>
    </div>

</section>


<?php require_once(PATH_VIEWS . 'footer.php');
?>