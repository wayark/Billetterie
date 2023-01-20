<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= PATH_CSS ?>style.css" rel="stylesheet">
    <link href="<?= PATH_MEDIA ?>Header.css" rel="stylesheet">
    <link href="<?= PATH_MEDIA ?>Footer.css" rel="stylesheet">
</head>

<body>
<header>
    <a href="./">
        <img src="<?= PATH_IMAGES ?>/logos/logoWatiGold.png" alt="logo" class="logo">
    </a>
    <div class="header-right-button">
        <?php
        if (isset($_SESSION) and isset($_SESSION['user'])) {
            $menu_initialiser = new MenuInitialiser();
            $nbInteractions = $menu_initialiser->export();
              ?><a href="./?page=deconnection">
                    <button class="headerButton disconnectButton">
                        <img src="<?= PATH_IMAGES ?>logos/deconnection.png" alt="Deconnexion" class="deconnexion-img icon-img">
                    </button>
                </a>
                <a href="./?page=notifications">
                    <button class="headerButton notifications-button">
                        <img src="<?= PATH_IMAGES ?>logos/black-bell.png" alt="Notifications" class="notification-img icon-img">
                    </button>
                     <?php if($nbInteractions["nbNotifications"] > 0){ ?>
                        <div class="circle-nb-notifications">
                            <h2 class="nb-notifications-text"><? $nbInteractions["nbNotifications"];?></h2>
                        </div>
                    <?php } ?>
                </a>
                <a href="./?page=checktickets">
                    <button class="headerButton orderButton">
                        <img src="<?= PATH_IMAGES ?>/logos/ticket.png" alt="order-icon" class="ticket-img icon-img">
                    </button>
                    <?php if($nbInteractions["nbTickets"] > 0){ ?>
                        <div class="circle-nb-notifications">
                            <h2 class="nb-notifications-text"><?= $nbInteractions["nbTickets"];?></h2>
                        </div>
                    <?php } ?>
                </a>
                <a href="./?page=cart" class="last-right-button">
                    <button class="headerButton cartButton">
                        <img src="<?= PATH_IMAGES ?>/logos/dark-cart.png" alt="cart-icon" class="cart-img icon-img">
                    </button>
                    <?php if($nbInteractions["nbCartItems"] > 0){ ?>
                        <div class="circle-nb-notifications">
                            <h2 class="nb-notifications-text"><?= $nbInteractions["nbCartItems"] ;?></h2>
                        </div>
                    <?php } ?>
                </a>
    <?php } ?>
        <a href="./?page=connection">
            <?php if(!isset($_SESSION['user'])) $title = "Se connecter"; else $title = "Mon compte"; ?>
            <button class="headerButton accountButton">
                <?= "<p>" . $title . "</p>"?>
                <img src="<?= PATH_IMAGES ?>/logos/myaccount.png" alt="account-icon" class="account-img icon-img">
            </button>
        </a>
    </div>
</header>
<nav>
    <div class="concert-nav">
        <a href="./">Accueil</a>
    </div>
    <div class="search-nav">
        <a href="./?page=search">Recherche</a>
    </div>
    <div class="contact-nav">
        <a href="./?page=contact">Contact</a>
    </div>
</nav>