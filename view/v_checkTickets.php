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
        <div class="button" onclick="checkOtherTicket(-1)">
            <h1><</h1>
        </div>
    </div>
    <section class="ticket-container">
        <div class="ticket-elements-container">
            <div class="text-container">
                <h1 class="event-name">Soirée mousse</h1>
                <h2 class="ticket-type">Gradin</h2>
                <h2 class="nb-places">3 places</h2>
            </div>
            <form action="./?page=checktickets" method="post" class="button-generate-pdf">
                <input type="hidden" name="event_id" value="'. $ticket->getIdTicket() .'">
                <button type="submit" name="generate-pdf" class="flex-row violet-button main-button">
                    <p>Télécharger mon billet</p>
                    <img src="./asset/image//logos/pdf-icon.png" alt="">
                </button>
            </form>
        </div>
        <div class="ticket first-ticket">
            <img src="<?= PATH_IMAGES ?>logos/violet-ticket.png" alt="ticket" class="img-ticket it1" draggable="false">
            <div class="hidden-text" display="none">

            </div>
        </div>
        <div class="ticket second-ticket">
            <img src="<?= PATH_IMAGES ?>logos/pink-ticket.png" alt="ticket" class="img-ticket it1" draggable="false">
            <div class="hidden-text" display="none">

            </div>
        </div>
        <div class="ticket third-ticket">
            <img src="<?= PATH_IMAGES ?>logos/orange-ticket.png" alt="ticket" class="img-ticket it1" draggable="false">
                <div class="hidden-text" display="none">
            </div>
        </div>
        </section>
    <div class="btn-container">
        <div class="button" onclick="checkOtherTicket(+1)">
            <h1>></h1>
        </div>
    </div>
</main>
<div class="nb-tickets-container">
    <p class="to-modify">1</p>
    <p>/</p>
    <p class="to-modify">3</p>
</div>

<?php require_once(PATH_VIEWS . 'footer.php'); ?>
</body>