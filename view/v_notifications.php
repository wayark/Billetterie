<?php require_once PATH_VIEWS . "header.php"; ?>
<head>
    <link href="<?= PATH_CSS ?>notifications.css" rel="stylesheet">
    <title>Notifications (3)</title>
</head>
<section class="main-container">
    <div class="colored-part-notifications">
        <div class="title-page-container">
            <h1 class="title-page">Mes notifications</h1>
            <div class="nb-notifications">
                <h1>(</h1>
                <h1>3</h1>
                <h1>) :</h1>
            </div>
        </div>
        <div class="notifications-container">
            <div class="bar"></div>
            <div class="friend-request">
                <a class="user-sender" href="./?page=profile&user=">
                    <img src="<?= PATH_IMAGES ?>/users/naps.jpg" alt="user">
                </a>
                <div class="message">
                    <h1>Vous avez reçu une demande d'ami de la part de </h1>
                    <a class="user-sender-text" href="./?page=profile&user=">
                        <h1>@</h1>
                        <h1>NapsDeMarseille</h1>
                    </a>
                </div>
                <div class="user-answer">
                    <form action="./?page=notifications" class="accept-form" method="post">
                        <input type="hidden" name="accept" value="">
                        <button type="submit"></button>
                    </form>
                    <form action="./?page=notifications" class="decline-form" method="post">
                        <input type="hidden" name="decline" value="">
                        <button type="submit"></button>
                    </form>
                </div>
            </div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="friend-request-accepted">
                <a class="user-sender" href="./?page=profile&user=">
                    <img src="<?= PATH_IMAGES ?>/users/naps.jpg" alt="user">
                </a>
                <div class="message">
                    <div class="request-first-line">
                        <a class="user-answer-text" href="./?page=profile&user=">
                            <h1>@</h1>
                            <h1>NapsDeMarseille</h1>
                        </a>
                        <h1>a accepté</h1>
                    </div>
                    <h1>votre demande d'ami</h1>
                </div>
                <img src="<?= PATH_IMAGES ?>logos/green-accept.png" alt="accepted" draggable="false">
            </div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="friend-request-declined">
                <a class="user-sender" href="./?page=profile&user=">
                    <img src="<?= PATH_IMAGES ?>/users/naps.jpg" alt="user">
                </a>
                <div class="message">
                    <div class="request-first-line">
                        <a class="user-answer-text" href="./?page=profile&user=">
                            <h1>@</h1>
                            <h1>NapsDeMarseille</h1>
                        </a>
                        <h1>a refusé</h1>
                    </div>
                    <h1>votre demande d'ami</h1>
                </div>
                <img src="<?= PATH_IMAGES ?>logos/red-decline.png" alt="accepted" draggable="false">
            </div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="approaching-event">
                <a href="./?page=event&event=2" class="event-redirection">
                    <img src="<?= PATH_IMAGES ?>events/wayark.jpg" alt="">
                </a>
                <div class="message">
                    <div class="approaching-event-first-line">
                        <h1>L'évènement</h1>
                        <a href="./?page=event&event=2" class="event-redirection">
                            <h1>Wayark</h1>
                        </a>
                    </div>
                    <h1> auquel vous participez arrive bientôt !</h1>
                    <p class="approaching-event-date">12/02/23</p>
                </div>
            </div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="sold-ticket">
                <a href="./?page=event&event=2" class="event-redirection">
                    <img src="<?= PATH_IMAGES ?>events/wayark.jpg" alt="">
                </a>
                <div class="message">
                    <h1>L'achat de votre ticket pour l'évènement</h1>
                    <a href="./?page=event&event=2" class="event-redirection-text">
                        <h1>Wayark</h1>
                    </a>
                    <div class="sold-ticket-last-line">
                        <h1>s'est déroulé avec succès.</h1>
                        <a href="./?page=" class="see-tickets">
                            <p>Voir mes billets</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="answer-comment">

            </div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="liked-comment-notification">

            </div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="disliked-comment-notification">

            </div>
            <div class="bar"></div>
        </div>
    </div>
</section>
<?php require_once PATH_VIEWS . "footer.php"; ?>