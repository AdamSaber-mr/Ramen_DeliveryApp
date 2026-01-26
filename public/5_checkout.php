<?php
session_start();

// Login verplicht
if (!isset($_SESSION['user_id'])) {
    $_SESSION['flash'] = [
        'type' => 'error',
        'message' => 'Log in of registreer om je bestelling af te ronden.'
    ];
    header('Location: 6_login.php');
    exit;
}

// Extra check op winkelwagen
if (empty($_SESSION['cart'])) {
    $_SESSION['flash'] = [
            'type' => 'error',
            'message' => 'Je winkelmand is leeg.'
    ];
    header('Location: 2_menu.php');
    exit;
}


// DB connectie
require_once '../app/config/database.php';

$userId = $_SESSION['user_id'];

$stmt = $pdo->prepare("
    SELECT first_name, last_name, email
    FROM users
    WHERE id = ?
");
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Extra veiligheid
if (!$user) {
    session_destroy();
    header('Location: 6_login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../src/output.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/checkout/checkout.css">
    <link rel="stylesheet" href="./assets/css/cart/cart.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <title>Checkout pagina</title>
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
        <div class="flash flash--<?= $flash['type'] ?>">
            <?= htmlspecialchars($flash['message']) ?>
        </div>
    <?php endif; ?>

    <section class="checkout">

        <a href="1_index.php" class="product-back">← Terug naar home</a>

        <h1>Bestelling afronden</h1>
        <p class="checkout-intro">
            Vul je gegevens in om je bestelling te voltooien.
        </p>

        <form class="checkout-form" method="POST" action="9_place_order.php">

            <!-- Gegevens -->
            <div class="checkout-section">
                <h2>Jouw gegevens</h2>

                <div class="field-group">
                    <input type="text" name="name"
                           value="<?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?>"
                           required>

                    <input type="email" name="email"
                           value="<?= htmlspecialchars($user['email']) ?>"
                           required>
                </div>

                <div class="form-row">
                    <div class="form-group street">
                        <label for="street">Straat</label>
                        <input
                                type="text"
                                name="street"
                                id="street"
                                placeholder="Bijv. Heer Bokkelweg"
                                required
                        >
                    </div>

                    <div class="form-group house-number">
                        <label for="house_number">Nr.</label>
                        <input
                                type="text"
                                name="house_number"
                                id="house_number"
                                placeholder="21"
                                required
                        >
                    </div>
                </div>

                <div class="field-group">
                    <input type="text" name="zipcode" placeholder="Postcode">
                    <input type="text" name="city" placeholder="Plaats">
                </div>
            </div>

            <!-- Overzicht -->
            <div class="checkout-section">
                <h2>Overzicht</h2>

                <div class="summary-row">
                    <span>Subtotaal</span>
                    <span>€32,00</span>
                </div>

                <div class="summary-row">
                    <span>Bezorgkosten</span>
                    <span>€2,50</span>
                </div>

                <div class="summary-total">
                    <span>Totaal</span>
                    <span>€34,50</span>
                </div>
            </div>

            <!-- Actie -->
            <button type="submit" class="checkout-btn">
                    Bestelling plaatsen
            </button>

        </form>

    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="./assets/js/animations.js"></script>
    <script src="./assets/js/cart.js"></script>

</body>

</html>