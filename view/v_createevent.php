<?php require_once(PATH_VIEWS . 'header.php'); //header of the page

?>
<link rel="stylesheet" href=<?= PATH_CSS . "createevent.css" ?>>
<div id="pagecreateevent">
    <form method="post" action="./index.php?page=createevent" class="createeventForm">
        <h1>Inscription</h1>
        <input name="eventName" type="text" class="eventName" placeholder="Nom de l'évènement...">
        <input name="description" type="text" class="description"placeholder="Description...">
        <div>
            <input name="country" type="text" class="country" placeholder="Pays...">
            <input name="city" type="text" class="city" placeholder="Ville...">
        </div>
        <div>
            <input name="Hall" type="text" class="Hall"placeholder="Nom de Salle...">
            <input name="street" type="text" class="street"placeholder="Adresse...">
        </div>
        <div>
        <input name="Date" type="text" class="Date"placeholder="Date...">
        <select name="Artist" id="Artist-select">
            <?php 
            echo'<p>'.$allArtist.'</p>';
            for ($i = 0; $i < count($allArtist); $i++) {
                $artist = $allArtist[$i];
                echo '<option value="' .$artist->getFirstName().'-'.$artist->getLastName(). '"> '.$artist->getFirstName().' '.$artist->getLastName(). '</option>';
            }
            ?>
        </select>
        </div>
        <div>
            <input name="NbPlacesPit" type="number" class="NbPlacesPit"placeholder="Nb de place debout">
            <input name="NbSeatsStaircase" type="number" class="NbSeatsStaircase"placeholder="Nb de place assise">
        </div>
        <div>
            <input name="image" type="file" id="image" hidden/>
            <label id="label-image"for="image"><p>Choisie une image</p></label>
        </div>
        <button name="createevent" type="submit"class="createventButton">Créer l'évènement</button>
    </form>
</div>

<?php require_once(PATH_VIEWS . 'footer.php'); //header of the page
?>