<?php
/**
 * @var array<Event> $tendancies The tendancies to display
 * @var array{events: string} $displayArray The data to be displayed
 */
?>
<head>
    <link rel="stylesheet" href="<?= PATH_CSS ?>reception.css">
    <link rel="stylesheet" href="<?= PATH_MEDIA ?>Reception.css">
    <script src="<?= PATH_SCRIPTS ?>reception.js" defer></script>
    <title>Waticket</title>
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
            <div style="background-image:url(<?php echo $tendancies[1]->getEventInfo()->getPicture()->getPicturePath(); ?>);"></div>
            <div style="display:none"><p><?= $tendancies[1]->getEventInfo()->getEventName() ;?><p></div>
        </a>
        <a class="tendancies t2" href="?page=event&event=<?php echo $tendancies[0]->getIdEvent() ?>">
            <div style="background-image:url(<?php echo $tendancies[0]->getEventInfo()->getPicture()->getPicturePath(); ?>);"></div>
            <div><p><?= $tendancies[0]->getEventInfo()->getEventName() ;?><p></div>
        </a>
        <a class="tendancies t3" href="?page=event&event=<?php echo $tendancies[2]->getIdEvent() ?>">
            <div style="background-image: url(<?php echo $tendancies[2]->getEventInfo()->getPicture()->getPicturePath(); ?>);"></div>
            <div style="display:none"><p><?= $tendancies[2]->getEventInfo()->getEventName() ;?></p></div>
        </a>
        <div id="moveCarouselRight" class="moveCarousel" onclick="moveCarousel(this);" onmouseover="colorArrow(this);" onmouseleave="uncolorArrow(this);">
            <div></div>
        </div>
    </div>
    <div id="titlepage">
        <p>Tous nos événements</p>
    </div>
    <form id="searchconcert" action="./?page=search&reset=&artist-field=&sort=none&city=&start-date=&end-date=&available=none&submit-button=" method="get">
        <div id="point">
            <div></div>
        </div>
        <input type="hidden" name="page" value="search">
        <input type="hidden" name="reset" value="">
        <input type="hidden" name="artist-field" value="">
        <input type="hidden" name="sort" value="none">
        <input type="hidden" name="city" value="">
        <input type="hidden" name="start-date" value="">
        <input type="hidden" name="end-date" value="">
        <input type="hidden" name="available" value="none">
        <input type="hidden" name="submit-button" value="">
        <input type="text" placeholder="Rechercher un concert..." name="text-field" required>
        <button type="submit" id="searchbutton">
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
