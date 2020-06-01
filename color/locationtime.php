<?php
    $json = file_get_contents('http://api.ipstack.com/check?access_key=e81aa4d18908d4d43fe8b777daa1cb75&format=1');
	
    $data2 = json_decode($json);
     $test = $data2->ip;
     print_r($test); 
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
    <!-- <meta http-equiv="refresh" content="20" >  -->
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
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <!-- <script>
    $(document).ready(function(){
		 $("#div_refresh").load("load.php");
        setInterval(function() {
            $("#div_refresh").load("load.php");
        }, 200);
    });
 
</script> -->
</head>
<body>	
<div class="container">


            <!-- <td> <?php echo $data->country_name; ?> </td> -->
            <!-- <div class="a"> <?php if( $data->country_name == "Thailand"){
                       echo "<h1>สวัสดีไทยแลนด์</h1>"; 
            }elseif ($data->country_name == "United Kingdom"){
                       echo "<h1>Hi! United Kingdom </h1>"; 
            } 
            
            
            
            ?></div> -->

           
           
<div class="a"> 
          
		<div class="head">
				<!-- <div class="p"><?php echo"time : ". substr($data->time_24,0,2); ?> </div> -->
                <?php if(substr($data->time_24,0,2)>=6 || substr($data->time_24,0,2)>=12 ){

                   echo "<body style='background-color:white';>";
                   echo "<div id='div_refresh'></div>";
                   echo $data->time_24."<br>";
                   echo "<div id='show' align='center'></div>";

                   echo $data2->country_name ."".$data2->location->country_flag_emoji;
                   echo "</div>";


                }elseif(substr($data->time_24,0,2)>18 || substr($data->time_24,0,2)<=24 ){
                    echo "<div class='c'>";
                    echo "<body style='background-color:#262928';>";
                    echo "<div id='div_refresh'></div>";

                    echo $data->time_24."<br>";
                    echo $data2->country_name ."".$data2->location->country_flag_emoji;
                    echo "</div>";
                }else{
                    echo "<div class='c'>";
                    echo "<body style='background-color:#262928';>";
                    echo "<div id='div_refresh'></div>";
                    echo $data->time_24."<br>";
                    echo $data2->country_name ."".$data2->location->country_flag_emoji;
                    echo "</div>";

                }

                ?>
			</div>
            

        </div>
        
</div>	
</body>
</html>