<?php
$conn  = new PDO("mysql:host=localhost;dbname=bee", "admin", "1234");   

$query = $conn->prepare("SELECT phamarcy.price_tag,order_details.order_id,phamarcy.name, order_details.order_detail_price,orders.order_date, order_details.order_detail_quantity
FROM order_details
INNER JOIN phamarcy
ON order_details.product_id=phamarcy.id
INNER JOIN orders  
ON order_details.order_id=orders.id
where date(orders.order_date) = '2017-11-14'
UNION
SELECT '','' as order_id ,'รวม' as name, SUM(order_details.order_detail_price) as order_detail_price,'' as order_date, SUM(order_details.order_detail_quantity) as order_detail_quantity
FROM order_details
INNER JOIN phamarcy
ON order_details.product_id=phamarcy.id
INNER JOIN orders  
ON order_details.order_id=orders.id
where date(orders.order_date) = '2017-11-14'






");
$conn->query('SET NAMES utf8');

$query->execute();
$result = $query->fetchAll();
echo json_encode($result);
; 
echo($outp); 


?> 