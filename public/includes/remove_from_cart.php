<?php
session_start();

$index = $_POST['index'] ?? null;

if ($index !== null && isset($_SESSION['cart'][$index])) {
    unset($_SESSION['cart'][$index]);

    // array opnieuw indexeren
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

$_SESSION['flash'] = [
    'type' => 'success',
    'message' => 'Item verwijderd uit winkelmand'
];

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
