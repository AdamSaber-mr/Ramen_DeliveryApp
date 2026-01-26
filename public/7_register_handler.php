<?php
session_start();

// Database connectie
require_once '../app/config/database.php';

// Form data ophalen
$firstName = trim($_POST['first_name'] ?? '');
$lastName  = trim($_POST['last_name'] ?? '');
$email     = trim($_POST['email'] ?? '');
$password  = $_POST['password'] ?? '';
$confirm   = $_POST['password_confirm'] ?? '';

// 1. Check: alles ingevuld?
if ($firstName === '' || $lastName === '' || $email === '' || $password === '' || $confirm === '') {
    $_SESSION['register_error'] = 'Vul alle velden in.';
    header('Location: register.php');
    exit;
}

// 2. Check: wachtwoorden gelijk?
if ($password !== $confirm) {
    $_SESSION['register_error'] = 'Wachtwoorden komen niet overeen.';
    header('Location: register.php');
    exit;
}

// 3. Check: bestaat email al?
$stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$email]);

if ($stmt->fetch()) {
    $_SESSION['register_error'] = 'Dit e-mailadres is al in gebruik.';
    header('Location: register.php');
    exit;
}

// 4. Wachtwoord hashen
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// 5. Gebruiker opslaan
$stmt = $pdo->prepare("
    INSERT INTO users (first_name, last_name, email, password_hash)
    VALUES (?, ?, ?, ?)
");

$stmt->execute([
    $firstName,
    $lastName,
    $email,
    $hashedPassword
]);

// 6. User automatisch inloggen
$_SESSION['user_id'] = $pdo->lastInsertId();
$_SESSION['user_name'] = $firstName;

// Flash message: account aangemaakt
$_SESSION['flash'] = [
    'type' => 'success',
    'message' => 'Account succesvol aangemaakt. Je kunt nu inloggen.'
];

// Redirect naar login pagina
header('Location: 6_login.php');
exit;

