<?php require_once PATH_VIEWS . 'header.php'; ?>
<head>
    <link rel="stylesheet" href="<?= PATH_CSS ;?>/summary.css">
</head>
<section class="main-container">
    <div class="title-page flex-row">
        <p>Récapitulatif de votre achat (</p>
        <p class="to-modify">3</p>
        <p> évènements) :</p>
    </div>
    <div class="event-container">
        <div class="event-purchased flex-column">
            <div class="nb-tickets-purchased flex-row">
                <h1>-</h1>
                <h1 class="to-modify">3</h1>
                <h1>tickets pour :</h1>
                <h1 class="quote">"</h1>
                <h1 class="to-modify">Nom de l'évènement</h1>
                <h1 class="quote">"</h1>
            </div>
            <div class="right-part-event grid-row">  
                <a href="./?page=event&id=" class="link-to-event">
                    <img src="<?= PATH_IMAGES ;?>/events/wayark.jpg" alt="event" class="event-img">
                </a>
                <div class="event-info">

                    <form action="./?page=summary" method="post" class="button-generate-pdf">
                        <button type="submit" name="generate-pdf">Generer PDF</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <h1 class="subtitle-page">Waticket et ses membres vous remercient de votre confiance.</h1>
</section>
<?php require_once PATH_VIEWS . 'footer.php'; ?>
