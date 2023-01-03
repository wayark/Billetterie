<?php
require_once './application/display/formatDate.php';
require_once './application/display/errorDisplay.php';
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
    <link href="<?= PATH_CSS ?>statistic.css" rel="stylesheet">
</header>
<body>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<main>
    <section>
        <div>
            <img src="<?= PATH_IMAGES?>/events/bdsmousse.jpg" alt="">
            <div>
                <h1>Nom de l'évènement</h1>
                <p>26 décembre 2022</p>
            </div>
        </div>
        <h2>statistique</h2>
        <div>
            <canvas></canvas>
            <div>
                <p>Nombre de places vendu :</p>
                <div>
                    <p>fausse : </p> <p></p>
                </div>
                <div>
                    <p>gradin : </p> <p></p>
                </div>

            </div>

        </div>
    </section>
</main>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>
</body>