<?php require_once PATH_VIEWS . "header.php"; ?>
<head>
    <title>Evenements - @NapsDeMarseille</title>
    <link rel="stylesheet" href="<?= PATH_CSS . 'event.css' ?>">
    <link rel="stylesheet" href="<?= PATH_CSS ;?>userEvents.css">
    <link rel="stylesheet" href="<?= PATH_CSS ;?>userCommentsEventsCommon.css">
    <link rel="stylesheet" href="<?= PATH_CSS ;?>menuProfileAndAccountManagement.css">
    <link rel="stylesheet" href="<?= PATH_MEDIA ;?>MenuProfileAndAccountManagement.css">
    <link rel="stylesheet" href="<?= PATH_MEDIA ;?>UserEvents.css">
    <script src="<?= PATH_SCRIPTS ;?>menuProfileAccountManagement.js" defer></script>
    <script src="<?= PATH_SCRIPTS ;?>events.js" defer></script>
</head>
<section id="main-container">
    <div class="colored-part-events">
        <div class="menu">
            <ul>
                <li>
                    <a class="menu-text" href="?page=profile&user=" onmouseover="extendBar(this)" onmouseout="shrinkBar(this)">Profil</a>
                    <div class="menu-bar"></div>
                </li>
                <li class="actual-page">
                    <a class="menu-text" href="?page=profile&part=events&user=" onmouseover="colorBar(this)" onmouseout="uncolorBar(this)">Evenements</a>
                    <div class="menu-bar"></div>
                </li>
                <li>
                    <a class="menu-text" href="?page=profile&part=comments&user=" onmouseover="extendBar(this)" onmouseout="shrinkBar(this)">Commentaires</a>
                    <div class="menu-bar"></div>
                </li>
            </ul>
        </div>
        <section class="flex-section">
            <div class="username-container">
                <p>@</p>
                <p class="username-text">NapsDeMarseille</p>
            </div>
            <div class="info-share">
                <img src="<?= PATH_IMAGES?>useful/info-icon.png" alt="" draggable="false">
                <p class="info-share-text">Cet utilisateur a choisi de partager ses evenements récents.</p>
                <!-- <p class="info-share-text">Cet utilisateur a choisi de partager ses evenements récents qu'à ses amis.</p> -->
            </div>
            <div class="events-page-container">
                <div class="organized">
                    <div class="events-title-section-container">
                        <h1 class="events-title-preset">-</p>
                        <h1 class="events-title">Evenements organisés :</h1>
                    </div>
                    <div class="events-container">
                        <div class="event">
                            <a href="./?page=event&event=2">          
                                <img src="<?= PATH_IMAGES ?>events/bdsmousse.jpg" alt="">
                            </a>
                            <div class="info-event">
                                <p class="event-title">BDS Mousse</p>
                                <p class="event-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci fugiat assumenda non asperiores ut, maxime ratione mollitia repellendus enim facere blanditiis tempore eum eligendi animi minus distinctio a? Porro, repellat?</p>
                                <div class="border-event">
                                    <p class="event-place">Aix-en-Provence</p>
                                    <p class="event-date">Le 12/12/2020</p>
                                </div>
                            </div>
                        </div>
                        <div class="separator-bar"></div>
                        <div class="event">
                            <a href="./?page=event&event=2">          
                                <img src="<?= PATH_IMAGES ?>events/bdsmousse.jpg" alt="">
                            </a>
                            <div class="info-event">
                                <p class="event-title">BDS Mousse</p>
                                <p class="event-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci fugiat assumenda non asperiores ut, maxime ratione mollitia repellendus enim facere blanditiis tempore eum eligendi animi minus distinctio a? Porro, repellat?</p>
                                <div class="border-event">
                                    <p class="event-place">Aix-en-Provence</p>
                                    <p class="event-date">Le 12/12/2020</p>
                                </div>
                            </div>
                        </div>
                        <div class="separator-bar"></div>
                        <div class="event">
                            <a href="./?page=event&event=2">          
                                <img src="<?= PATH_IMAGES ?>events/bdsmousse.jpg" alt="">
                            </a>
                            <div class="info-event">
                                <p class="event-title">BDS Mousse</p>
                                <p class="event-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci fugiat assumenda non asperiores ut, maxime ratione mollitia repellendus enim facere blanditiis tempore eum eligendi animi minus distinctio a? Porro, repellat?</p>
                                <div class="border-event">
                                    <p class="event-place">Aix-en-Provence</p>
                                    <p class="event-date">Le 12/12/2020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="participated">
                    <div class="events-title-section-container">
                        <h1 class="events-title-preset">-</h1>
                        <h1 class="events-title">Evenements recents :</h1>
                    </div>
                    <div class="events-container">
                        <div class="event">
                            <a href="./?page=event&event=2">          
                                <img src="<?= PATH_IMAGES ?>events/bdsmousse.jpg" alt="">
                            </a>
                            <div class="info-event">
                                <p class="event-title">BDS Mousse</p>
                                <p class="event-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci fugiat assumenda non asperiores ut, maxime ratione mollitia repellendus enim facere blanditiis tempore eum eligendi animi minus distinctio a? Porro, repellat?</p>
                                <div class="border-event">
                                    <p class="event-place">Aix-en-Provence</p>
                                    <p class="event-date">Le 12/12/2020</p>
                                </div>
                            </div>
                        </div>
                        <div class="separator-bar"></div>
                        <div class="event">
                            <a href="./?page=event&event=2">          
                                <img src="<?= PATH_IMAGES ?>events/bdsmousse.jpg" alt="">
                            </a>
                            <div class="info-event">
                                <p class="event-title">BDS Mousse</p>
                                <p class="event-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci fugiat assumenda non asperiores ut, maxime ratione mollitia repellendus enim facere blanditiis tempore eum eligendi animi minus distinctio a? Porro, repellat?</p>
                                <div class="border-event">
                                    <p class="event-place">Aix-en-Provence</p>
                                    <p class="event-date">Le 12/12/2020</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
<?php require_once PATH_VIEWS . "footer.php"; ?>
