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
    longeureJour = 300 / (tableau.length-1);
    console.log("longeure : " + longeureJour);
    avanceJ = 0
    var ctx = document.getElementById('myCanvas').getContext('2d');
    ctx.beginPath();
    ctx.moveTo(1,0);
    ctx.lineTo(1,149);
    ctx.moveTo(1,149);
    ctx.lineTo(300, 149);
    ctx.strokeStyle = '#000000';
    ctx.lineWidth = 4;
    ctx.closePath();
    ctx.stroke();

    ctx.beginPath();
    avanceJ = 150;
    while(avanceJ > 0){
        ctx.moveTo(0,avanceJ);
        ctx.lineTo(10,avanceJ);
        avanceJ = avanceJ - hauteurParVente*10;
    }
    ctx.lineWidth = 2;
    ctx.closePath();
    ctx.stroke();

    ctx.beginPath();
    avanceJ = 0;
    while(avanceJ < 300){
        ctx.moveTo(avanceJ,150);
        ctx.lineTo(avanceJ,140);
        avanceJ = avanceJ + longeureJour;
    }
    ctx.lineWidth = 2;
    ctx.closePath();
    ctx.stroke();

    avanceJ = 0

    ctx.beginPath();
    ctx.strokeStyle = '#ff0000';
    ctx.lineWidth = 3;

    ctx.font = '10px sans-serif'; // police de 48px
    ctx.fillStyle = '#ff0000'; // couleur noire

    for(i=0; i<tableau.length -1; i=i+1){
        ctx.fillText(tableau[i], avanceJ, (tableau[i+1]*hauteurParVente) + (150-(tableau[i]*hauteurParVente)*2) +10);

        console.log("point départ : x :" + avanceJ + "    y : " + ((tableau[i]*hauteurParVente) + (150-(tableau[i]*hauteurParVente)*2)))
        ctx.moveTo(avanceJ, (tableau[i]*hauteurParVente) + (150-(tableau[i]*hauteurParVente)*2));
        avanceJ = avanceJ + longeureJour
        ctx.lineTo(avanceJ, (tableau[i+1]*hauteurParVente) + (150-(tableau[i+1]*hauteurParVente)*2));
    }

    ctx.stroke();
</script>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>
</body>