<head>
    <title>Nom</title>
    <link rel="stylesheet" href="<?= PATH_CSS ;?>profile.css">
    <link rel="stylesheet" href="<?= PATH_CSS ;?>profilemenu.css">
    <script src="<?= PATH_SCRIPTS ;?>profile.js"></script>
</head>
<section id="main-container">
    <div class="colored-part-profile">
        <div class="menu">
            <ul>
                <li>
                    <a class="menu-text" href="?page=profile" onmouseover="extendBar(this)" onmouseout="shrinkBar(this)">Profil</a>
                    <div class="menu-bar"></div>
                </li>
                <li>
                    <a class="menu-text" href="?page=profile&part=events" onmouseover="extendBar(this)" onmouseout="shrinkBar(this)">Evenements</a>
                    <div class="menu-bar"></div>
                </li>
                <li class="actual-page">
                    <a class="menu-text" href="?page=profile&part=comments" onmouseover="colorBar(this)" onmouseout="uncolorBar(this)">Commentaires</a>
                    <div class="menu-bar"></div>
                </li>
            </ul>
        </div>
    </div>
</section>
