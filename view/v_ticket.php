<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= PATH_CSS ;?>pdfticket.css">
    <title>Document</title>
</head>
<style class="main style">
</style>
<body>
    <section class="main-container">
        <div class="event-name-container">
            <h1 class="event-name">Damso - Concert Transbordeur</h1>
            <div class="bar-decoration"></div>
        </div>
        <div class="ticket-container">
            <div class="ticket">
                <div class="ticket-header">
                    <img class="ticket-header-logo" src="./asset/image/logos/logoWatiGold.png" alt="logo">
                </div>
                <div class="ticket-body">
                    <div class="ticket-info">
                        <p class="ticket-header-nb-places to-modify">1</p>
                        <p class="ticket-header-nb-places">place</p>
                        <p class="ticket-header-nb-places">pour</p>
                        <p class="ticket-header-name-event to-modify">Damso - concert</p>
                    </div>
                    <div class="ticket-info">
                        <p class="ticket-header-place">Lieu : </p>
                        <p class="ticket-header-place to-modify">Tranbordeur</p>
                    </div>
                    <div class="ticket-info">
                        <p class="ticket-header-city">Ville : </p>
                        <p class="ticket-header-city to-modify">Lyon</p>
                    </div>
                    <div class="ticket-info">
                        <p class="ticket-header-adress">Adresse : </p>
                        <p class="ticket-header-adress to-modify">6 rue de la République</p>
                    </div>
                    <div class="ticket-info">
                        <p class="ticket-header-city">Ville : </p>
                        <p class="ticket-header-city to-modify">Lyon</p>
                    </div>
                    <div class="ticket-info">
                        <p class="ticket-body-date">Date : </p>
                        <p class="ticket-body-date to-modify">14/01/2023</p>
                    </div>
                    <div class="ticket-info">
                        <p class="ticket-body-time">Heure : </p>
                        <p class="ticket-body-time to-modify">21h30</p>
                    </div>
                    <div class="ticket-info">
                        <p class="ticket-body-price-unit">Prix unité :</p>
                        <p class="ticket-body-price-unit to-modify">20 €</p>
                    </div>
                    <div class="ticket-info">
                        <p class="ticket-body-type-event">Vous avez choisi :</p>
                        <p class="ticket-body-type-event to-modify">Fosse</p>
                    </div>
                </div>
            </div>
            <div class="qr-code">
                    <img class="qr-code-img" src="<?= $filepath ?>" alt="qr-code">
                    <p>Ce QR-code ne pourra être utilisé qu'une fois. Il vous permettra d'accéder à votre évènement.</p>
                    <img class="photo-event-img" src="./asset/image/events/wayark.jpg" alt="qr-code">
            </div>
        </section>
        <div class="ticket-footer">
            <p class="ticket-footer-text">Merci de votre confiance</p>
        </div>
    <div class="informations">
        <p class="informations-text">Pour toute question, veuillez contacter par les informations disponibles sur notre page contact.</p>
        <p class="informations-text2">waticket.com</p>
    </div>
</body>
</html>