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
    <link href="<?= PATH_CSS ?>checkTickets.css" rel="stylesheet">
</header>
<body>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<main>
    <div>
        <h1><</h1>
    </div>
    <section>

    </section>
    <div>
        <h1>></h1>
    </div>
</main>

<?php require_once(PATH_VIEWS . 'footer.php'); ?>
</body>