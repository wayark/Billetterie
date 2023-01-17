<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= PATH_CSS ?>style.css" rel="stylesheet">
</head>

<body>
<header>
    <a href="./">
        <img src="<?= PATH_IMAGES ?>/logos/logoWatiGold.png" alt="logo" class="logo">
    </a>
    <div class="header-right-button">
        <?php
        if (session_id() == '') session_start();
        if (isset($_SESSION) and isset($_SESSION['user'])) {
              ?><a href="./?page=deconnection">
                    <button class="headerButton disconnectButton">
                        <img src="<?= PATH_IMAGES ?>logos/deconnection.png" alt="Deconnexion" class="deconnexion-img icon-img">
                    </button>
                </a>
                <a href="./?page=notifications">
                    <button class="headerButton notifications-button">
                        <img src="<?= PATH_IMAGES ?>logos/black-bell.png" alt="Notifications" class="notification-img icon-img">
                    </button>
                    <div class="circle-nb-notifications">
                        <h2 class="nb-notifications-text">3</h2>
                    </div>
                </a>
                <a href="./?page=orders">
                    <button class="headerButton orderButton">
                        <img src="<?= PATH_IMAGES ?>/logos/orders.png" alt="order-icon" class="cart-img icon-img">
                    </button>
                </a>
                <a href="./?page=cart">
                    <button class="headerButton cartButton">
                        <img src="<?= PATH_IMAGES ?>/logos/dark-cart.png" alt="cart-icon" class="cart-img icon-img">
                    </button>
                </a>
    <?php } ?>
        <a href="./?page=connection">
            <?php if(!isset($_SESSION['user'])) $title = "Se connecter"; else $title = "Mon compte"; ?>
            <button class="headerButton accountButton"><?= $title ?></button>
        </a>
    </div>
</header>
<nav>
    <div class="concert-nav">
        <p>Accueil</p>
    </div>
    <div class="search-nav">
        <p>Recherche</p>
    </div>
    <div class="contact-nav">
        <p>Contact</p>
    </div>
</nav>