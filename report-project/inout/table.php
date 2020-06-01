<!DOCTYPE html>
<html>
<head>
<style>
td{max-width:67%;}
h1{
    text-align:center;
    color:black;

}
.circle{ /* ชื่อคลาสต้องตรงกับ <img class="circle"... */
    height: 100;  /* ความสูงปรับให้เป็นออโต้ */
    width: 100;  /* ความสูงปรับให้เป็นออโต้ */
    border: 3px solid #fff; /* เส้นขอบขนาด 3px solid: เส้น #fff:โค้ดสีขาว */
    border-radius: 50%; /* ปรับเป็น 50% คือความโค้งของเส้นขอบ*/
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* เงาของรูป */
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  /* background-color: #4CAF50; */
  color: white;
}

.div1 {
    float:right;
    margin-right:200px; 

    width: 20px;
  height: 20px;  
  border: 1px solid yellow;
  background-color:yellow;
  box-sizing: border-box;
  
}

.div2 {
    float:right;
    width: 20px;
  height: 20px; 
  margin-right:50px; 
  /* padding: 50px; */
  border: 1px solid green;
  background-color:green;
  box-sizing: border-box;
}
.div3 {
    float:right;
    width: 20px;
  height: 20px; 
  margin-right:70px; 
 
  /* padding: 50px; */
  border: 1px solid red;
  background-color:red;
  box-sizing: border-box;
}
span{
    float:left;
    margin-left:20px; 


}
@-moz-keyframes blink {
    0% {
        opacity:1;
    }
    50% {
        opacity:0;
    }
    100% {
        opacity:1;
    }
} 

@-webkit-keyframes blink {
    0% {
        opacity:1;
    }
    50% {
        opacity:0;
    }
    100% {
        opacity:1;
    }
}
/* IE */
@-ms-keyframes blink {
    0% {
        opacity:1;
    }
    50% {
        opacity:0;
    }
    100% {
        opacity:1;
    }
} 
/* Opera and prob css3 final iteration */
@keyframes blink {
    0% {
        opacity:1;
    }
    50% {
        opacity:0;
    }
    100% {
        opacity:1;
    }
} 
.blink-image {
    -moz-animation: blink normal 2s infinite ease-in-out; /* Firefox */
    -webkit-animation: blink normal 2s infinite ease-in-out; /* Webkit */
    -ms-animation: blink normal 2s infinite ease-in-out; /* IE */
    animation: blink normal 2s infinite ease-in-out; /* Opera and prob css3 final iteration */
    height: 100;  /* ความสูงปรับให้เป็นออโต้ */
    width: 100;  /* ความสูงปรับให้เป็นออโต้ */
    border: 3px solid #fff; /* เส้นขอบขนาด 3px solid: เส้น #fff:โค้ดสีขาว */
    border-radius: 50%; /* ปรับเป็น 50% คือความโค้งของเส้นขอบ*/
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* เงาของรูป */
}
select {
  border: 0 none;
  color: #000000;
  background: transparent;
  font-size: 20px;
  font-weight: bold;
  padding: 2px 10px;
  /* width: 200px; */
  *width: 350px;
  *background: #58B14C;
  /* background-color:red; */
  margin-left:500px;

}
form{
    margin-top:-6%;
    margin-left:10px;

}
h1{
    width:600px;
}

</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    // $( "#datepicker" ).datepicker();
    $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });

  } );
  </script>
</head>
<body>
    <div class="div1"><span style="width:70px;">ลา / อื่นๆ</span></div>
    <div class="div2"><span style="width:50px;">มาเช้า<span></div>
    <div class="div3"><span style="width:70px;">มาสาย!</span></div>



<?php
  // header("Refresh:0");

$conn  = new PDO("mysql:host=monitor2.open-cdn.com;dbname=employee", "root", "dootvazws3e");   
$sth = $conn->prepare("SELECT employee_copy.id, EmployeeName,EmpDeptName,Note, InOutDate, InTime ,TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 as ddiff ,timediff(InTime,'8:30:00') as ddiff2 ,user.image
FROM employee_copy
LEFT JOIN user
ON employee_copy.user_id = user.id
WHERE InOutDate ='".$_POST["lmName1"]."' and InOutDate ='".$_POST["lmName2"]."' and TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 > 1 order by ddiff DESC LIMIT 0,6");
$conn->query('SET NAMES utf8');

$sth->execute();



$sth7 = $conn->prepare("SELECT DISTINCT InOutDate
FROM employee_copy
order by InOutDate ");
$conn->query('SET NAMES utf8');

$sth7->execute();

?>

<table id="customers">
  <h1>ตารางเข้างาน <?php echo $_POST["lmName1"];?>
  <form action="#" method="post" name="form1" >

  <select name="lmName1"  onchange="document.form1.submit()";>
			<option value=""><-- Please Select Month --></option>
			<?php
            while($row7 = $sth7->fetch(PDO::FETCH_ASSOC))
			{
            ?>

			<option value="<?php echo $row7['InOutDate'];?>"><?php echo $row7['InOutDate'];?></option>
			<?php
			}
			?>
          </select>



</form>

<!-- <h1><?php echo $_POST["lmName1"];?></h1>//ปริ้นออกมาบรรทัดนี้ -->
<?php 
    $conn  = new PDO("mysql:host=monitor2.open-cdn.com;dbname=employee", "root", "dootvazws3e");   
    $sth = $conn->prepare("SELECT employee_copy.id, EmployeeName,EmpDeptName,Note, InOutDate, InTime ,TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 as ddiff ,timediff(InTime,'8:30:00') as ddiff2 ,user.image
    FROM employee_copy
    LEFT JOIN user
    ON employee_copy.user_id = user.id
    WHERE InOutDate ='".$_POST["lmName1"]."' and TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 > 1 order by ddiff DESC LIMIT 0,6");
    $conn->query('SET NAMES utf8');

    $sth->execute();
    $sth1 = $conn->prepare("SELECT employee_copy.id, EmployeeName,EmpDeptName,Note, InOutDate, InTime ,TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 as ddiff ,timediff(InTime,'8:30:00') as ddiff2 ,user.image
FROM employee_copy
LEFT JOIN user
ON employee_copy.user_id = user.id
WHERE InOutDate ='".$_POST["lmName1"]."' and TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 <= 00 order by ddiff ASC LIMIT 0,3");
$conn->query('SET NAMES utf8');

$sth1->execute();

$sth2 = $conn->prepare("SELECT employee_copy.id, EmployeeName,EmpDeptName,Note, InOutDate, InTime ,TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 as ddiff ,timediff(InTime,'8:30:00') as ddiff2 ,user.image
FROM employee_copy
LEFT JOIN user
ON employee_copy.user_id = user.id
WHERE InOutDate ='".$_POST["lmName1"]."' and TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 <= 00 order by ddiff ASC LIMIT 3,6");
$conn->query('SET NAMES utf8');

$sth2->execute();

$sth3 = $conn->prepare("SELECT employee_copy.id, EmployeeName,EmpDeptName,Note, InOutDate, InTime ,TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 as ddiff ,timediff(InTime,'8:30:00') as ddiff2 ,user.image
FROM employee_copy
LEFT JOIN user
ON employee_copy.user_id = user.id
WHERE InOutDate ='".$_POST["lmName1"]."' and TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 <= 00 order by ddiff ASC LIMIT 9,6");
$conn->query('SET NAMES utf8');

$sth3->execute();

$sth4 = $conn->prepare("SELECT employee_copy.id, EmployeeName,EmpDeptName,Note, InOutDate, InTime ,TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 as ddiff ,timediff(InTime,'8:30:00') as ddiff2 ,user.image
FROM employee_copy
LEFT JOIN user
ON employee_copy.user_id = user.id
WHERE InOutDate ='".$_POST["lmName1"]."' and InTime = '-' order by ddiff ASC LIMIT 0,6");
$conn->query('SET NAMES utf8');

$sth4->execute();

$sth8 = $conn->prepare("SELECT employee_copy.id, EmployeeName,EmpDeptName,Note, InOutDate, InTime ,TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 as ddiff ,timediff(InTime,'8:30:00') as ddiff2 ,user.image
FROM employee_copy
LEFT JOIN user
ON employee_copy.user_id = user.id
WHERE InOutDate ='".$_POST["lmName1"]."' and InTime = '-' order by ddiff ASC LIMIT 6,6");
$conn->query('SET NAMES utf8');

$sth8->execute();

$sth5 = $conn->prepare("SELECT employee_copy.id, EmployeeName,EmpDeptName,Note, InOutDate, InTime ,TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 as ddiff ,timediff(InTime,'8:30:00') as ddiff2 ,user.image
FROM employee_copy
LEFT JOIN user
ON employee_copy.user_id = user.id
WHERE InOutDate ='".$_POST["lmName1"]."' and TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 <= 00 order by ddiff ASC LIMIT 14,6");
$conn->query('SET NAMES utf8');

$sth5->execute();

$sth6 = $conn->prepare("SELECT employee_copy.id, EmployeeName,EmpDeptName,Note, InOutDate, InTime ,TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 as ddiff ,timediff(InTime,'8:30:00') as ddiff2 ,user.image
FROM employee_copy
LEFT JOIN user
ON employee_copy.user_id = user.id
WHERE InOutDate ='".$_POST["lmName1"]."' and TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 <= 00 order by ddiff ASC LIMIT 20,6");
$conn->query('SET NAMES utf8');

$sth6->execute();


?>
      <!-- <select>
      <?php 
// เช็ควัน    
            $i=0;
            while($row7 = $sth7->fetch(PDO::FETCH_ASSOC)) {
               $i++;
             ?>
                <?php echo $row7['InOutDate'];?>
            <?php
 }  
   $sum += $i;

  ?>
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option>
</select> -->
     
  </h1>

  </tr>
  <?php 
// เช็ควัน    
            $i=0;
            while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
               $i++;
             ?>
                <td style="background-color:#ff1a1a; "><img class="blink-image" src="uploads/<?php echo $row['image']; ?>" width="100" height="100">
                <?php echo $row['InTime'];?></td> 
            <?php
 }  
   $sum += $i;

  ?>
  <tr>

  <?php 
// เช็ควัน    
            $i=0;
            while($row1 = $sth1->fetch(PDO::FETCH_ASSOC)) {
               $i++;
             ?>
                <td style="background-color:#556B2F;"> <img class="circle" src="uploads/<?php echo $row1['image']; ?>" width="100" height="100">
                <?php echo $row1['InTime'];?></td> 
            <?php
 }  
   $sum += $i;

  ?>
  </tr>
  
  <tr>
  <?php 
// เช็ควัน    
            $i=0;
            while($row2 = $sth2->fetch(PDO::FETCH_ASSOC)) {
               $i++;
             ?>
                <td style="background-color:#F0F8FF;"><img class="circle" src="uploads/<?php echo $row2['image']; ?>" width="100" height="100">
                <?php echo $row2['InTime'];?></td> 
            <?php
 }  
   $sum += $i;

  ?>
    
    
  </tr>
  <tr>
  <?php 
// เช็ควัน    
            $i=0;
            while($row3 = $sth3->fetch(PDO::FETCH_ASSOC)) {
               $i++;
             ?>
                <td style="background-color:#F0F8FF;"> <img class="circle" src="uploads/<?php echo $row3['image']; ?>" width="100" height="100">
                <?php echo $row3['InTime'];?></td> 
            <?php
 }  
   $sum += $i;

  ?>
       
  </tr>
  <tr>
  <?php 
// เช็ควัน    
            $i=0;
            while($row5 = $sth5->fetch(PDO::FETCH_ASSOC)) {
               $i++;
             ?>
                <td style="background-color:#F0F8FF;"> <img class="circle" src="uploads/<?php echo $row5['image']; ?>" width="100" height="100">
                <?php echo $row5['InTime'];?></td> 
            <?php
 }  
   $sum += $i;

  ?>
  </tr>
  <tr>
  <?php 
// เช็ควัน    
            $i=0;
            while($row6 = $sth6->fetch(PDO::FETCH_ASSOC)) {
               $i++;
             ?>
                <td style="background-color:#F0F8FF;"><img class="circle" src="uploads/<?php echo $row6['image']; ?>" width="100" height="100">
                <?php echo $row6['InTime'];?></td> 
            <?php
 }  
   $sum += $i;

  ?>
  </tr>


  <tr>
  <?php 
// เช็ควัน    
            $i=0;
            while($row4 = $sth4->fetch(PDO::FETCH_ASSOC)) {
               $i++;
             ?>
                <td style="background-color:#ffff00; "> <img class="circle" src="uploads/<?php echo $row4['image']; ?>" width="100" height="100">
                </td> 
            <?php
 }  
   $sum += $i;

  ?>
    
  </tr>
  <tr>
  <?php 
// เช็ควัน    
            $i=0;
            while($row8 = $sth8->fetch(PDO::FETCH_ASSOC)) {
               $i++;
             ?>
                <td style="background-color:#ffff00; "> <img class="circle" src="uploads/<?php echo $row8['image']; ?>" width="100" height="100">
                </td> 
            <?php
 }  
   $sum += $i;

  ?>
    
  </tr>
  <!-- <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Königlich Essen</td>
    <td>Philip Cramer</td>
    <td>Germany</td>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>North/South</td>
    <td>Simon Crowther</td>
    <td>UK</td>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Paris spécialités</td>
    <td>Marie Bertrand</td>
    <td>France</td>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr> -->
</table>

</body>
</html>
