<?php
require_once './application/display/formatDate.php';
/**
 * @var Event $eventToDisplay The event to display
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/event.css">
    <title><?= $eventToDisplay->getEventInfo()->getEventName() ?></title>
</head>
<body>
<?php require_once PATH_VIEWS . 'header.php'; ?>
<div id="container">
    <div id="container-description-event">
        <div id="img-title-date">
            <img src="<?= $eventToDisplay->getEventInfo()->getPicture()->getPicturePath() ?>"
                 alt="<?= $eventToDisplay->getEventInfo()->getPicture()->getPictureDescription() ?>">
            <div id="title-date">
                <h1><?= $eventToDisplay->getEventInfo()->getEventName() ?></h1>
                <p><?= format_date($eventToDisplay->getEventInfo()->getEventDate()) ?></p>
            </div>
        </div>
        <div id="summary-and-informations">
            <div id="summary">
                <h1 class="title-section">Résumé</h1>
                <?= $eventToDisplay->getEventInfo()->getEventDescription() ?>
            </div>
            <div id="description-and-image-container">
                <div id="informations-event">
                    <h1 class="title-section">Informations</h1>
                    <div id="place">
                        <h3 class="title-desc">Lieu</h3>
                        <p><?= $eventToDisplay->getEventPlace()->getPlaceName() ?></p>
                        <p><?= $eventToDisplay->getEventPlace()->getStreet() ?></p>
                        <p><?= $eventToDisplay->getEventPlace()->getCity() ?></p>
                        <p><?= $eventToDisplay->getEventPlace()->getCountry() ?></p>
                    </div>
                    <div id="date">
                        <h3 class="title-desc">Date</h3>
                        <p><?= format_date($eventToDisplay->getEventInfo()->getEventDate()) ?></p>
                    </div>
                    <div id="places">
                        <h3 class="title-desc">Nombre de places restantes</h3>
                        <p><?= $eventToDisplay->getEventPlace()->getNbPlacesPit() ?> places en fosse</p>
                        <p><?= $eventToDisplay->getEventPlace()->getNbPlacesStair() ?> places en gradin</p>
                    </div>
                </div>
                <iframe
                        width="450"
                        height="250"
                        frameborder="0" style="border:0"
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps/embed/v1/place?key=<?= GOOGLE_API_TOKEN ?>&q=<?= $eventToDisplay->getEventPlace()->getStreet() ?>,<?= $eventToDisplay->getEventPlace()->getCity() ?>,<?= $eventToDisplay->getEventPlace()->getCountry() ?>"
                        allowfullscreen>
                </iframe>
            </div>
            <button id="btn-book">Ajouter au panier</button>
        </div>
    </div>
</div>
<?php require_once PATH_VIEWS . 'footer.php'; ?>
</body>
</html>