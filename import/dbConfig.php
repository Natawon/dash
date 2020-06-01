<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "admin";
$dbPassword = "1234";
$dbName     = "customer";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}