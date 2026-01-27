<?php
session_start();
global $pdo;

// Database connectie
require_once '../app/config/database.php';

// Form data ophalen
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// 1. Check: velden ingevuld?
if ($email === '' || $password === '') {
    $_SESSION['login_error'] = 'Vul je e-mailadres en wachtwoord in.';
    header('Location: 6_login.php');
    exit;
}

// 2. Gebruiker ophalen
$stmt = $pdo->prepare("SELECT id, first_name, password_hash FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// 3. Check: gebruiker bestaat + wachtwoord klopt
if (!$user || !password_verify($password, $user['password_hash'])) {
    $_SESSION['login_error'] = 'Onjuist e-mailadres of wachtwoord.';
    header('Location: 6_login.php');
    exit;
}

// 4. Inloggen → session zetten
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['first_name'];

// 5. Flash message
$_SESSION['flash'] = [
    'type' => 'success',
    'message' => 'Je bent succesvol ingelogd.'
];

// 6. Redirect naar homepagina
header('Location: 1_index.php');
exit;
