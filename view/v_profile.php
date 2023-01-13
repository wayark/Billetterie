<?php require_once PATH_VIEWS . "header.php"; ?>
<head>
    <title>Nom</title>
    <link rel="stylesheet" href="<?= PATH_CSS ;?>profile.css">
    <link rel="stylesheet" href="<?= PATH_CSS ;?>profilemenu.css">
    <script src="<?= PATH_SCRIPTS ;?>profile.js" defer></script>
</head>
<section id="main-container">
    <div class="colored-part-profile">
        <div class="menu">
            <ul>
                <li class="actual-page">
                    <a class="menu-text" href="?page=profile&user=" onmouseover="colorBar(this)" onmouseout="uncolorBar(this)">Profil</a>
                    <div class="menu-bar"></div>
                </li>
                <li>
                    <a class="menu-text" href="?page=profile&part=events&user=" onmouseover="extendBar(this)" onmouseout="shrinkBar(this)">Evenements</a>
                    <div class="menu-bar"></div>
                </li>
                <li>
                    <a class="menu-text" href="?page=profile&part=comments&user=" onmouseover="extendBar(this)" onmouseout="shrinkBar(this)">Commentaires</a>
                    <div class="menu-bar"></div>
                </li>
            </ul>
        </div>
        <div class="grid-section">
            <div class="img-user-container">
                <img class="profile-picture" src="<?= PATH_IMAGES ;?>users/naps.jpg" alt="profile picture" draggable="false">
            </div>
            <div class="personal-informations-user">
                <p>Naps</p>
                <p>Okay</p>
                <p>32 ans</p>
                <p class="adress">Rue de gamberge</p>
                <p>13</p>
                <p>Marseille</p>
                <p>naps@gmail.com</p>
                <p class="phone-number">0707070707</p> 
            </div>
        </div>
    </div>
</section>
<?php require_once PATH_VIEWS . "footer.php"; ?>

