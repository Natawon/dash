<?php
$conn  = new PDO("mysql:host=localhost;dbname=personaldb", "admin", "1234");   

$query = $conn->prepare("SELECT customer.Cus_id,customer.Name,donate.Bill,donate.Record_date,donate.Amount,donate.Bank,donate.Slip,donate.Ems,donate.Status,donate.id,COUNT(customer.Cus_id)as customer,SUM(donate.Amount) as money
    FROM customer 
    INNER JOIN donate
    ON customer.Cus_id=donate.Cus_id   
    GROUP by customer.Cus_id
    


");
$conn->query('SET NAMES utf8');

$query->execute();

$result2 = $query->fetchAll();
; 

?>