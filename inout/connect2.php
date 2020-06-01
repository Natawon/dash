
<?php

	header("Content-Type: application/json");
	$conn  = new PDO("mysql:host=monitor2.open-cdn.com;dbname=employee", "root", "dootvazws3e");   
    $sth = $conn->prepare("SELECT EmployeeName,CONCAT(InOutDate,' ',Intime) as time,TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 as ddif FROM employee_copy where InOutDate = '29/01/2563'");
    $conn->query('SET NAMES utf8');

    $sth->execute();


  $result = $sth->fetchAll();


  // foreach ($result as $k => $var) {
  // 	$result[$k]['outbound'] = floatval($var['outbound']);
  // }
  echo json_encode($result);

?>