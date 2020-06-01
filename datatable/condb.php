<?php 
/* Database connection start */
$servername = "monitor2.open-cdn.com";
$username = "root";
$password = "dootvazws3e";
$dbname = "data";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
?>