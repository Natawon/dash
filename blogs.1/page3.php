<?php 

   $json = file_get_contents('https://my-json-server.typicode.com/typicode/demo/db');
	
	$json = json_decode($json);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/less3.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>


	<title>test2</title>
</head>
<body>
	<header>
		<img src="https://static.pexels.com/photos/210186/pexels-photo-210186.jpeg" alt="">
	</header>

	<div class="main">
		
		<?php foreach ($json as $var) {
		?>
		<div class="head">
				<div class="p"><?php echo $var->posts; ?> </div>
			</div>
			<?php } ?>

		<div class="crop">
		<?php 
		foreach ($var->tag as $tag) {
		?>
				
		 <div class="tag"><?php echo $tag; ?> </div>
			
		<?php } ?>
		
		</div>
		<div class="descript">
			<?php 
		foreach ($var->description as $des) {
		?>
				
		 <div class="sus"><?php echo $des; ?> </div>
			
		<?php } ?>
		</div>
		<div class="pic">
			<?php 
		foreach ($var->imgurl as $img) {
		?>
				
				<img src="<?php echo $img; ?>">
			
		<?php } ?>
		</div>
	</div>
<!-- //////// count/////
 -->	<?php 
		foreach ($var->comments as $key =>$value)

		$i=$key;
		if ($i>=0) {
		 	$i++;
		 } 

		{
		?>
	<div class="operat">
		<?php  echo $i;?>

		<i class="far fa-comment-alt"></i>&nbsp;
		ความคิดเห็น 


		<?php } ?>

	</div>

<!-- 	comment
 -->
		<?php 
		foreach ($var->comments as $key =>$value) {
		?>
		<div class="list">
			<div class="a">ความคิดเห็นที่ <?php echo $key; ?>
			</div>

			<div class="b">
			<?php echo $value->description; ?></div>
			<div class="b">
			<?php echo $value->timecreate; ?></div>
			<div class="b">
			<?php echo $value->owner->name; ?></div>

			<div class="b">
			<img src="<?php echo $value->imgurl[0]; ?>" alt=""></div>

		</div>
		<?php } ?>	


	<div class="chat">
	

	<textarea name="" id=""  ></textarea>	
	<div class="send">
		<div class="pu">
			<button>ส่งข้อความ</button> 
		</div>
	</div>
</div>
</body>
</html>