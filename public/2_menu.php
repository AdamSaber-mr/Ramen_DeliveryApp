<?php
session_start();
require_once '../app/config/database.php';

// Menu items ophalen
$stmt = $pdo->prepare("
    SELECT *
    FROM menu_items
    WHERE is_available = 1
");
$stmt->execute();
$menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Aantal gerechten
$totalItems = count($menuItems);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../src/output.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/menu_cate/menupage.css">
    <link rel="stylesheet" href="./assets/css/cart/cart.css">
    <link rel="stylesheet" href="./assets/css/footer.css">

    <title>Menu | Yume Ramen</title>
</head>

<body>

<?php
include 'includes/navbar.php';
include './includes/cart/cart.php';
?>

<?php if (isset($_SESSION['flash'])):
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    ?>
    <div class="flash flash--<?= htmlspecialchars($flash['type']) ?>">
        <?= htmlspecialchars($flash['message']) ?>
    </div>
<?php endif; ?>

<section class="menu-header">
    <a href="1_index.php" class="menu-back">← Terug naar home</a>

    <h1>Alle Ramen</h1>
    <p>Ontdek ons volledige assortiment authentieke Japanse ramen</p>

    <span class="menu-count"><?= $totalItems ?> gerechten</span>
</section>

<section class="menu-grid">

    <?php foreach ($menuItems as $item): ?>
        <article class="menu-card">

            <img
                    src="assets/images/ramen/<?= htmlspecialchars($item['image_url']) ?>"
                    alt="<?= htmlspecialchars($item['name']) ?>"
            >

            <div class="menu-card__body">

                <?php if ($item['price'] >= 16): ?>
                    <span class="menu-badge">Populair</span>
                <?php endif; ?>

                <?php if ($item['is_deal']): ?>
                    <span class="menu-badge">Aanbieding</span>
                <?php endif; ?>


                <h3><?= htmlspecialchars($item['name']) ?></h3>
                <p><?= htmlspecialchars($item['description']) ?></p>

                <div class="menu-card__footer">
                    <?php if ($item['is_deal']): ?>
                        <div class="prices">
                                <span class="old-price">
                                    €<?= number_format($item['price'], 2, ',', '.') ?>
                                </span>
                            <span class="new-price">
                                    €<?= number_format($item['deal_price'], 2, ',', '.') ?>
                                </span>
                        </div>
                    <?php else: ?>
                        <span class="price">
                                €<?= number_format($item['price'], 2, ',', '.') ?>
                            </span>
                    <?php endif; ?>
                    <a href="4_product.php?id=<?= $item['id'] ?>" class="view-btn">
                        Bekijk →
                    </a>
                </div>
            </div>

        </article>
    <?php endforeach; ?>

</section>

<?php include 'includes/footer.php'; ?>

<script src="./assets/js/animations.js"></script>
<script src="./assets/js/cart.js"></script>

</body>
</html>
