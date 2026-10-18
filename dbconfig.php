<?php
// Database configuration settings
$host = 'localhost';
$dbname = 'grocery_db'; // Your database name
$username = 'root';     // Default phpMyAdmin username
$password = '';         // Default phpMyAdmin password (usually blank)

try {
    // Create a new PDO instance to connect to the MySQL database
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);

    // Set error mode to exception to catch any connection errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Set default fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Catch and display connection error message
    die("Database Connection Failed: " . $e->getMessage());
}
?>
