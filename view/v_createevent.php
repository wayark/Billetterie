<?php
/**
 * @var array{
 *     'event-types': string
 * } $display
 */
require_once(PATH_VIEWS . 'header.php'); //header of the page
?>
<head>
    <link rel="stylesheet" href=<?= PATH_CSS . "createevent.css" ?>>
    <link rel="stylesheet" href=<?= PATH_MEDIA . "CreateEvent.css" ?>>
</head>
    <div id="pagecreateevent">
        <form method="post" action="./index.php?page=createevent" class="createeventForm" enctype="multipart/form-data">
            <h1>Création évènement</h1>
            <input name="eventName" type="text" class="eventName" placeholder="Nom de l'évènement...">
            <textarea name="description" class="description" placeholder="Description ...">
                </textarea>
            <div>
                <input name="country" type="text" class="country" placeholder="Pays...">
                <input name="city" type="text" class="city" placeholder="Ville...">
            </div>
            <div>
                <input name="Hall" type="text" class="Hall" placeholder="Nom de Salle...">
                <input name="street" type="text" class="street" placeholder="Adresse...">
            </div>
            <div>
                <input name="Date" type="datetime-local" class="Date" placeholder="Date...">
                <select name="event-type">
                    <?= $display['event-types'] ?>
                </select>
            </div>
            <div>
                <input name="artist-stage" type="text" id="artist-select" placeholder="Nom de scène de l'artiste ...">
                <input name="artist-first" type="text" id="artist-select" placeholder="Prénom de l'artiste ...">
                <input name="artist-last" type="text" id="artist-select" placeholder="Nom de l'artiste ...">
            </div>
            <div>
                <textarea name="biographie" class="description" placeholder="Biographie ...">
                    </textarea>
            </div>
            <input type="hidden" name="last-pricing-id" id="max-pricing-id" value="1">
            <div id="pricings">
                <div id="example-pricing">
                    <button class="createventButton" style="display: none" onclick="removePricing(event)" type="button">-</button>
                    <button class="createventButton" onclick="addPricing()" type="button">+</button>
                    <input name="pricing-name-0" type="text" placeholder="Nom du tarif">
                    <input name="pricing-price-0" type="number" placeholder="Prix">
                    <input name="pricing-max-quantity-0" type="number" placeholder="Nombre de places max">
                </div>
            </div>
            <div>
                <input name="image-event" type="file" id="image" hidden/>
                <label id="label-image" for="image"><p>Choisissez une image</p></label>
            </div>
            <button name="createevent" type="submit" class="createventButton">Créer l'évènement</button>
        </form>

    </div>

<script src=<?= PATH_SCRIPTS . "createevent.js" ?>></script>
<?php require_once(PATH_VIEWS . 'footer.php'); //header of the page
?>