<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "treePlanting";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create members table if not exists
$sql = "CREATE TABLE IF NOT EXISTS members (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    work_type VARCHAR(20) NOT NULL,
    join_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    error_log("Table creation error: " . $conn->error);
}

// Admin password - FIXED: Use simple comparison for now
define('ADMIN_PASSWORD', '1234'); // Simple password for testing

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>