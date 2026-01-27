<?php
session_start();
require_once '../app/config/database.php';
global $pdo;

// 🔎 Check of id bestaat
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: 2_menu.php');
    exit;
}

$productId = (int) $_GET['id'];

// 📦 Product ophalen
$stmt = $pdo->prepare("
    SELECT menu_items.*, categories.name AS category_name
    FROM menu_items
    JOIN categories ON menu_items.category_id = categories.id
    WHERE menu_items.id = ? AND menu_items.is_available = 1
");
$stmt->execute([$productId]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// ❌ Product niet gevonden
if (!$product) {
    header('Location: 2_menu.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../src/output.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/detail/product.css">
    <link rel="stylesheet" href="./assets/css/cart/cart.css">
    <link rel="stylesheet" href="./assets/css/footer.css">

    <title><?= htmlspecialchars($product['name']) ?> | Yume Ramen</title>
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

<section class="product">

    <a href="./2_menu.php" class="product-back">← Terug naar menu</a>

    <!-- Afbeelding -->
    <div class="product-image">
        <img
                src="assets/images/ramen/<?= htmlspecialchars($product['image_url']) ?>"
                alt="<?= htmlspecialchars($product['name']) ?>"
        >

        <?php
        $finalPrice = $product['is_deal']
                ? $product['deal_price']
                : $product['price'];
        ?>
        <span class="product-price">
                €<?= number_format($finalPrice, 2, ',', '.') ?>
        </span>
    </div>

    <!-- Content -->
    <div class="product-content">

        <h1><?= htmlspecialchars($product['name']) ?></h1>

        <div class="product-meta">
            <span class="badge"><?= htmlspecialchars($product['category_name']) ?></span>
            <span class="time">⏱ 30–45 min</span>
        </div>

        <p class="product-description">
            <?= htmlspecialchars($product['description']) ?>
        </p>

        <!-- Aantal -->
        <form method="POST" action="./includes/cart/add_to_cart.php">
            <input type="hidden" name="menu_item_id" value="<?= $product['id'] ?>">

            <div class="quantity">
                <button type="button" class="qty-btn" id="minus">−</button>
                <span id="quantity">1</span>
                <button type="button" class="qty-btn" id="plus">+</button>
            </div>

            <input type="hidden" name="quantity" id="quantity-input" value="1">

            <!-- Totaal -->
            <div class="total">
                <span>Totaal</span>
                <?php
                $finalPrice = $product['is_deal']
                        ? $product['deal_price']
                        : $product['price'];
                ?>
                <span id="total-price">
                        €<?= number_format($finalPrice, 2, ',', '.') ?>
                    </span>
            </div>

            <input type="hidden" name="price" value="<?= $finalPrice ?>">


            <!-- Add to cart -->
            <button type="submit" class="add-to-cart">
                🛒 Toevoegen aan winkelwagen
            </button>
        </form>

    </div>

</section>

<?php include 'includes/footer.php'; ?>

<script>
    let quantity = 1;
    const price = <?= $product['price'] ?>;

    const quantityEl = document.getElementById('quantity');
    const quantityInput = document.getElementById('quantity-input');
    const totalPriceEl = document.getElementById('total-price');

    document.getElementById('plus').onclick = () => {
        quantity++;
        update();
    };

    document.getElementById('minus').onclick = () => {
        if (quantity > 1) {
            quantity--;
            update();
        }
    };

    function update() {
        quantityEl.textContent = quantity;
        quantityInput.value = quantity;
        totalPriceEl.textContent =
            '€' + (price * quantity).toFixed(2).replace('.', ',');
    }
</script>

<script src="./assets/js/swipe_hint.js"></script>
<script src="./assets/js/cart.js"></script>
<script src="./assets/js/animations.js"></script>

</body>
</html>
