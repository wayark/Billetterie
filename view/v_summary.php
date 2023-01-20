<?php
/**
 * @var array{numberArticles: int, events: string} $resultDisplay
 */
require_once PATH_VIEWS . 'header.php';
?>
<head>
    <link rel="stylesheet" href="<?= PATH_CSS ;?>/summary.css">
    <link rel="stylesheet" href="<?= PATH_MEDIA ;?>Summary.css">
    <title>Récapitulatif de votre achat</title>
</head>
<section class="main-container">
    <div class="title-page flex-row">
        <p>Récapitulatif de votre achat (</p>
        <p class="to-modify"><?= $resultDisplay['numberArticles'] ?></p>
        <p> évènements) :</p>
    </div>
    <div class="event-container">
        <div class="first-bar bar"></div>
        <?= $resultDisplay['events'] ?>
    </div>
    <h1 class="subtitle-page">Waticket et ses membres vous remercient de votre confiance.</h1>
</section>
<?php require_once PATH_VIEWS . 'footer.php'; ?>
