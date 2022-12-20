<?php require_once(PATH_VIEWS . 'header.php'); //header of the page
?>
    <link href="<?= PATH_CSS ?>accountManagement.css" rel="stylesheet">
    <link href="<?= PATH_CSS ?>accountManagement.js" rel="s">
    <main>
        <section>
            <h1>Mon Compte</h1>
            <div id="id">
                <img src="./asset/image/IMG_1394.jpg">
                <div id="coteD">
                    <form action="/controller/c_accountManagement.php" method="GET">
                        <div class="nomPrenom">
                            <label>Prénom : </label>
                            <p id="prenomA">Mathis</p>
                            <input id="prenomE" type="text" name="prenomA">
                            <label>Nom : </label>
                            <p id="nomA">Toinon</p>
                            <input id="nomE" type="text" name="nomA">
                        </div>
                        <div>
                            <label>Email : </label>
                            <p id="mailA">toinon.math@gmail.com</p>
                            <input id="mailE" type="text" name="mailA">
                        </div>
                        <input id="submit" type="submit" name="submit" value="change !">
                    </form>
                    <button id="account" >Changer mon mot de passe</button>
                </div>
            </div>

        </section>
    </main>
    <script src="<?=PATH_SCRIPTS?>accountManagement.js"></script>
<?php require_once(PATH_VIEWS . 'footer.php'); //header of the page
?>