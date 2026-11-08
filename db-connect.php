<?php
$host = 'localhost';
$db   = 'webgis_db';
$user = 'postgres';
$pass = 'your_password';
$port = '5432';

$dsn = "pgsql:host=$host;port=$port;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (\PDOException $e) {
    echo json_encode(["error" => "Database connection failed: " . $e->getMessage()]);
    exit;
}
?>