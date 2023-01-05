<?php
require_once './application/display/formatDate.php';
/**
 *
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
        <a class="tendancies t1" href="?page=event&event=<?php echo $tendancies[1]->getIdEvent() ?>">
            <div style="background-image:url(<?php echo $tendancies[1]->getEventInfo()->getPicture()->getPicturePath(); ?>);" draggable="false"></div>
        </a>
        <a class="tendancies t2" href="?page=event&event=<?php echo $tendancies[0]->getIdEvent() ?>">
            <div style="background-image:url(<?php echo $tendancies[0]->getEventInfo()->getPicture()->getPicturePath(); ?>);" draggable="false"></div>
        </a>
        <a class="tendancies t3" href="?page=event&event=<?php echo $tendancies[2]->getIdEvent() ?>">
            <div style="background-image: url(<?php echo $tendancies[2]->getEventInfo()->getPicture()->getPicturePath(); ?>);" draggable="false"></div>
        </a>
        <div id="moveCarouselRight" class="moveCarousel" onclick="moveCarousel(this);" onmouseover="colorArrow(this);" onmouseleave="uncolorArrow(this);">
            <div></div>
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
