<?php require_once(PATH_VIEWS . 'header.php');
require_once './application/formatDate.php';
?>
<link href="<?= PATH_CSS ?>eventModification.css" rel="stylesheet">

<section class="eventModification">
    <div class="event-modification-frame">
        <div class="event-modification-title">
            <div class="imageFrame"><img src="<?= $event->getEventInfo()->getPicture()->getPicturePath() ?>" alt="<?= $event->getEventInfo()->getPicture()->getPictureName() ?>" class="imageEvent"></div>
            <div class="event-modification-name">
                <h1><?= $event->getEventInfo()->getEventName() ?></p>
                    <h2><?= format_date($event->getEventInfo()->getEventDate()) ?></p>
            </div>

    <section class="eventModification">
        <div class="event-modification-frame">
            <div class="event-modification-title">
                <div class="imageFrame"><img src="<?= PATH_IMAGES ?>museImage.png" alt="museImage" class="imageEvent">
                </div>
                <div class="event-modification-name">
                    <h1>Muse en tournée (lyon)</p>
                        <h2>26 décembre 2022</p>
                </div>

        <form method="Post" action="./index.php?page=eventModification&&event=<?= $event->getIdEvent() ?>">
            <div class="event-modification-summary">
                <h2>Résumé</h2>
                <textarea name="resume" id="" cols="30" rows="10" maxlength="1000"></textarea>
            </div>

            <div class="event-modification-information">
                <h2>Informations</h2>

                <div class="event-modification-place">
                    <h3>Lieu</h3>
                    <div class="textPlace-container">
                        <input type="text" class="textPlaceCo" name="country" placeholder="Pays">
                        <input type="text" class="textPlaceCi" name="city" placeholder="Ville">
                        <input type="text" class="textPlaceS" name="street" placeholder="Rue">
                    </div>
                </div>

                <div class="event-modification-ticket">
                    <div>
                        <h3>Date</h3>
                        <input type="date" class="textDate" name="date">
                    </div>
                    <div>
                        <h3>Nombre de ticket</h3>
                        <input type="number" name="ticketNumberP" placeholder="fosse">
                        <input type="number" name="ticketNumberS" placeholder="gradin">
                    </div>
                    <div>
                        <h3>Prix des tickets</h3>
                        <input type="number" name="ticketPriceP" placeholder="fosse">
                        <input type="number" name="ticketPriceS" placeholder="gradin">
                    </div>
                    <button class="modify">Modifier</button>
                </div>
            </form>

        </div>

    </section>


<?php require_once(PATH_VIEWS . 'footer.php');
?>