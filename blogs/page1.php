<?php 

   $json = file_get_contents('https://my-json-server.typicode.com/typicode/demo/db');
	
	$json = json_decode($json);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/less.css">
	<title>Blog_test</title>
</head>


<body>
	
<div class="container">

	<?php 
	foreach ($json as $var) {
		?>

		<div class="card">
			<?php if ($var->imgurl!=null):?>
			<div class="pic">
				<img src="<?php echo $var->imgurl[0]; ?>">
			</div>
			<?php endif ?>
		<div class="box">
			<div class="head">

				<div class="p"><a href="http://10.153.251.192:3000/api/post/"><?php echo $var->postname; ?> </a></div>
			</div>
			<div class="des">
				<div class="span"><?php echo $var->description[0]; ?> </div>
			</div>
			
		</div>
	</div>

	
	
	<?php } ?>
	<script>
		function page2(id){
			console.id
		}
	</script>


</div>	
</body>
</html>