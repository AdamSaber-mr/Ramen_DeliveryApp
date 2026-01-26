<?php
$cart = $_SESSION['cart'] ?? [];
$subtotal = 0;
?>

<div class="cart-overlay" id="cartOverlay">
    <div class="cart">

        <div class="cart-header">
            <h2>Jouw winkelmand</h2>
            <button class="cart-close" onclick="closeCart()">×</button>
        </div>

        <?php foreach ($cart as $index => $item): ?>
            <div class="cart-item">

                <div class="cart-item-info">
                    <h4><?= htmlspecialchars($item['name']) ?></h4>
                    <span><?= $item['quantity'] ?> × €<?= number_format($item['price'], 2) ?></span>
                </div>

                <div class="cart-item-actions">
                    <span class="cart-item-price">
                        €<?= number_format($item['price'] * $item['quantity'], 2) ?>
                    </span>

                    <form action="includes/remove_from_cart.php" method="POST">
                        <input type="hidden" name="index" value="<?= $index ?>">
                        <button type="submit" class="remove-btn">✕</button>
                    </form>
                </div>

            </div>
        <?php endforeach; ?>


        <?php if (!empty($cart)): ?>
            <div class="cart-summary">
                <div class="summary-row">
                    <span>Subtotaal</span>
                    <span>€<?= number_format($subtotal, 2) ?></span>
                </div>

                <div class="summary-row">
                    <span>Bezorgkosten</span>
                    <span>€2,50</span>
                </div>

                <div class="summary-total">
                    <span>Totaal</span>
                    <span>€<?= number_format($subtotal + 2.5, 2) ?></span>
                </div>

                <a href="checkout.php" class="checkout-btn">
                    Bestelling afronden
                </a>
            </div>
        <?php endif; ?>

    </div>
</div>