<?php
// Read credentials directly from Render's environment variables
$host     = getenv('DB_HOST');
$port     = getenv('DB_PORT') ?: '4000'; 
$dbname   = getenv('DB_NAME') ?: 'softwares'; // Matches your TiDB cloud schema folder name
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD'); // Fixed variable key name

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_SSL_CA       => true, 
    ];

    // Named $conn so the rest of your web pages can access it seamlessly
    $conn = new PDO($dsn, $username, $password, $options);
    
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
