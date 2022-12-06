<?php require_once(PATH_VIEWS . 'header.php'); //header of the page
?>
    <link href="<?= PATH_CSS ?>accountManagement.css" rel="stylesheet">
    <link href="<?= PATH_CSS ?>accountManagement.js" rel="s">
    <main>
        <section>
            <h1>Mon Compte</h1>
            <div>
                <img src="./asset/image/IMG_1394.jpg">
                <form>
                    <div class="nomPrenom">
                        <label>Prénom : </label>
                        <p id="prenomA">Mathis</p>
                        <input id="prenomE" type="text">
                        <label>Nom : </label>
                        <p id="nomA">Toinon</p>
                        <input id="nomE" type="text">
                    </div>
                    <div>
                        <label>Email : </label>
                        <p id="mailA">toinon.math@gmail.com</p>
                        <input id="mailE" type="text">
                    </div>
                    
                    <button id="account" >Changer mon mot de passe</button>
                </form>
            </div>

        </section>
    </main>
    <script src="<?=PATH_SCRIPTS?>accountManagement.js"></script>
<?php require_once(PATH_VIEWS . 'footer.php'); //header of the page
?>