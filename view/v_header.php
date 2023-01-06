<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= PATH_CSS ?>style.css" rel="stylesheet">
    <link href="<?= PATH_CSS ?>reception.css" rel="stylesheet">
    <title>Waticket</title>
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
            echo '<a href="./?page=deconnection">
                    <button class="headerButton cartButton">
                        <img src="' . PATH_IMAGES . 'logos/deconnection.png" alt="Deconnexion" class="cart">
                    </button>
                    </a>';
        }
        ?>
        <a href="./?page=connection">
            <button class="headerButton accountButton">Mon compte</button>
        </a>
        <a href="./?page=cart">
            <button class="headerButton cartButton">
                <img src="<?= PATH_IMAGES ?>/logos/panier.png" alt="cart" class="cart">
            </button>
        </a>
    </div>

</header>
<nav>
    <div class="concert-nav">
        <p>Concert</p>
    </div>
    <div class="search-nav">
        <p>Recherche</p>
    </div>
    <div class="contact-nav">
        <p>Contact</p>
    </div>
</nav>