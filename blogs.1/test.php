<?php 
	header('Content-Type: application/json');

   $json = file_get_contents('http://10.153.251.192:3000/api/pantip/post');
	
	$json = json_decode($json);

	print_r($json);

	foreach ($json as $var) {
		echo $var->post_name;
	}

	foreach ($json as $k => $v){
		$json[$k]->post_name = 'Chnage Name';
	}

	print_r($json);
	
 ?>