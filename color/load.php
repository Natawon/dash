<?php
    $json = file_get_contents('http://api.ipstack.com/check?access_key=e81aa4d18908d4d43fe8b777daa1cb75&format=1');
	
    $data2 = json_decode($json);
    // $test = $data2->ip;
    // print_r($test); 
    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );  

    $response = file_get_contents("https://api.ipgeolocation.io/timezone?apiKey=7a602d33f19c4eadbe2b9f962bd9fa4c&ip=$test", false, stream_context_create($arrContextOptions));
    $data = json_decode($response);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <!-- <meta http-equiv="refresh" content="10" >  -->
	<!-- <link rel="stylesheet" href="css/less.css"> -->
    <title>geo</title>
    <style>
        div.a{
            text-align: center;
            font-size:40px;
        }
        div.b{
            text-align: center;
            font-size:40px;
            
        }
        div.c{
            text-align: center;
            font-size:40px;
            color:white;
            
        }
    </style>
</head>
<body>	
<div class="container">
    <div class="a"> 				
                  <?php echo $data->time_24;?> 
    </div>	
</div>
</body>
</html>