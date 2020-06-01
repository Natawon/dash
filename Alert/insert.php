<?php
$dbhost     = "localhost";
$dbname     = "unchisap_db";
$dbusername = "unchisap_user";
$dbpassword = "unchisap_1234";

$data       = json_decode(file_get_contents("php://input"));
$link       = new PDO("mysql:host=$dbhost;dbname=$dbname","$dbusername","$dbpassword");
mysql_set_charset("utf8",$link);

if (count($data) > 0) {
 
$id                   = $data->id;
$name                 = $data->name;
$date_starts          = $data->date_starts;
$date_expire          = $data->date_expire;


// $Max_total        = $data->Max_total;



$btn_name        = $data->btnName;
 
    if ($btn_name == "Insert") {


    $statement  = $link->prepare('INSERT INTO stock(name,date_starts,date_expire) VALUES(:name,:date_starts,:date_expire)');
    $statement->execute(array(
        ":name"              => $name,
        ":date_starts"       => $date_starts,
        ":date_expire"       => $date_expire,
        

        // ":Max_total"     => $Max_total,

));

// echo 'Fname:'.$fname.' Lname:'.$lname."\n";
}


  }




?>



