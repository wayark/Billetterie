<?php
/**
 * @var array{
 *     eventName: string,
 *     eventPicture:string,
 *     eventPictureDescription: string,
 *     eventDate: string,
 *     eventDescription: string,
 *     eventPlaceName: string,
 *     eventPlaceStreet: string,
 *     eventPlaceCity: string,
 *     eventPlaceCountry: string,
 *     eventPlaceNbPlacesPit: string,
 *     eventPlaceNbPlacesStair: string} $display The data to display
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/event.css">
    <title><?= $display['eventName'] ?></title>
</head>
<body>
<?php require_once PATH_VIEWS . 'header.php'; ?>
<div id="container">
    <div id="container-description-event">
        <div id="img-title-date">
            <img src="<?= $display['eventPicture']?>"
                 alt="<?= $display['eventPictureDescription'] ?>">
            <div id="title-date">
                <h1><?= $display['eventName'] ?></h1>
                <p><?= $display['eventDate'] ?></p>
            </div>
        </div>
        <div id="summary-and-informations">
            <div id="summary">
                <h1 class="title-section">Résumé</h1>
                <p><?= $display['eventDescription'] ?></p>
            </div>
            <div id="description-and-image-container">
                <div id="informations-event">
                    <h1 class="title-section">Informations</h1>
                    <div id="place">
                        <h3 class="title-desc">Lieu</h3>
                        <p><?= $display['eventPlaceName'] ?></p>
                        <p><?= $display['eventPlaceStreet'] ?></p>
                        <p><?= $display['eventPlaceCity'] ?></p>
                        <p><?= $display['eventPlaceCountry'] ?></p>
                    </div>
                    <div id="date">
                        <h3 class="title-desc">Date</h3>
                        <p><?= $display['eventDate'] ?></p>
                    </div>
                    <div id="places">
                        <h3 class="title-desc">Nombre de places restantes</h3>
                        <p><?= $display['eventPlaceNbPlacesPit'] ?> places en fosse</p>
                        <p><?= $display['eventPlaceNbPlacesStair'] ?> places en gradin</p>
                    </div>
                </div>
                <iframe
                        width="500vw"
                        height="350vh"
                        frameborder="0" style="border:0"
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps/embed/v1/place?key=<?= GOOGLE_API_TOKEN ?>&q=<?= $display['eventPlaceStreet'] ?>,
                        <?= $display['eventPlaceCity'] ?>,<?= $display['eventPlaceCountry'] ?>"
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