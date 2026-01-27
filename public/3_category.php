<?php
session_start();
require_once '../app/config/database.php';

// Category id ophalen
$categoryId = $_GET['id'] ?? null;

if (!$categoryId || !is_numeric($categoryId)) {
    header('Location: 1_index.php');
    exit;
}

// 1️⃣ Categorie info ophalen
$stmt = $pdo->prepare("
    SELECT name, description
    FROM categories
    WHERE id = ?
");
$stmt->execute([$categoryId]);
$category = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$category) {
    header('Location: 1_index.php');
    exit;
}

// 2️⃣ Menu items van deze categorie ophalen
$stmt = $pdo->prepare("
    SELECT *
    FROM menu_items
    WHERE category_id = ? AND is_available = 1
");
$stmt->execute([$categoryId]);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

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
    include './includes/cart/cart.php';
    ?>

    <section class="menu-header category-header">
        <a href="1_index.php" class="menu-back">← Terug naar home</a>

        <h1><?= htmlspecialchars($category['name']) ?></h1>
        <p><?= htmlspecialchars($category['description']) ?></p>
        <span class="menu-count"><?= count($items) ?> gerechten</span>

    </section>

    <section class="menu-grid">

        <?php foreach ($items as $item): ?>
            <article class="menu-card">
                <img
                        src="./assets/images/ramen/<?= htmlspecialchars($item['image_url']) ?>"
                        alt="<?= htmlspecialchars($item['name']) ?>"
                >

                <div class="menu-card__body">

                    <?php if ($item['is_deal']): ?>
                        <span class="menu-badge">Aanbieding</span>
                    <?php endif; ?>

                    <?php if ($item['price'] >= 16): ?>
                        <span class="menu-badge">Populair</span>
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

    <script src="./assets/js/cart.js"></script>

</body>

</html>