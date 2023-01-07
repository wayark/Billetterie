<?php
/**
 *
 * @var array{events: string} $displayArray The data to be displayed
 */
?>
<head>
    <link rel="stylesheet" href="../asset/css/reception.css">
</head>
<body>
<?php
require_once PATH_VIEWS . 'header.php';
?>

<section id="container">
    <div id="eventsimages">
        <div class="tendancies t2">
            <img src="<?= PATH_IMAGES . "events/branches.png" ?>" alt="">
        </div>
        <div class="tendancies t1">
            <img src="<?= PATH_IMAGES . "events/branches.png" ?>" alt="">
        </div>
        <div class="tendancies t3">
            <img src="<?= PATH_IMAGES . "events/branches.png" ?>" alt="">
        </div>
    </div>
    <div id="titlepage">
        <p>Tous nos événements</p>
    </div>
    <div id="searchconcert">
        <div id="point">
            <div></div>
        </div>
        <input type="text" placeholder="Rechercher un concert...">
    </div>
    <article id="events-container">
        <?= $displayArray['events'] ?>
    </article>
</section>

<?php
require_once PATH_VIEWS . 'footer.php';
?>
</body>
