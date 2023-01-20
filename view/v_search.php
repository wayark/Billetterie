<?php
/**
 * @var array{events: string} $display
 */
?>
<html lang="fr">
<head>
    <title>Recherche</title>
    <link rel="stylesheet" href="<?= PATH_CSS ?>reception.css">
    <link rel="stylesheet" href="<?= PATH_CSS . 'search.css' ?>">
    <link rel="stylesheet" href="<?= PATH_MEDIA . 'Search.css' ?>">
</head>
<body>
<?php require_once PATH_VIEWS . 'header.php' ?>

<main>
    <form id="form-search" method="get" action="./">
        <input type="hidden" name="page" value="search">
        <input type="hidden" name="reset" value="" id="resetSubmit">
        <div id="point" onclick="{
            document.getElementById('resetSubmit').value = 'true';
            document.getElementById('form-search').submit();
        }">
            <div></div>
        </div>
        <input type="text" id="text-field" name="text-field" placeholder="Recherche par titre ...">
        <input type="text" id="artist-field" name="artist-field" placeholder="Recherche par artiste ...">
        <p>Filtre</p>
        <label id="select-trie-label" for="select-trie">Trier par</label>
        <select id="select-trie" name="sort">
            <option value="none">-</option>
            <option value="date">Date</option>
            <option value="name">Nom</option>
            <option value="remaining">Places restantes</option>
        </select>
        <div id="separator"></div>
        <input type="text" id="text-city" placeholder="Recherche par ville ..." name="city">
        <div id="date-period">
            <label for="start-date" id="start-date-label">Du</label>
            <input type="date" id="start-date" name="start-date">
            <label for="end-date">au</label>
            <input type="date" id="end-date" name="end-date">
        </div>
        <select id="estDisponible" name="available">
            <option value="none">-</option>
            <option value="available">Disponible</option>
            <option value="not-available">Passé</option>
        </select>

        <button name="submit-button" type="submit">Rechercher</button>
    </form>

    <div>
        <?= $display['events'] ?>
    </div>

</main>

<?php require_once PATH_VIEWS . 'footer.php' ?>
</body>
</html>