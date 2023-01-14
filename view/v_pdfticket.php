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
                    <div class="ticket-header-left">
                        <h2 class="ticket-header-title">Ticket</h2>
                        <p class="ticket-header-subtitle">Transbordeur</p>
                    </div>
                </div>
                <div class="ticket-body">
                    <div class="ticket-body-left">
                        <p class="ticket-body-date">Date: 12/12/2021</p>
                        <p class="ticket-body-time">Heure: 20:00</p>
                        <p class="ticket-body-place">Lieu: Transbordeur</p>
                        <p class="ticket-body-place">Adresse: 6 rue de la République, 69002 Lyon</p>
                    </div>
                    <div class="ticket-body-right">
                        <p class="ticket-body-name">Nom: Damso</p>
                        <p class="ticket-body-price">Prix: 20€</p>
                        <p class="ticket-body-place">Catégorie: 1</p>
                        <p class="ticket-body-place">Rang: 1</p>
                        <p class="ticket-body-place">Place: 1</p>
                    </div>
                </div>
            </div>
            <div class="qr-code">
                    <img class="qr-code-img" src="./asset/image/qr-code/photo.jpg" alt="qr-code">
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