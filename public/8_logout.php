<?php
session_start();

// Alle session data verwijderen
session_unset();
session_destroy();

// Nieuwe session starten voor flash message
session_start();

$_SESSION['flash'] = [
    'type' => 'success',
    'message' => 'Je bent uitgelogd.'
];

// Terug naar homepage
header('Location: 1_index.php');
exit;
