<?php
$conn  = new PDO("mysql:host=monitor2.open-cdn.com;dbname=employee", "root", "dootvazws3e");   
$sth = $conn->prepare("select * from personal");
$conn->query('SET NAMES utf8');
$sth->execute();

while($row = $sth->fetch(PDO::FETCH_ASSOC))
{
//   $test = $row["sick_leave"];
 
  $minutes = $row["sick_leave"];
//
// Assuming that your minutes value is $minutes
//
$d = floor ($minutes / 1440);
$h = floor (($minutes - $d * 1440) / 60);
$m = $minutes - ($d * 1440) - ($h * 60);
//
// Then you can output it like so...
//
echo "Sick_Leave : {$d}d {$h}h {$m}m","<br>";
}
?>
<html>
<head>
<title>report-usage</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.center {
  margin: auto;
  margin-top:1%;
  width: 50%;
  border: 1px solid #A9A9A9;
  padding: 10px;
}
#myProgress {
  width: 100%;
  background-color: #ddd;
}

#myBar {
  width: 10%;
  height: 30px;
  background-color: #4CAF50;
  text-align: center;
  line-height: 30px;
  color: white;
}
a {
  margin-top: 1%;  
  margin-left: 50%;  
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}
a:hover {
  background-color: #ddd;
  color: black;
}
.previous {
  background-color: #daf8e3;
  color: black;
}

.next {
  background-color: #4CAF50;
  color: white;
}

.round {
  border-radius: 50%;
}

</style>
</head>
<?php
	$conn  = new PDO("mysql:host=monitor2.open-cdn.com;dbname=employee", "root", "dootvazws3e");   

?>
<body>
<div class="center">
	<?php
        // echo $_POST["lmName1"];
        // echo $_POST["lmName2"];

		
		echo "<hr size='40'>";
   echo "<span style='font-size:20px;'>Data Usage</span>";

        $sth = $conn->prepare("select * from personal");
        $conn->query('SET NAMES utf8');
        
        $sth->execute();

        // Create connection
        // $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        // if ($conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error);
        // } 

        // $sql = "SELECT DISTINCT(project_name),disk_usage,MONTH(record_date) as 'MONTH'
        // FROM samba
        // INNER JOIN samba_service 
        // ON samba.samba_id = samba_service.samba_id 
        // WHERE MONTH(record_date)=11
        // and samba.`samba_id` = '".$_POST["lmName1"]."'
        // order by disk_usage DESC limit 1
        // ";
        // $result = $conn->query($sql);

            // output data of each row

            if ($sth->rowCount() > 0) {
                
                
            


            while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                $minutes = $row["sick_leave"];
            //
            // Assuming that your minutes value is $minutes
            //
            $d = floor ($minutes / 1440);
            $h = floor (($minutes - $d * 1440) / 60);
            $m = $minutes - ($d * 1440) - ($h * 60);
            // echo $d;
           echo "<br>  "."Sick-leave"."<div style='float:right;'>". $d ." used of 30 ". "</div><br><br>";
           echo "<div class='w3-light-grey'>";
           $number= $d;
        //    $number2= substr($row["disk_usage"],0,2);
            // echo $number;

          //  if($number == 100){
          //   echo "<div class='w3-container w3-blue' style='width:100%'>"."100%"."</div>";
          //  }elseif($number > 100){
          //   echo "<div class='w3-container w3-blue' style='height:24px;width:100%'></div>";
          //  }elseif($number <= 100){
          //   echo "<div class='w3-container w3-blue' style='height:24px;width:$number%'></div>";
          //  }elseif($number == 0){
          //   echo "NOT FOUND";
          //  }

           if($number == 30){
            echo "<div class='w3-container w3-blue' style='height:24px;width:30%'></div>";
           }elseif($number < 30){
            echo "<div class='w3-container w3-blue' style='height:24px;width:$number%'></div>";
           }elseif($number == 0){
            echo "<div class='w3-container Light Gray' style='height:24px;width:30%'></div>";
           }else{
            echo "<p style='text-align:center;'>NOT FOUND</p>";
           }
    }
       
}       
// $conn->close();
    ?>
    </div>
    <hr>

    <!-- <div class="center">
    <div class="w3-light-grey">
  <div class="w3-container w3-blue" style="width:3%">2.1%</div>
  </div>
    </div> -->
</div>
<a href="page1.php" class="previous round">&#8249;</a>


</body>
</html>

