<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$k =0;
$credit = 100;
for($i = 1;$i<=20;$i++){
    if ($i % 5 == 0) {
        echo "The number is: $i <br>";
        // $sum += $i;
        $k++;
    }
}
$result= $credit -(5 * $k);
echo "จำนวนเครดิต = ".$result;
?>

<?php  
// $x = 1;
 
// while($x <= 5) {
//     if(10 % $x == 0 ){
//   echo "The number is: $x <br>";
//   $x++;
//     }
// } 
// echo "มีจำนวน$x";


?>  


</body>
</html>