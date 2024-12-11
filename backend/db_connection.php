<?php
$servername = "127.0.0.1";  // MySQL server address
$username = "root";         // MySQL username
$password = "";             // No password set for root user
$dbname = "movie_db";       // Database name

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}
?>
