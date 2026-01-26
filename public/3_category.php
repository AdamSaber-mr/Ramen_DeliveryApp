<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../src/output.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/menu_cate/categorie.css">
    <link rel="stylesheet" href="./assets/css/cart/cart.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <title>Categorieën pagina</title>
</head>

<body>
    <?php
    include 'includes/navbar.php';
    include './includes/cart.php';
    ?>

    <section class="menu-header category-header">
        <a href="1_index.php" class="menu-back">← Terug naar home</a>

        <h1>Shoyu</h1>
        <p>Traditionele sojasaus-bouillon ramen met een rijke umami smaak</p>

        <span class="menu-count">3 gerechten</span>
    </section>

    <section class="menu-grid">

        <!-- CARD -->
        <article class="menu-card">
            <img src="assets/images/ramen/classic_shoyu_ramen.jpeg" alt="Classic Shoyu Ramen">

            <div class="menu-card__body">
                <span class="menu-badge">Trending</span>

                <h3>Classic Shoyu Ramen</h3>
                <p>Sojasaus bouillon met chashu varkensvlees</p>

                <div class="menu-card__footer">
                    <span class="price">€13,50</span>
                    <a href="product.php" class="view-btn">Bekijk →</a>
                </div>
            </div>
        </article>

        <article class="menu-card">
            <img src="assets/images/ramen/classic_shoyu_ramen.jpeg" alt="Classic Shoyu Ramen">

            <div class="menu-card__body">
                <span class="menu-badge">Trending</span>

                <h3>Classic Shoyu Ramen</h3>
                <p>Sojasaus bouillon met chashu varkensvlees</p>

                <div class="menu-card__footer">
                    <span class="price">€13,50</span>
                    <a href="product.php" class="view-btn">Bekijk →</a>
                </div>
            </div>
        </article>

        <!-- meer cards -->
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="./assets/js/cart.js"></script>

</body>

</html>