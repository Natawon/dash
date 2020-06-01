<?php

try{
$con = new PDO ("mysql:host=monitor2.open-cdn.com;dbname=employee","root","dootvazws3e"); 
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "connected";
}
catch(PDOException $e)
{
//echo "error:".$e->getMessage(); 
}

?>
