<?php require_once PATH_VIEWS . 'header.php'; ?>
<head>
    <link rel="stylesheet" href="<?= PATH_CSS ;?>/summary.css">
</head>
<section class="main-container">
    <h1 class="title-page">Récapitulatif de votre achat :</h1>
    <div class="event-container">
        <form action="./?page=summary" method="post" class="button-generate-pdf">
            <button type="submit" name="generate-pdf">Generer PDF</button>
        </form>
    </div>
    <h1 class="subtitle-page">Waticket et ses membres vous remercient de votre confiance.</h1>
</section>
<?php require_once PATH_VIEWS . 'footer.php'; ?>
