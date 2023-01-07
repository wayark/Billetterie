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
<header>
    <link href="<?= PATH_CSS ?>accountManagement.css" rel="stylesheet">
</header>
<body>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<main>
    <section>
        <h1><?= $display['titre'] ?></h1>
        <div id="sides-container">
            <div id="coteG">
                <button class="styleButton" id="account">Modifier mes informations</button>
                <img src="<?= $display['user']['picturePath'] ?>"
                     alt="<?= $display['user']['pictureDescription'] ?>">
                <?= ErrorDisplayService::displayError($display['resultDisplay'], 'registerDisplay') ?>
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