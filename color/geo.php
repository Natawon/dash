<?php 

   $json = file_get_contents('http://api.ipstack.com/check?access_key=e81aa4d18908d4d43fe8b777daa1cb75&format=1');
	
    $data = json_decode($json);
    
    // print_r ($data->location->languages);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <link rel="stylesheet" href="css/less.css"> -->
    <title>geo</title>
    <style>
        div.a{
            text-align: center;
            font-size:40px;
        }
    </style>
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

           
           
            <div class="a"> <?php echo $data->country_name; ?> <?php echo $data->location->country_flag_emoji; ?>
            <?php echo $data->location->capital; ?>
            <?php foreach ($data->location->languages as $var) {
		?>
		<div class="head">
				<div class="p"><?php echo"languages : ". $var->native; ?> </div>
			</div>
			<?php } ?>
            
        </div>
        <script>
       console.log(new Date().toTimeString().slice(9));
console.log(Intl.DateTimeFormat().resolvedOptions().timeZone);
console.log(new Date().getTimezoneOffset() / -60);
        </script>
</div>	
</body>
</html>