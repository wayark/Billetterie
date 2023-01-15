<?php
/**
 * @var array<Event> $tendancies The tendancies to display
 * @var array{events: string} $displayArray The data to be displayed
 */
?>
<head>
    <link rel="stylesheet" href="../asset/css/reception.css">
    <script src="<?php echo PATH_ASSETS . "javascript/" ?>reception.js" defer></script>
</head>
<body>
<?php
require_once PATH_VIEWS . 'header.php';
?>

<section id="container">
    <div id="eventsimages">
        <div id="moveCarouselLeft" class="moveCarousel" onclick="moveCarousel(this);"  onmouseover="colorArrow(this);" onmouseleave="uncolorArrow(this);">
            <div></div>
        </div>
        <a class="tendancies t1" href="?page=event&event=<?= $tendancies[1]->getIdEvent() ?>">
            <div style="background-image:url(<?php echo $tendancies[1]->getEventInfo()->getPicture()->getPicturePath(); ?>);" draggable="false"></div>
        </a>
        <a class="tendancies t2" href="?page=event&event=<?= $tendancies[0]->getIdEvent() ?>">
            <div style="background-image:url(<?php echo $tendancies[0]->getEventInfo()->getPicture()->getPicturePath(); ?>);" draggable="false"></div>
        </a>
        <a class="tendancies t3" href="?page=event&event=<?= $tendancies[2]->getIdEvent() ?>">
            <div style="background-image: url(<?php echo $tendancies[2]->getEventInfo()->getPicture()->getPicturePath(); ?>);" draggable="false"></div>
        </a>
        <div id="moveCarouselRight" class="moveCarousel" onclick="moveCarousel(this);" onmouseover="colorArrow(this);" onmouseleave="uncolorArrow(this);">
            <div></div>
        </div>
    </div>
    <div id="titlepage">
        <p>Tous nos événements</p>
    </div>
    <form id="searchconcert" action="./index.php" method="get">
        <input type="hidden" name="page" value="reception">
        <a href="./index.php">
            <div id="point">
                <div></div>
            </div>
        </a>
        <input type="text" placeholder="Rechercher un concert..." name="search" required>
        <button type="submit" id="searchbutton" name="submit">
            <img src="<?php echo PATH_IMAGES . 'useful/glass.png';?>" alt="">
        </button>
    </form>
    <article id="events-container">
        <?= $displayArray['events'] ?>
    </article>
</section>

<?php
require_once PATH_VIEWS . 'footer.php';
?>
</body>
