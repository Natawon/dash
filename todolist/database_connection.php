<?php
//database_connection.php

$connect = new PDO("mysql:host=monitor2.open-cdn.com;dbname=test2", "root", "dootvazws3e");

session_start();

$_SESSION["user_id"] = "1";

?>