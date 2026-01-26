<?php
session_start();

$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location: 2_menu.php');
    exit;
}

// Dummy data (later uit DB)
$productName = "Shoyu Deluxe";
$productPrice = 16.50;

// Init cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Toevoegen (simpel, later slimmer)
$_SESSION['cart'][] = [
    'id' => $id,
    'name' => $productName,
    'price' => $productPrice,
    'quantity' => 1
];

// Flash message
$_SESSION['flash'] = [
    'type' => 'success',
    'message' => 'Toegevoegd aan winkelwagen'
];

// Redirect
header('Location: ../../2_menu.php');
exit;
