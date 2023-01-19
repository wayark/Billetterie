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
 *     pricings: string,
 *     pricingsSelect: string} $display The data to display
 * @var string $textToDisplay
 * @var bool $posted
 * @var array{event: string} $ticketAddedToCart
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/event.css">
    <script src="<?php echo PATH_SCRIPTS . "justbought.js" ?>" defer></script>
    <title><?= $display['eventName'] ?></title>
</head>
<body>
<?php require_once PATH_VIEWS . 'header.php'; ?>
<?php if (!$posted) { ?>
    <div id="container">
        <div id="container-description-event">
            <div id="img-title-date">
                <img src="<?= $display['eventPicture'] ?>"
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
                        <div id="places">
                            <h3 class="title-desc">Nombre de places restantes</h3>
                            <?= $display['pricings'] ?>
                        </div>
                    </div>
                    <div id="date">
                        <h3 class="title-desc">Date</h3>
                        <p><?= $display['eventDate'] ?></p>
                        <iframe
                        width="100%"
                        height="80%"
                        style="border:0"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps/embed/v1/place?key=<?= GOOGLE_API_TOKEN ?>&q=<?= $display['eventPlaceName'] ?>+<?= $display['eventPlaceStreet'] ?>+<?= $display['eventPlaceCity'] ?>+<?= $display['eventPlaceCountry'] ?>">
                        </iframe>
                    </div>
                </div>
                <?php if (isset($_SESSION['user'])) { ?>
                    <form id="form-event" method="post">
                        <?= $display['pricingsSelect'] ?>
                        <div id="quantity">
                            <p for="quantity">Quantité</p>
                            <input type="number" id="quantity" name="quantity" min="1" max="10" value="1" required>
                        </div>
                        <button id="btn-book" type="submit">Ajouter au panier</button>
                    </form>
                <?php } else { ?>
                    <div id="form-event">
                        <?= $display['pricingsSelect'] ?>
                        <div id="quantity">
                            <p for="quantity">Quantité</p>
                            <input type="number" id="quantity" name="quantity" min="1" max="10" value="1" required>
                        </div>
                        <a id="btn-book" href="?page=connection">Ajouter au panier</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div id="addtocarttextcontainer">
        <div id="imgandtextaddtocart">
            <img src="<?= PATH_IMAGES . "/useful/justbought.png" ?>" alt="justbought" draggable="false">
            <h1 id="thankstoaddtocart" class="addtocarttext"><?php echo $textToDisplay; ?></h1>
        </div>
        <?= $ticketAddedToCart["event"] ?>
        <a href="?page=cart" class="buttonwherebuy" onmouseover="changeImgButtonColor(this);"
           onmouseout="unchangeImgButtonColor(this);">
            <img draggable="false" src="<?php echo PATH_IMAGES . "useful/cart.png"; ?>">Voir mon panier
        </a>
        <a href="?" class="buttonwherebuy" onmouseover="changeImgButtonColor(this);"
           onmouseout="unchangeImgButtonColor(this);">
            Continuer mes achats<img draggable="false" src="<?= PATH_IMAGES . "useful/doublearrow.png"; ?>">
        </a>
    </div>
<?php } ?>
<?php require_once PATH_VIEWS . 'footer.php'; ?>
</body>
</html>