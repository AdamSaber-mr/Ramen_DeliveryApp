<?php
// ==== LOCAL MAMP SETTINGS ====
$local = [
    "host" => "localhost",
    "port" => "8889",
    "dbname" => "Yume_ramen_bp02",
    "user" => "root",
    "pass" => "root"
];

try {
    $dsn = "mysql:host={$local['host']};port={$local['port']};dbname={$local['dbname']};charset=utf8mb4";

    $pdo = new PDO($dsn, $local['user'], $local['pass']);

    // Fouten als exceptions tonen (handig tijdens development)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Stop alles als de connectie faalt
    die("Database connectie mislukt: " . $e->getMessage());
}
