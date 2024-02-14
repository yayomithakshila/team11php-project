<?php
// Database connection parameters
$servername = "php241-db-1"; // MySQL server hostname
$username = "root";         // MySQL username
$password = "password";     // MySQL password
$dbname = "php_project";    // MySQL database

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
