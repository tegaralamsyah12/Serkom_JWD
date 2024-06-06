<?php
$host = 'localhost';
$db = 'hotel_booking';
$user = 'root';
$pass = '';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    // Membuat koneksi ke database menggunakan PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected to the database successfully!"; // Optional: Uncomment this for debugging
} catch (PDOException $e) {
    // Menangani error koneksi
    die("Could not connect to the database $db :" . $e->getMessage());
}
?>
