<?php
require_once './application/formatDate.php';
/**
 * @var array<int, Event> $allEvents Array of all the events in base
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
            <img src="<?= PATH_IMAGES . "branches.png"?>" alt="">
        </div>
        <div class="tendancies t1">
            <img src="<?= PATH_IMAGES . "branches.png"?>" alt="">
        </div>
        <div class="tendancies t3">
            <img src="<?= PATH_IMAGES . "branches.png"?>" alt="">
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
        <?php
        for ($i = 0; $i < count($allEvents) && $i <= 5; $i++) {
            $event = $allEvents[$i];
            echo '<div class=events>';
            echo    '<div class=eventimg>';
            echo    '<img src="'.$event->getEventInfo()->getPicture()->getPicturePath().'" alt="'.$event->getEventInfo()->getPicture()->getPictureName().'">';
            echo    '</div>';
            echo '<div class="eventtext-container">';
            echo '<div id="containertextleft">
                    <p class="eventtitle eventtext">'. $event->getEventInfo()->getEventName() .'</p>
                    <p class="eventdate eventtext">'. format_date($event->getEventInfo()->getEventDate()) .'</p>
                    <p class="eventdesc eventtext">'. $event->getEventInfo()->getEventDescription().'</p>
                  </div>';

            echo '<div id="containertextright">
                    <p class="eventplace eventtext">'.$event->getEventPlace()->getCountry().'</p>
                    <p class="eventcity eventext">'.$event->getEventPlace()->getCity().'</p>
                    <p class="eventplacesremaining eventtext">'. strval($event->getEventPlace()->getNbPlacesPit() + $event->getEventPlace()->getNbPlacesStair()). ' places restantes' .'</p>
                </div>';
            echo "</div></div>";
        }
        ?>
    </article>
</section>

<?php
require_once PATH_VIEWS . 'footer.php';
?>
</body>