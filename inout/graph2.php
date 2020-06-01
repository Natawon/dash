<?php 
  
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="css/page1.css">
  <title>chart</title>
</head>
<body>
<!-- <h1> DOOTV MEDIA KDC (4Mbps 6 Month)</h1>
<ul>
  <li>Colocation 1/2Rack @ KDC</li>
  <li>Extra Gigabit port 7 ports </li>
  <li>Internet 100/45M @ DOOTV Office fa </li>
</ul>





<h3>Service Included</h3> 
<ul>
  <li>- 8 Real Public IP</li>
  <li>- Cisco router along contract due </li>
  <li>- Electric 16AMP </li>
  <li>- Ethernet Port 10/100/1000 </li>
  <li>- MRTG online monitoring </li>
  <li>- NOC & Call center Support 24/7 </li>
  <li>- Smart hand 3 times free of charge / month</li>
</ul> -->



<span class="glyphicon glyphicon-alert"></span>




  <canvas id="myChart"></canvas>
  <canvas id="myChart2"></canvas>


  <pre id="content">
    
  </pre>

  <script>

       $.get({
        url : 'connect2.php'
       }).done(function(data){
          // console.log(data)

          let EmployeeName = []
          let time = []


         for (let i = 0 ;i <data.length;i++){
            EmployeeName.push( data[i][0])
            time.push(data[i][1])

         }

         console.log(EmployeeName,time);

         var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
        labels: EmployeeName,
        datasets: [{
            label: "report",
            backgroundColor: 'rgba(0, 77, 65,0.5)',
            borderColor: 'rgb(0, 77, 64)',
            data: time,
        }]
    },

    // Configuration options go here
    options: {}
});

       })
  </script>
</body>
</html>