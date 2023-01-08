<?php
require_once './application/display/formatDate.php';
require_once './application/display/errorDisplay.php';
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
<header>
    <link href="<?= PATH_CSS ?>checkTickets.css" rel="stylesheet">
</header>
<body>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<main>
    <div class="button">
        <h1><</h1>
    </div>
    <section class="transparent">
        <h2></h2>
        <h3></h3>
        <h3></h3>
    </section>
    <section id="ticket">
        <h2>Soirée mousse</h2>
        <h3>nombres de places achetées : 3</h3>
        <h3>Position : Gradin</h3>
    </section>
    <div class="button">
        <h1>></h1>
    </div>
</main>
<script>
    zInd = 100;
    rotate = "10deg";
    const element = document.querySelector('.button');

    // Ajout de l'évènement au clic à l'élément
    element.addEventListener('click', function() {



        const sectionToDuplicate = document.querySelector('#ticket');
        // Création d'une copie de la section
        const sectionCopy = sectionToDuplicate.cloneNode(true);
        zInd = zInd - 1;
        if(rotate == "-10deg"){
            rotate = "10deg"
            console.log("ok1");
        }
        else {
            rotate = "-10deg";
            console.log("ok")
        }
        console.log(rotate)
        sectionCopy.style.transform = "rotate("+rotate+")";
        sectionCopy.style.zIndex = zInd;
        // Ajout de la copie de la section au DOM
        const parentElement = document.querySelector('main');
        parentElement.appendChild(sectionCopy);



        console.log('L\'évènement au clic s\'est produit!');
    });

</script>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>
</body>