<?php
// Read credentials directly from Render's environment variables
$host     = getenv('DB_HOST');
$port     = getenv('DB_PORT') ?: '4000'; // Defaults to 4000 if not set
$dbname   = getenv('DB_NAME') ?: 'softwares';
$username = getenv('DB_USER');
$password = getenv('its_softwares');

try {
    // TiDB requires SSL configuration, which is handled via PDO options
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_SSL_CA       => true, // Required for secure cloud database links
    ];

    $pdo = new PDO($dsn, $username, $password, $options);
    
    // Connection successful!
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
