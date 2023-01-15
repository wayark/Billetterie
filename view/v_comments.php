<?php require_once PATH_VIEWS . "header.php"; ?>
<head>
    <title>Commentaires - @NapsDeMarseille</title>
    <link rel="stylesheet" href="<?= PATH_CSS ;?>userComments.css">
    <link rel="stylesheet" href="<?= PATH_CSS ;?>userCommentsEventsCommon.css">
    <link rel="stylesheet" href="<?= PATH_CSS ;?>menuProfileAndAccountManagement.css">
    <script src="<?= PATH_SCRIPTS ;?>menuProfileAccountManagement.js" defer></script>
    <script src="<?= PATH_SCRIPTS ;?>comments.js" defer></script>
</head>
<section id="main-container">
    <div class="colored-part-comments">
        <div class="menu">
            <ul>
                <li>
                    <a class="menu-text" href="?page=profile&user=" onmouseover="extendBar(this)" onmouseout="shrinkBar(this)">Profil</a>
                    <div class="menu-bar"></div>
                </li>
                <li>
                    <a class="menu-text" href="?page=profile&part=events&user=" onmouseover="extendBar(this)" onmouseout="shrinkBar(this)">Evenements</a>
                    <div class="menu-bar"></div>
                </li>
                <li class="actual-page">
                    <a class="menu-text" href="?page=profile&part=comments&user=" onmouseover="colorBar(this)" onmouseout="uncolorBar(this)">Commentaires</a>
                    <div class="menu-bar"></div>
                </li>
            </ul>
        </div>
        <section class="flex-section">
            <div class="username-container">
                <p>@</p>
                <p class="username-text">NapsDeMarseille</p>
            </div>
            <div class="comments-container">
                <div class="comments-title-section-container">
                    <h1 class="comments-title-preset">-</p>
                    <h1 class="comments-title">Ses commentaires</h1>
                </div>
            </div>
        </section>
    </div>
</section>
<?php require_once PATH_VIEWS . "footer.php"; ?>