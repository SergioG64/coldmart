<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "coldmart";

try {
    $pdo = new PDO("mysql:host=$host;dbname=" . $db, $user, $pass);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
