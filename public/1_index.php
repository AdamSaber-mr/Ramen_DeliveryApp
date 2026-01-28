<?php
session_start();
global $pdo;

require_once '../app/config/database.php';

// populair.json inlezen
$popularData = [];

$popularJsonPath = __DIR__ . '/../python/populair.json';

if (file_exists($popularJsonPath)) {
    $json = file_get_contents($popularJsonPath);
    $popularData = json_decode($json, true);
}

// IDs uit populair.json halen
$popularIds = [];

foreach ($popularData as $item) {
    $popularIds[] = (int)$item['gerecht_id'];
}

// Populaire gerechten ophalen uit DB
$popularItems = [];

if (!empty($popularIds)) {
    $placeholders = implode(',', array_fill(0, count($popularIds), '?'));

    $stmt = $pdo->prepare("
    SELECT id, name, price, image_url, is_deal, deal_price
    FROM menu_items
    WHERE id IN ($placeholders)
      AND is_available = 1
  ");


    $stmt->execute($popularIds);
    $popularItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Volgorde behouden als in python
$orderedPopularItems = [];

foreach ($popularIds as $id) {
    foreach ($popularItems as $item) {
        if ($item['id'] == $id) {
            $orderedPopularItems[] = $item;
            break;
        }
    }
}


// Aanbiedingen ophalen
$stmt = $pdo->prepare("
SELECT id, name, description, price, deal_price, image_url
FROM menu_items
WHERE is_deal = 1 AND is_available = 1
");
$stmt->execute();
$deals = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../src/output.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/homepage.css">
    <link rel="stylesheet" href="./assets/css/cart/cart.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <title>Homepage</title>
</head>

<body>

<?php
include './includes/navbar.php';
include './includes/cart/cart.php';
?>

<?php if (isset($_SESSION['flash'])):
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    ?>
    <div class="flash flash--<?= $flash['type'] ?>">
        <?= htmlspecialchars($flash['message']) ?>
    </div>
<?php endif; ?>

<section class="relative">
    <!-- Achtergrond -->
    <div class="absolute inset-0">
        <img src="assets/images/global/ramen_header.jpeg"
             alt="Yume Ramen restaurant"
             class="h-full w-full object-cover">
        <div class="absolute inset-0 bg-black/50"></div>
    </div>

    <!-- Content -->
    <div class="relative px-4 py-16 text-white">
        <h2 class="mb-6"> <span class="text-[#c8c067]">夢</span> YUME RAMEN </h2>
        <h1 class="text-3xl font-bold leading-tight">
            Van <span class="text-red-400">verlangen</span><br>
            tot <span class="text-red-400">meesterwerk</span>
        </h1>

        <p class="mt-4 text-sm text-gray-200 max-w-xs">
            Authentieke Japanse ramen, met passie bereid en bij je thuis bezorgd.
        </p>

        <!-- Info badges -->
        <div class="mt-5 flex gap-3 text-xs">
            <div class="flex items-center gap-1 rounded-full bg-white/10 px-3 py-1">
                ⏱ 30–45 min
            </div>
            <div class="flex items-center gap-1 rounded-full bg-white/10 px-3 py-1">
                ⭐ 4.8 / 5
            </div>
        </div>

        <!-- CTA -->
        <a href="2_menu.php"
           class="mt-6 inline-block rounded-full bg-red-500 px-6 py-2 text-sm font-semibold text-white hover:bg-red-600 transition">
            Bekijk menu
        </a>
    </div>
</section>

<section class="categories">
    <h2 class="categories__title">Categorieën</h2>

    <div class="categories__track">

        <article class="category-card">
            <a href="./3_category.php?id=2">
                <img src="assets/images/categories/miso_ramen.jpeg" alt="Miso ramen">
                <div class="category-card__content">
                    <h3>Miso</h3>
                    <p>Rijke & volle bouillon</p>
                </div>
            </a>
        </article>

        <article class="category-card">
            <a href="./3_category.php?id=1">
                <img src="assets/images/categories/shoyu_ramen.jpeg" alt="Shoyu ramen">
                <div class="category-card__content">
                    <h3>Shoyu</h3>
                    <p>Sojasaus bouillon</p>
                </div>
            </a>
        </article>

        <article class="category-card">
            <a href="./3_category.php?id=5">
                <img src="assets/images/categories/tonkotsu_ramen.jpeg" alt="Tonkotsu ramen">
                <div class="category-card__content">
                    <h3>Tonkotsu</h3>
                    <p>Romig & intens</p>
                </div>
            </a>
        </article>

        <article class="category-card">
            <a href="./3_category.php?id=3">
                <img src="assets/images/categories/spicy.jpeg" alt="Spicy ramen">
                <div class="category-card__content">
                    <h3>Spicy 🌶</h3>
                    <p>Pittig & krachtig</p>
                </div>
            </a>
        </article>

        <article class="category-card">
            <a href="./3_category.php?id=4">
                <img src="assets/images/categories/vegetarisch.jpeg" alt="Vegetarische ramen">
                <div class="category-card__content">
                    <h3>Vegetarisch 🌱</h3>
                    <p>Licht & puur</p>
                </div>
            </a>
        </article>

    </div>
    <div class="homepage_scrol_tip">← Scroll om meer categorieën te zien →</div>
</section>

<section class="popular">
    <div class="popular__header">
        <div class="popular__header_text">
            <svg
                    class="chart_popular"
                    xmlns="http://www.w3.org/2000/svg"
                    width="28"
                    height="28"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    style="color: #C41E3A; margin-right: 5px;">
                <!-- The trending line -->
                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                <!-- The arrow head -->
                <polyline points="17 6 23 6 23 12"></polyline>
            </svg>
            <h2>Populair nu</h2>
        </div>
        <span>Wat anderen bestellen</span>
    </div>

    <div class="popular__track">
        <?php foreach ($orderedPopularItems as $item): ?>
            <article class="popular-card">
                <a href="4_product.php?id=<?= $item['id'] ?>">
                    <img
                            src="assets/images/ramen/<?= htmlspecialchars($item['image_url']) ?>"
                            alt="<?= htmlspecialchars($item['name']) ?>">

                    <div class="popular-card__body">
                        <span class="popular-badge">Populair</span>

                        <h3><?= htmlspecialchars($item['name']) ?></h3>

                        <div class="popular-card__footer">
                            <?php if ($item['is_deal']): ?>
                                <span class="old-price">
                    €<?= number_format($item['price'], 2, ',', '.') ?>
                  </span>
                                <span class="price">
                    €<?= number_format($item['deal_price'], 2, ',', '.') ?>
                  </span>
                            <?php else: ?>
                                <span class="price">
                    €<?= number_format($item['price'], 2, ',', '.') ?>
                  </span>
                            <?php endif; ?>
                            <button>Bestel</button>
                        </div>
                    </div>
                </a>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="story-banner">
    <div class="story-banner__overlay"></div>

    <div class="story-banner__content">
        <span class="story-banner__label">Yume Ramen</span>
        <h2>Van keuken<br>tot jouw deur</h2>
        <p>
            Onze ramen wordt dagelijks vers bereid volgens
            traditionele Japanse recepten.
        </p>

        <a href="2_menu.php" class="story-banner__button">
            Ontdek het menu
        </a>
    </div>
</section>

<section class="deals">
    <div class="deals__header">
        <h2>Aanbiedingen</h2>
        <span>Tijdelijk extra voordelig</span>
    </div>

    <div class="deals__track">

        <?php foreach ($deals as $deal): ?>
            <article class="deal-card">
                <a href="4_product.php?id=<?= $deal['id'] ?>">
                    <img
                            src="assets/images/ramen/<?= htmlspecialchars($deal['image_url']) ?>"
                            alt="<?= htmlspecialchars($deal['name']) ?>">

                    <div class="deal-card__body">
                        <span class="deal-badge">Aanbieding</span>

                        <h3><?= htmlspecialchars($deal['name']) ?></h3>
                        <p><?= htmlspecialchars($deal['description']) ?></p>

                        <div class="deal-card__footer">
                            <div class="prices">
                  <span class="old-price">
                    €<?= number_format($deal['price'], 2, ',', '.') ?>
                  </span>
                                <span class="new-price">
                    €<?= number_format($deal['deal_price'], 2, ',', '.') ?>
                  </span>
                            </div>
                            <span class="deal-btn">Bekijk</span>
                        </div>
                    </div>
                </a>
            </article>
        <?php endforeach; ?>

    </div>
</section>


<?php
include './includes/footer.php';
?>

<script src="./assets/js/swipe_hint.js"></script>
<script src="./assets/js/cart.js"></script>
<script src="./assets/js/animations.js"></script>

</body>

</html>