<?php require_once PATH_VIEWS . "header.php"; ?>
<head>
    <title>Evenements - @NapsDeMarseille</title>
    <link rel="stylesheet" href="<?= PATH_CSS ;?>userEvents.css">
    <link rel="stylesheet" href="<?= PATH_CSS ;?>menuProfileAndAccountManagement.css">
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
            <div class="events">
                <div class="participated">
                    <p></p>
                    <p></p>
                </div>
                <div class="organized">
                    <p></p>
                    <p></p>
                </div>
            </div>
        </section>
    </div>
</section>
<?php require_once PATH_VIEWS . "footer.php"; ?>
