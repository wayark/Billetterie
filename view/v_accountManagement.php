<?php
/**
 * @var array{
 *     user: array{
 *     picturePath: string,
 *     pictureDescription: string,
 *     firstName: string,
 *     lastName: string,
 *     mail: string,
 *     birthDateNoFormat: string,
 *     birthDate: string,
 *     address: string,
 *     pictureFileName: string,
 *     favoritePaymentMethod: string
 *      },
 *     paymentMethods: string,
 *     buttons: string,
 *     resultDisplay: ?array{
 *     message: string,
 *     type: string
 *     },
 *     titre: string
 * } $display Array containing all the data to display
 */
?>
<head>
    <link href="<?= PATH_CSS ?>accountManagement.css" rel="stylesheet">
    <link href="<?= PATH_CSS ?>menuProfileAndAccountManagement.css" rel="stylesheet">
    <link href="<?= PATH_MEDIA ?>AccountManagement.css" rel="stylesheet">
    <script src="<?= PATH_SCRIPTS ?>menuProfileAccountManagement.js"></script>
    <title>Mon compte</title>
</head>
<body>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<main>
    <section>
        <div class="menu-account menu">
            <ul>
                <li class="actual-page">
                    <a class="menu-text" href="?page=connection" onmouseover="colorBar(this)" onmouseout="uncolorBar(this)">Compte</a>
                    <div class="menu-bar"></div>
                </li>
                <li>
                    <a class="menu-text" href="?page=connection&part=profile" onmouseover="extendBar(this)" onmouseout="shrinkBar(this)">Profil</a>
                    <div class="menu-bar"></div>
                </li>
            </ul>
        </div>
        <div class="title-account-mangement">
            <h1><?= $display['titre'] ?></h1>
        </div>
        <div id="sides-container">
            <div id="coteG">
                <button class="styleButton" id="account">Modifier mes informations</button>
                <img src="<?= $display['user']['picturePath'] ?>"
                     alt="<?= $display['user']['pictureDescription'] ?>">
                <?= ErrorDisplayService::displayError($display['resultDisplay'], 'registerDisplay') ?>
                <form method="post" action="./?page=connection" id="form-download-data">
                    <button name="dldata" class="download-data">Generer mes données (JSON)</button>
                </form>
            </div>
            <div id="coteD">
                <form action="./index.php?page=accountManagement" method="POST" enctype="multipart/form-data">
                    <label for="prenomE">Prénom</label>
                    <div>
                        <p id="prenomA"><?= $display['user']['firstName'] ?></p>
                        <input id="prenomE" type="text" name="prenomA"
                               placeholder="<?= $display['user']['firstName'] ?>">
                    </div>

                    <label for="nomE">Nom</label>
                    <div>
                        <p id="nomA"><?= $display['user']['lastName'] ?></p>
                        <input id="nomE" type="text" name="nomA" placeholder="<?= $display['user']['lastName'] ?>">
                    </div>

                    <label for="mailE">Email</label>
                    <div>
                        <p id="mailA"><?= $display['user']['mail'] ?></p>
                        <input id="mailE" type="text" name="mailA" placeholder="<?= $display['user']['mail'] ?>">
                    </div>

                    <label for="naissanceE">Date de naissance</label>
                    <div>
                        <p id="naissanceA"><?= $display['user']['birthDate'] ?></p>
                        <input id="naissanceE" type="date" name="birthdate1"
                               value="<?= $display['user']['birthDateNoFormat'] ?>">
                    </div>

                    <label for="adresseE">Adresse</label>
                    <div>
                        <p id="adresseA"><?= $display['user']['address'] ?></p>
                        <input id="adresseE" type="text" name="address1"
                               placeholder="<?= $display['user']['address'] ?>">
                    </div>

                    <label for="photoE">Photo de profil</label>
                    <div>
                        <p id="photoA"><?= $display['user']['pictureFileName'] ?></p>
                        <input id="photoE" name="photoE" type="file" accept="image/*">
                    </div>

                    <label for="paymentMethodE">Moyen de paiement préféré</label>
                    <div>
                        <p id="paymentMethodA"><?= $display['user']['favoritePaymentMethod'] ?></p>
                        <select id="paymentMethodE" name="paymentMethod1">
                            <?= $display['paymentMethods'] ?>
                        </select>
                    </div>
                    <div class="container-right">

                    </div>

                    <button name="submit" type="submit" class="styleButton" id="submit" style="display: none">
                        Enregistrer les modifications
                    </button>
                </form>
                <div id="actionButtons">
                    <?= $display['buttons'] ?>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="<?= PATH_SCRIPTS ?>accountManagement.js"></script>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>
</body>