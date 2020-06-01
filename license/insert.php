<?php
if(isset($_POST["btn_save_updates"])){
$hostname='localhost';
$username='admin';
$password='1234';

try {
$dbh = new PDO("mysql:host=$hostname;dbname=tests",$username,$password);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
$sql = "INSERT INTO domain (name, web,sale,date_start,date_expire)
VALUES ('".$_POST["name"]."','".$_POST["web"]."','".$_POST["sale"]."','".$_POST["date_start"]."','".$_POST["date_expire"]."')";
if ($dbh->query($sql)) {
echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
header("refresh:1;license.php"); }
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