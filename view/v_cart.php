<?php

/**
 * @var array{total: float, items: string} $display
 */
require_once PATH_VIEWS.'header.php';

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo PATH_CSS.'cart.css'; ?>">
    <link rel="stylesheet" href="<?php echo PATH_MEDIA.'Cart.css'; ?>">
    <script src="<?= PATH_SCRIPTS . "addToCart.js";?>" defer></script>
    <title>Panier</title>
</head>

    <section id="cart">
        <div class="cartdisplayer">
            <div class="cart-header">
                <div class="cart-header-title">
                    <h1>Panier</h1>
                </div>
            </div>
            <div class="cart-body">
                <?= $display["items"] ?>
            </div>
            <div class="yellow-bar"></div>    
            <div class="total-cart">
                <p>Total (<?= $display['numberArticles'] . " article" . putCharS($display['numberArticles']); ?>) :</p>
                <p><?php echo $display['total']; ?> €</p>
            </div>
        </div>
        <form action="./?page=summary" method="post">
            <input type="submit" name="pay" value="Payer" class="pay-button">
        </form>
    </section>
<?php

require_once PATH_VIEWS.'footer.php';

?>