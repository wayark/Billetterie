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
        <div class=events id="event1">
            <div class="eventimg">
                <img src="<?= PATH_IMAGES . "branches.png"?>" alt="">
            </div>
            <div class="eventtext-container">
                <div id="containertextleft">
                    <p class="eventtitle eventtext">Muse en tournée (lyon)</p>
                    <p class="eventdate eventtext">26 décembre 2022</p>
                    <p class="eventdesc eventtext">Ceci est une description</p>
                </div>
                <div id="containertextright">
                    <p class="eventplace eventtext">Groupama Stadium</p>
                    <p class="eventcity eventtext">Décines-Charpieu</p>
                    <p class="eventplacesremaining eventtext">20 places restances</p>
                </div>
            </div>
        </div>
        <div class=events id="event2">
            <div class="eventimg">
                <img src="<?= PATH_IMAGES . "branches.png"?>" alt="">
                
            </div>
            <div class="eventtext-container">
                <div id="containertextleft">
                    <p class="eventtitle eventtext">Le roi lion</p>
                    <p class="eventdate eventtext">13 novembre 2022</p>
                    <p class="eventdesc eventtext">Ceci est une description</p>
                </div>
                <div id="containertextright">
                    <p class="eventplace eventtext">Théatre Morgador</p>
                    <p class="eventcity eventext">Lyon</p>
                    <p class="eventplacesremaining eventtext">150 places restances</p>
                </div>
            </div>
        </div>
    </article>
</section>

<?php
require_once PATH_VIEWS . 'footer.php';
?>
</body>