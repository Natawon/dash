<?php
$conn  = new PDO("mysql:host=localhost;dbname=tests", "admin", "1234");   
$sth = $conn->prepare("SELECT id, name, date_starts, date_expire, DATEDIFF(date_expire, date_starts) as ddiff FROM stock order by 'id', ddiff ");
$sth->execute();
$conn->query('SET NAMES utf8');
$result = $sth->fetchAll();
;

$myJSON = json_encode($result);

echo $myJSON;
?>


