<?php 

   $json = file_get_contents('http://10.153.251.192:3000/api/posts');
	
	$json = json_decode($json);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>pahe2</title>
	<link rel="stylesheet" href="css/less2.css">
</head>
<body>
	<div class="main">
	<div class="container">

	<?php 
	foreach ($json as $var) {
		?>

		<div class="card">
			<?php if ($var->img!=null):?>
			<div class="pic">
				<img src="<?php echo $var->img; ?>">
			</div>
			<?php endif ?>
			
			<div class="head">
				<div class="p"><?php echo $var->postname; ?> </div>
			</div>
		
		<div class="crop">
			<?php 
		foreach ($var->tag as $tag) {
		?>
				
		 <div class="tag"><?php echo $tag; ?> </div>
			
		<?php } ?>
			</div>

		<?php foreach ($var->desc as $des ) {
		?>
			<div class="des">
				<div class="span"><?php echo $des ?> </div>
			
			<?php } ?>
			</div>
			
		<?php foreach ($var->img_url as $img ) {
		?>
			<div class="des">
				<img src="<?php echo $img; ?>">
			
			<?php } ?>
			</div>
		
	</div>

	
	
	
	<div class="comment">
		<?php 
		foreach ($var->comments as $key =>$value) {
		?>
		<div class="list">
			<div class="a">ความคิดเห็นที่ <?php echo $key; ?>
			</div>

			<div class="b">
			<?php echo $value->desc; ?></div>
			<div class="b">
			<?php echo $value->time_create; ?></div>
			<div class="b">
			<?php echo $value->owner->name; ?></div>

		</div>
		<?php } ?>	
		<div class="item">
		</div>
	</div>
		
	<?php } ?>

</div>	

<div class="main">
	
	<textarea name="" id=""  ></textarea>
	
	<div class="send">
		<div class="pu">
			<button>ส่งข้อความ</button> 
		</div>
	</div>
</div>

</body>
</html>