<?php
session_start();
require_once '../../../app/config/database.php';

// POST data
$menuItemId = $_POST['menu_item_id'] ?? null;
$quantity   = $_POST['quantity'] ?? 1;

if (!$menuItemId || !is_numeric($menuItemId)) {
    header('Location: ../../2_menu.php');
    exit;
}

// Product ophalen uit DB
$stmt = $pdo->prepare("
    SELECT id, name, price
    FROM menu_items
    WHERE id = ? AND is_available = 1
");
$stmt->execute([$menuItemId]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    $_SESSION['flash'] = [
        'type' => 'error',
        'message' => 'Dit gerecht bestaat niet.'
    ];
    header('Location: ../../2_menu.php');
    exit;
}

// Cart initialiseren
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check of item al in cart zit
$found = false;

foreach ($_SESSION['cart'] as &$item) {
    if ($item['menu_item_id'] == $menuItemId) {
        $item['quantity'] += $quantity;
        $found = true;
        break;
    }
}

// Nieuw item toevoegen
if (!$found) {
    $_SESSION['cart'][] = [
        'menu_item_id' => $product['id'],
        'name' => $product['name'],
        'price' => $product['price'],
        'quantity' => $quantity
    ];
}

// Flash
$_SESSION['flash'] = [
    'type' => 'success',
    'message' => 'Toegevoegd aan winkelwagen'
];

// Redirect
header('Location: ../../2_menu.php');
exit;

