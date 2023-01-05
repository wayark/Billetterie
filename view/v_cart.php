<?php 

require_once PATH_VIEWS.'header.php';

?>
    <link rel="stylesheet" href="<?php echo PATH_CSS.'cart.css'; ?>">

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
                <?php
                $total = 0;
                foreach ($cart as $item) {
                    $total += $item['price'];
                    ?>
                    <div class="cart-body-item">
                        <div class="cart-body-item-title">
                            <h1><?php echo $item['title']; ?></h1>
                        </div>
                        <div class="cart-body-item-price">
                            <h1><?php echo $item['price']; ?>€</h1>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="cart-footer">
                <div class="cart-footer-total">
                    <h1>Total</h1>
                </div>
                <div class="cart-footer-price">
                    <h1><?php echo $total; ?>€</h1>
                </div>
            </div>
        </div>
    </section>
<?php

require_once PATH_VIEWS.'footer.php';

?>