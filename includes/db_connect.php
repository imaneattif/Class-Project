<?php
$host = '127.0.0.1';
$db   = 'student121'; 
$user = 'student121'; 
$pass = "Seminole8b3m!"; 
$charset = 'utf8mb4';


// Set up DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Set up options for PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Create a new PDO instance
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Handle any errors without exposing sensitive details
    error_log($e->getMessage());
    // You can also trigger a custom error page or message here
    die('A database error has occurred.'); // Generic error message to user
}

// Function to close the database connection
function closeDbConnection(&$pdo) {
    $pdo = null;
}
?>

