<?php
/**
 * @var array{events: string} $display
 */
?>
<html lang="fr">
<head>
    <title>Recherche</title>
    <link rel="stylesheet" href="<?= PATH_CSS . 'search.css' ?>"
</head>
<body>
<?php require_once PATH_VIEWS . 'header.php' ?>

<main>
    <form method="get" action="./index.php">
        <input type="hidden" name="page" value="search">
        <div id="point">
            <div></div>
        </div>
        <input type="text" id="text-field" name="text-field" placeholder="Recherche par nom ...">
        <p>Filtre</p>
        <label id="select-trie-label" for="select-trie">Trier par</label>
        <select id="select-trie">
            <option value="none">-</option>
        </select>
        <div id="separator"></div>
        <input type="text" id="text-city" placeholder="Ville ...">
        <div id="date-period">
            <label for="start-date" id="start-date-label">Du</label>
            <input type="date" id="start-date">
            <label for="end-date">au</label>
            <input type="date" id="end-date">
        </div>
        <select id="estDisponible">
            <option value="none">-</option>
            <option value="disponible">Disponible</option>
            <option value="passee">Passé</option>
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