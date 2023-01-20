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

<main class="main-container">
    <div class="btn-container">
        <?php if ($presetDisplay['nb-tickets'] > 1) { ?>
        <div class="button" onclick="checkOtherTicket(-1)">
            <h1><</h1>
        </div>
        <?php } ?>
    </div>
    <section class="ticket-container">
        <div class="ticket-elements-container">
            <?= $display['initial-ticket'] ?>
        </div>
        <?= $presetDisplay['preset-tickets'] ?>
        </section>
        <div class="btn-container">
        <?php if ($presetDisplay['nb-tickets'] > 1) { ?>
        <div class="button" onclick="checkOtherTicket(+1)">
            <h1>></h1>
        </div>
        <?php } ?>
    </div>
</main>
<div class="nb-tickets-container">
    <p class="to-modify">1</p>
    <p>/</p>
    <p class="to-modify"><?= $presetDisplay['nb-tickets'] ?></p>
</div>

<?= $display['tickets'] ?>

<?php require_once(PATH_VIEWS . 'footer.php'); ?>
</body>