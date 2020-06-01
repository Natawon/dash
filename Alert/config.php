<?php
$conn  = new PDO("mysql:host=localhost;dbname=tests", "admin", "1234");   
$sth = $conn->prepare("SELECT * FROM domain order by 'id' ");
$sth->execute();
$conn->query('SET NAMES utf8');
$result = $sth->fetchAll();
;

?>



