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
    <link href="<?= PATH_CSS ?>statistic.css" rel="stylesheet">
</header>
<body>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<main>
    <section>
        <div>
            <img src="<?= PATH_IMAGES?>/events/bdsmousse.jpg" alt="">
            <div>
                <h1>Soirée Mousse</h1>
                <p>26 décembre 2022</p>
            </div>
        </div>
        <h2>statistique</h2>
        <div>
            <canvas id="myCanvas"></canvas>
            <div>
                <p>Nombre de places vendu :</p>
                <div>
                    <p>fausse : </p> <p></p>
                </div>
                <div>
                    <p>gradin : </p> <p></p>
                </div>

            </div>

        </div>
    </section>
</main>
<script>
    tableau = [10, 20, 34, 55, 76, 100];
    max = tableau[tableau.length - 1];
    hauteurParVente = 150 /max;
    console.log("hauteur : " + hauteurParVente);
    longeureJour = 300 / (tableau.length-2);
    console.log("longeure : " + longeureJour);
    avanceJ = 0
    var ctx = document.getElementById('myCanvas').getContext('2d');
    ctx.strokeStyle = '#ff0000';
    ctx.lineWidth = 3;
    ctx.beginPath();
    for(i=0; i<tableau.length -2; i=i+1){
        console.log("point départ : x :" + avanceJ + "    y : " + ((tableau[i]*hauteurParVente) + (150-(tableau[i]*hauteurParVente)*2)))
        ctx.moveTo(avanceJ, (tableau[i]*hauteurParVente) + (150-(tableau[i]*hauteurParVente)*2));
        avanceJ = avanceJ + longeureJour
        ctx.lineTo(avanceJ, (tableau[i+1]*hauteurParVente) + (150-(tableau[i+1]*hauteurParVente)*2));
    }

    ctx.stroke();
</script>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>
</body>