<?php
    
$conn  = new PDO("mysql:host=monitor2.open-cdn.com;dbname=employee", "root", "dootvazws3e");   
$sth = $conn->prepare("SELECT EmployeeName,InTime,CONCAT(InOutDate,' ',Intime) as time,TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 as ddif FROM employee_copy where InOutDate = '29/01/2563' and InTime != '-'");
$conn->query('SET NAMES utf8');
$sth->execute();

while($row = $sth->fetch(PDO::FETCH_ASSOC))
{
  $test = $row["time"];
  $test2 = $row["EmployeeName"];
  echo $test2,"<br>";
  
}
   
?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChartJs</title>
 
  </head>
  
  <body>
      
 
    <canvas id="myChart" width="400" height="200"></canvas>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
    <script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        //type: 'bar',
        type: 'line',
        // type: 'pie',
        data: {
            labels: <?=$test2;?>,
            datasets: [{
                label: 'Report',
                data: <?=$test;?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
             responsive: true,
             title: {
                display: true,
                text: 'test'
            }
        }
    });
    </script>
        
  </body>
</html>