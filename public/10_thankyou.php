<?php
session_start();
require_once '../app/config/database.php';
global $pdo;

// Check order_id
$orderId = $_GET['order_id'] ?? null;

if (!$orderId || !is_numeric($orderId)) {
    header('Location: 2_menu.php');
    exit;
}

// Order + adres ophalen
$stmt = $pdo->prepare("
    SELECT 
        orders.id AS order_id,
        orders.created_at,
        addresses.street,
        addresses.house_number,
        addresses.postal_code,
        addresses.city
    FROM orders
    JOIN addresses ON orders.address_id = addresses.id
    WHERE orders.id = ?
");
$stmt->execute([$orderId]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$order) {
    header('Location: 2_menu.php');
    exit;
}

// Bestelnummer maken (netjes & consistent)
$orderNumber = 'YR' . str_pad($order['order_id'], 5, '0', STR_PAD_LEFT);

// Adres opmaken
$address = htmlspecialchars(
        $order['street'] . ' ' .
        $order['house_number'] . ' ' .
        $order['postal_code'] . ' ' .
        $order['city']
);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/thankyou/thankyou.css">
    <title>Bedankt voor je bestelling</title>
</head>

<body>

<section class="thankyou">

    <div class="thankyou-card">

        <div class="check-icon">✔</div>

        <h1 class="jp-text">ありがとうございます</h1>
        <p class="jp-sub">Arigatou Gozaimasu!</p>

        <h2>Bestelling geplaatst 🎉</h2>

        <p class="thankyou-text">
            Je authentieke Japanse ramen wordt met zorg bereid en is onderweg.<br>
            Verwachte bezorgtijd: <strong>30–45 minuten</strong>
        </p>

        <div class="order-box">
            <span>Bestelnummer</span>
            <strong>#<?= $orderNumber ?></strong>
        </div>

        <div class="info-box">
            <div>
                <strong>Bezorgadres</strong>
                <p><?= $address ?></p>
            </div>

            <div>
                <strong>Bezorgtijd</strong>
                <p>30–45 minuten</p>
            </div>
        </div>

        <a href="2_menu.php" class="back-btn">
            Terug naar menu
        </a>

    </div>

</section>

</body>
</html>
