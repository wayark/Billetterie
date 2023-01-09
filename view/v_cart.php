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
    <title>Panier</title>
</head>

    <section id="cart">
        <div class="cart">
            <div class="cart-header">
                <div class="cart-header-title">
                    <h1>Mon panier</h1>
                </div>
                <div class="cart-header-price">
                    <h1>Prix</h1>
                </div>
            </div>
            <div class="cart-body">
                <?= $display['items'] ?>
            </div>
            <div class="cart-footer">
                <div class="cart-footer-total">
                    <h1>Total</h1>
                </div>
                <div class="cart-footer-price">
                    <h1><?= $display['total'] ?>€</h1>
                </div>
            </div>
        </div>
    </section>
<?php

require_once PATH_VIEWS.'footer.php';

?>