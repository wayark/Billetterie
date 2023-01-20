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
    <link href="<?= PATH_CSS ?>checkTickets.css" rel="stylesheet">
    <link href="<?= PATH_MEDIA ?>CheckTickets.css" rel="stylesheet">
    <script src="<?= PATH_SCRIPTS ?>checkTickets.js" defer></script>
    <title>Mes tickets</title>
</head>
<body>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<main>
    <div class="button" onclick="checkOtherTicket(+1)">
        <h1><</h1>
    </div>
    <section class="transparent">
        <h2></h2>
        <h3></h3>
        <h3></h3>
    </section>
    <section id="ticket">
        <img src="<?= PATH_IMAGES ?>logos/violet-ticket.png" alt="ticket">
        <h2>Soirée mousse</h2>
        <h3>nombres de places achetées : 3</h3>
        <h3>Position : Gradin</h3>
    </section>
    <div class="button" onclick="checkOtherTicket(+1)">
        <h1>></h1>
    </div>
</main>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>
</body>