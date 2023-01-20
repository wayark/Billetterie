<?php require_once PATH_VIEWS . 'header.php'; ?>
<head>
    <title>Mon profil</title>
    <link href="<?= PATH_CSS ?>accountManagement.css" rel="stylesheet">
    <link href="<?= PATH_CSS ?>menuProfileAndAccountManagement.css" rel="stylesheet">
    <script src="<?= PATH_SCRIPTS ?>menuProfileAccountManagement.js" defer></script>
</head>
<main>
    <section>
        <div class="menu-account menu">
            <ul>
                <li>
                    <a class="menu-text" href="?page=connection" onmouseover="extendBar(this)" onmouseout="shrinkBar(this)">Compte</a>
                    <div class="menu-bar"></div>
                </li>
                <li class="actual-page">
                    <a class="menu-text" href="?page=connection&part=profile" onmouseover="colorBar(this)" onmouseout="uncolorBar(this)">Profil</a>
                    <div class="menu-bar"></div>
                </li>
            </ul>
    </section>
</main>
<?php require_once PATH_VIEWS . 'footer.php'; ?>