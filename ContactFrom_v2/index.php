<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->



</head>
<body>

	<div class="bg-contact2" style="background-image: url('images/FDG_logo.jpg');">
		<div class="container-contact2">
			<div class="wrap-contact2">
				<form action="" method="post" class="contact2-form validate-form">
					<span class="contact2-form-title">
						Domain
					</span>
					<div class="wrap-input2 validate-input" data-validate="Name is required" >
						<input class="input2" type="text" name="name" required>
						<span class="focus-input2" data-placeholder="NAME"></span>
					</div>

					<div class="wrap-input2 validate-input" data-validate = "date">
						<!-- <class="input2" type="text" > --><br>
						<p></p><input class="input2" type="text" id="datepicker" name="datepicker" required></p>
						<span class="focus-input2" data-placeholder="Expiration"></span>
					</div>

					<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							<input type="submit" value="submit" name="submit"/><br />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php
	if(isset($_POST["submit"])){
	$hostname='localhost';
	$username='admin';
	$password='1234';
	
	try {
	$dbh = new PDO("mysql:host=$hostname;dbname=tests",$username,$password);
	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
	$dbh->exec('SET NAMES utf8');

	$sql = "INSERT INTO stock (name, date_expire)
	VALUES ('".$_POST["name"]."','".$_POST["datepicker"]."')";
	if ($dbh->query($sql)) {
	echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
	}
	else{
	echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
	}
	
	$dbh = null;
	}
	catch(PDOException $e)
	{
	echo $e->getMessage();
	}
	
	}
	?>


<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
	$( function() {
	  $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
	} );
	</script>



	<!-- Global site tag (gtag.js) - Google Analytics -->
	<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script> -->
	
</body>
</html>
