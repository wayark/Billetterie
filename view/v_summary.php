<?php require_once PATH_VIEWS . 'header.php'; ?>
<head>
    <link rel="stylesheet" href="<?= PATH_CSS ;?>/summary.css">
    <title>Récapitulatif de votre achat</title>
</head>
<section class="main-container">
    <div class="title-page flex-row">
        <p>Récapitulatif de votre achat (</p>
        <p class="to-modify">3</p>
        <p> évènements) :</p>
    </div>
    <div class="event-container">
        <div class="first-bar bar"></div>
        <div class="event-purchased flex-column">
            <div class="nb-tickets-purchased flex-row">
                <h1>-</h1>
                <h1 class="to-modify">3</h1>
                <h1>tickets pour :</h1>
                <h1 class="quote">"</h1>
                <h1 class="to-modify">Nom de l'évènement</h1>
                <h1 class="quote">"</h1>
            </div>
            <div class="right-part-event flex-row">  
                <a href="./?page=event&id=" class="link-to-event">
                    <img src="<?= PATH_IMAGES ;?>/events/wayark.jpg" alt="event" class="event-img">
                </a>
                <div class="event-info flex-column">
                    <h1 class="type-event">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, aliquam! Pariatur, alias! Vel, dolor?</h1>
                    <div class="date-event-container flex-row">
                        <h1 class="date-event">Le</h1>
                        <h1 class="date-event">12/13/2003</h1>
                    </div>
                    <h1 class="adress-event">Adresse Evenement</h1>
                    <h1 class="city-event">Ville Evenement</h1>
                    <form action="./?page=summary" method="post" class="button-generate-pdf">
                        <button type="submit" name="generate-pdf" class="flex-row">
                            <p>Télécharger mon billet</p>
                            <img src="<?= PATH_IMAGES ;?>/logos/pdf-icon.png" alt="">
                        </button>
                    </form>
                </div>
            </div>
            <div class="bar"></div>
        </div>
        <div class="event-purchased flex-column">
            <div class="nb-tickets-purchased flex-row">
                <h1>-</h1>
                <h1 class="to-modify">3</h1>
                <h1>tickets pour :</h1>
                <h1 class="quote">"</h1>
                <h1 class="to-modify">Nom de l'évènement</h1>
                <h1 class="quote">"</h1>
            </div>
            <div class="right-part-event flex-row">  
                <a href="./?page=event&id=" class="link-to-event">
                    <img src="<?= PATH_IMAGES ;?>/events/wayark.jpg" alt="event" class="event-img">
                </a>
                <div class="event-info flex-column">
                    <h1 class="type-event">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, aliquam! Pariatur, alias! Vel, dolor?</h1>
                    <div class="date-event-container flex-row">
                        <h1 class="date-event">Le</h1>
                        <h1 class="date-event">12/13/2003</h1>
                    </div>
                    <h1 class="adress-event">Adresse Evenement</h1>
                    <h1 class="city-event">Ville Evenement</h1>
                    <form action="./?page=summary" method="post" class="button-generate-pdf">
                        <button type="submit" name="generate-pdf" value="idTicket" class="flex-row">
                            <p>Télécharger mon billet</p>
                            <img src="<?= PATH_IMAGES ;?>/logos/pdf-icon.png" alt="">
                        </button>
                    </form>
                </div>
            </div>
            <div class="bar"></div>
        </div>
        <div class="event-purchased flex-column">
            <div class="nb-tickets-purchased flex-row">
                <h1>-</h1>
                <h1 class="to-modify">3</h1>
                <h1>tickets pour :</h1>
                <h1 class="quote">"</h1>
                <h1 class="to-modify">Nom de l'évènement</h1>
                <h1 class="quote">"</h1>
            </div>
            <div class="right-part-event flex-row">  
                <a href="./?page=event&id=" class="link-to-event">
                    <img src="<?= PATH_IMAGES ;?>/events/wayark.jpg" alt="event" class="event-img">
                </a>
                <div class="event-info flex-column">
                    <h1 class="type-event">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, aliquam! Pariatur, alias! Vel, dolor?</h1>
                    <div class="date-event-container flex-row">
                        <h1 class="date-event">Le</h1>
                        <h1 class="date-event">12/13/2003</h1>
                    </div>
                    <h1 class="adress-event">Adresse Evenement</h1>
                    <h1 class="city-event">Ville Evenement</h1>
                    <form action="./?page=summary" method="post" class="button-generate-pdf">
                        <button type="submit" name="generate-pdf" class="flex-row">
                            <p>Télécharger mon billet</p>
                            <img src="<?= PATH_IMAGES ;?>/logos/pdf-icon.png" alt="">
                        </button>
                    </form>
                </div>
            </div>
            <div class="last-bar bar"></div>
        </div>
    </div>
    <h1 class="subtitle-page">Waticket et ses membres vous remercient de votre confiance.</h1>
</section>
<?php require_once PATH_VIEWS . 'footer.php'; ?>
