<?php
$servername = "localhost";
$username = "admin";
$password = "1234";
$dbname = "tests";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

