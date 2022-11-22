<?php require_once(PATH_VIEWS . 'header.php'); //header of the page
?>
    <link href="<?= PATH_CSS ?>accountManagement.css" rel="stylesheet">
    <link href="<?= PATH_CSS ?>accountManagement.js" rel="s">
    <main>
        <section>
            <h1>Mon Compte</h1>
            <div>
                <img src="./asset/image/IMG_1394.jpg">
                <div>
                    <div class="nomPrenom">
                        <h2>Prénom : Mathis</h2>
                        <h2>Nom : Toinon</h2>
                    </div>
                    <h2>Email : toinon.math@gmail.com</h2>
                    <button id="">Changer mon mot de passe</button>
                </div>
            </div>

        </section>
    </main>
    <script src="<?=PATH_SCRIPTS?>accountManagement.js"></script>
<?php require_once(PATH_VIEWS . 'footer.php'); //header of the page
?>