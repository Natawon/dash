<?php
if(isset($_POST["submit"])){
$hostname='localhost';
$username='admin';
$password='1234';

try {
$dbh = new PDO("mysql:host=$hostname;dbname=tests",$username,$password);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
$sql = "INSERT INTO stock (name, date_starts, date_expire)
VALUES ('".$_POST["stu_name"]."','".$_POST["stu_start"]."','".$_POST["stu_expire"]."')";
if ($dbh->query($sql)) {
echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
header("refresh:1;domain.php");
}
else{
echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}

$dbh = null;
}
catch(PDOException $e)
{
echo $e->getMessage();
}

}
?>