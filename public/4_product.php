<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../src/output.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/detail/product.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <title>Product detail pagina</title>
</head>

<body>
    <?php include 'includes/navbar.php'; ?>

    <section class="product">

        <a href="1_index.php" class="product-back">← Terug naar alle home</a>

        <!-- Afbeelding -->
        <div class="product-image">
            <img src="assets/images/ramen/shoyu_ramen_ag.webp" alt="Shoyu Deluxe">
            <span class="product-price">€16.50</span>
        </div>

        <!-- Content -->
        <div class="product-content">

            <h1>Shoyu Deluxe</h1>

            <div class="product-meta">
                <span class="badge">Shoyu</span>
                <span class="time">⏱ 15–20 min</span>
            </div>

            <p class="product-description">
                Premium shoyu ramen met extra chashu, ajitsuke tamago,
                menma, nori en speciale toppings. Een rijke umami-ervaring
                volgens traditioneel Japans recept.
            </p>

            <!-- Chef note -->
            <div class="chef-note">
                <strong>Chef’s note</strong>
                <p>
                    Deze ramen wordt langzaam opgebouwd in lagen van smaak.
                    Perfect voor wie onze klassieke shoyu op z’n best wil ervaren.
                </p>
            </div>

            <!-- Aantal -->
            <div class="quantity">
                <button class="qty-btn" id="minus">−</button>
                <span id="quantity">1</span>
                <button class="qty-btn" id="plus">+</button>
            </div>

            <!-- Totaal -->
            <div class="total">
                <span>Totaal</span>
                <span id="total-price">€16.50</span>
            </div>

            <!-- Add to cart -->
            <form action="./includes/add_to_cart.php" method="POST">
                <input type="hidden" name="id" value="1">

                <button type="submit" class="add-to-cart">
                    🛒 Toevoegen aan winkelwagen
                </button>
            </form>


        </div>

    </section>

    <script src="./assets/js/product.js"></script>

    <?php include 'includes/footer.php'; ?>

</body>

</html>