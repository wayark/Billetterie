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
            echo '<a href="./?page=deconnection">
                    <button class="headerButton cartButton">
                        <img src="' . PATH_IMAGES . 'logos/deconnection.png" alt="Deconnexion" class="cart">
                    </button>
                    </a>';
        }
        if(!isset($_SESSION['user'])) $path = "./?page=connection";
        else $path = "./?page=cart";
        ?>
        <a href="./?page=connection">
            <?php if(!isset($_SESSION['user'])) $title = "Se connecter";
            else $title = "Mon compte"; ?>
            <button class="headerButton accountButton"><?= $title ?></button>
        </a>
        <a href="<?= $path?>">
            <button class="headerButton cartButton">
                <img src="<?= PATH_IMAGES ?>/logos/panier.png" alt="cart" class="cart">
            </button>
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