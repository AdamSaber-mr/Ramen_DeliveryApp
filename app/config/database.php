<?php
$local = [
    "host" => "localhost",
    "dbname" => "Yume_ramen_bp02",
    "user" => "bp02_102896",
    "pass" => "Adamsaber0182"
];
try {
    $dsn = "mysql:host={$local['host']};dbname={$local['dbname']};charset=utf8mb4";

    $pdo = new PDO($dsn, $local['user'], $local['pass']);

    // Fouten als exceptions tonen (handig tijdens development)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Stop alles als de connectie faalt
    die("Database connectie mislukt: " . $e->getMessage());
}
