<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../src/output.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/menu_cate/menupage.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <title>Menu-pagina</title>
</head>

<body>

    <?php
    session_start();
    include 'includes/navbar.php';
    ?>

    <?php if (isset($_SESSION['flash'])):
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
    ?>
        <div class="flash flash--<?= $flash['type'] ?>">
            <?= htmlspecialchars($flash['message']) ?>
        </div>
    <?php endif; ?>

    <section class="menu-header">
        <a href="1_index.php" class="menu-back">← Terug naar home</a>

        <h1>Alle Ramen</h1>
        <p>Ontdek ons volledige assortiment authentieke Japanse ramen</p>

        <span class="menu-count">10 gerechten</span>
    </section>

    <section class="menu-grid">

        <!-- CARD -->
        <article class="menu-card">
            <img src="assets/images/ramen/classic_shoyu_ramen.jpeg" alt="Classic Shoyu Ramen">

            <div class="menu-card__body">
                <span class="menu-badge">Trending</span>

                <h3>Classic Shoyu Ramen</h3>
                <p>Traditionele sojasaus bouillon met chashu varkensvlees</p>

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
                <p>Traditionele sojasaus bouillon met chashu varkensvlees</p>

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
                <p>Traditionele sojasaus bouillon met chashu varkensvlees</p>

                <div class="menu-card__footer">
                    <span class="price">€13,50</span>
                    <a href="product.php" class="view-btn">Bekijk →</a>
                </div>
            </div>
        </article>

        <!-- Herhaal cards -->
        <!-- later dynamisch via PHP -->

    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="./assets/js/animations.js"></script>

</body>

</html>