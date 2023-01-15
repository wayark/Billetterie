<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <section class="main-container">
            <div class="event-name-container">
                <h1 class="event-name">Damso - Concert Transbordeur</h1>
                <div class="bar-decoration"></div>
            </div>
            <div class="ticket-container">
                <div class="ticket">
                    <div class="ticket-header">
                        <img class="ticket-header-logo" src="<?=  PATH_IMAGES ;?>logos/logoWatiGold.png">
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
                        <img class="qr-code-img" src="<?= PATH_IMAGES . "qrcodes/" . $filename ?>">
                        <p>Ce QR-code ne pourra être utilisé qu'une fois. Il vous permettra d'accéder à votre évènement.</p>
                        <img class="photo-event-img" src="<?php echo PATH_IMAGES ;?>events/wayark.jpg">
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
    <style class="main style">
        ::after, ::before {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: sans-serif;
        }

        .main-container{
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .event-name{
            font-size: 5vw;
            color: #000000;
            letter-spacing: 0.1vw;
            margin:2.7vw;
        }

        .ticket-container{
            display: grid;
            grid-template-columns: 1fr 1fr;
            width: 95%;
            height: max-content;
            padding-top: 5vw;
            padding-bottom: 5vw;
        }

        .ticket-header{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 100%;
            height: fit-content;
        }

        .ticket-header-logo{
            width: 30vw; 
            align-self: center;
            margin-top: 3vw;
        }

        .ticket-footer{
            position: absolute;
            bottom: 1vw;
            right: 3vw;
            font-size: 2.2vw;
            color: #000000;
        }

        .ticket-footer-text{
            font-style: italic;
        }

        .qr-code-img{
            width: 70%;
            object-fit: contain;
        }

        .qr-code {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            flex-direction: column;
            margin-left: 2vw;
            margin-right: 2vw;
        }

        .qr-code p {
            font-size: 2.5vw;
            color: #000000;
            font-weight: bold;
            margin: 0;
            margin-top: 1vw;
            text-align: center;
            line-height: 1.6;
            margin-left: 5vw;
            margin-right: 5vw;
        }

        .event-name-container{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            flex-direction: column;
            row-gap: 0vw;
        }

        .bar-decoration {
            width: 100%;
            height: 0.5vw;
            background-color: #9c9292;
        }

        .ticket{
            display: flex;
            flex-direction: column;
            row-gap: 3vw;
            align-items: center;
            width: 100%;
            height: 95%;
            background-color: #ffffff;
            border: 2vw solid #e8d8aab3;
            border-radius: 1vw;
        }

        .ticket-body{
            margin: 0;
        }

        .qr-code{
            margin-left: 3vw;
        }

        .photo-event-img{
            margin-top: 3.5vw;
            border-radius: 1vw;
            width: 35vw;
            background-color: #e8d8aab3;
            padding: 1.2vw;
        }

        .informations{
            display: flex;
            flex-direction: column;
            width: 100vw;
            height: 28vh;
            margin: 0;
        }

        .informations-text{
            font-size: 2.2vw;
            font-weight: bold;
            color: #c0a38b;
            margin-left: 3vw;
            text-decoration: underline;
            text-align: center;
        }

        .informations-text2{
            font-size: 2.2vw;
            font-weight: bold;
            color: #d0baa9;
            margin-left: 3vw;
            position: absolute;
            bottom: 0.7vw;
            left: 1.5vw;
        }

        .ticket-info {
            display: flex;
            flex-direction: row;
            font-size: 2vw;
            column-gap: 0.6vw;
            margin: 0;
            font-weight: normal;
        }

        .to-modify{
            font-weight: bold;
            color: #9a6969;
        }

        .ticket-body{
            align-self: start;
            margin-left: 3vw;
        }
    </style>
</html>