
<?php

	header("Content-Type: application/json");
	$conn  = new PDO("mysql:host=localhost;dbname=Traffic", "admin", "1234");   
    $sth = $conn->prepare("SELECT date,max(outbound) inbound FROM `kz` GROUP BY date ");
   $sth->execute();

  $conn->query('SET NAMES utf8');

  $result = $sth->fetchAll();


  foreach ($result as $k => $var) {
  	$result[$k]['outbound'] = floatval($var['outbound']);
  }
  echo json_encode($result);

?>