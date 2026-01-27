<?php
session_start();
require_once '../app/config/database.php';

// 🔒 Check login
if (!isset($_SESSION['user_id'])) {
    $_SESSION['flash'] = [
        'type' => 'error',
        'message' => 'Log in om je bestelling af te ronden.'
    ];
    header('Location: 6_login.php');
    exit;
}

// 🛒 Check cart
if (empty($_SESSION['cart'])) {
    header('Location: 2_menu.php');
    exit;
}

$userId = $_SESSION['user_id'];

// 📦 Form data
$street       = trim($_POST['street'] ?? '');
$houseNumber  = trim($_POST['house_number'] ?? '');
$postalCode   = trim($_POST['zipcode'] ?? '');
$city         = trim($_POST['city'] ?? '');

// 🔎 Simpele validatie
if ($street === '' || $houseNumber === '' || $postalCode === '' || $city === '') {
    $_SESSION['flash'] = [
        'type' => 'error',
        'message' => 'Vul alle adresgegevens in.'
    ];
    header('Location: 5_checkout.php');
    exit;
}

// 🧮 Totaalprijs berekenen
$subtotal = 0;
foreach ($_SESSION['cart'] as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}

$deliveryCost = 2.50;
$totalPrice = $subtotal + $deliveryCost;

try {
    // 🧱 TRANSACTIE START
    $pdo->beginTransaction();

    // 1️⃣ Adres opslaan
    $stmt = $pdo->prepare("
        INSERT INTO addresses (user_id, street, house_number, postal_code, city)
        VALUES (?, ?, ?, ?, ?)
    ");
    $stmt->execute([
        $userId,
        $street,
        $houseNumber,
        $postalCode,
        $city
    ]);

    $addressId = $pdo->lastInsertId();

    // 2️⃣ Order opslaan
    $stmt = $pdo->prepare("
        INSERT INTO orders (user_id, address_id, total_price, status)
        VALUES (?, ?, ?, 'placed')
    ");
    $stmt->execute([
        $userId,
        $addressId,
        $totalPrice
    ]);

    $orderId = $pdo->lastInsertId();

    // 3️⃣ Order items opslaan
    $stmt = $pdo->prepare("
    INSERT INTO order_items (order_id, menu_item_id, quantity, price_at_time)
    VALUES (?, ?, ?, ?)
");

    foreach ($_SESSION['cart'] as $item) {
        $stmt->execute([
            $orderId,
            $item['menu_item_id'],
            $item['quantity'],
            $item['price']
        ]);
    }

    // 🧹 Cart leegmaken
    unset($_SESSION['cart']);

    // ✅ TRANSACTIE OK
    $pdo->commit();

    // ➡️ Bedankt pagina
    header('Location: 10_thankyou.php');
    exit;

}catch (Exception $e) {
    $pdo->rollBack();

    echo '<pre>';
    echo $e->getMessage();
    echo '</pre>';
    exit;
}
