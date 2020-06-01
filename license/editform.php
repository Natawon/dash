<?php

	error_reporting( ~E_NOTICE );
	
$conn  = new PDO("mysql:host=localhost;dbname=tests", "admin", "1234");   

	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $conn->prepare('SELECT name, date_start, date_expire FROM domain WHERE id =:id');
		$stmt_edit->execute(array(':id'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		$name = $_POST['name'];// user name
		$date_start = $_POST['date_start'];// user email
		$date_expire = $_POST['date_expire'];// user emai
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $conn->prepare('UPDATE domain 
									     SET name=:name, 
										     date_start=:date_start, 
										     date_expire=:date_expire 
								       WHERE id=:id');
			$stmt->bindParam(':name',$name);
			$stmt->bindParam(':date_start',$date_start);
			$stmt->bindParam(':date_expire',$date_expire);
			$stmt->bindParam(':id',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='license.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd'});
            $("#datepicker").on("change", function () {
                var fromdate = $(this).val();
                alert(fromdate);
            });
  } );
  </script>
  <script>
  $( function() {
    $("#datepicker1").datepicker({ dateFormat: 'yy-mm-dd'});
            $("#datepicker1").on("change", function () {
                var fromdate = $(this).val();
                alert(fromdate);
            });
  } );
  </script>
  
<title>test</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="jquery-1.11.3-jquery.min.js"></script>
</head>
<body>

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
       
 
    </div>
</div>


<div class="container">


	<div class="page-header">
    	<h1 class="h2">Update Data. </h1>
    </div>

<div class="clearfix"></div>

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	
    
    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
   
    
	<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">name.</label></td>
        <td><input class="form-control" type="text" name="name" value="<?php echo $name; ?>" required /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">date_starts</label></td>
        <td><input class="form-control" type="text" name="date_start" id="datepicker" value="<?php echo $date_start; ?>" required /></td>
    </tr>
     <tr>
    	<td><label class="control-label">date_expire</label></td>
        <td><input class="form-control" type="text" name="date_expire" id="datepicker1" value="<?php echo $date_expire; ?>" required /></td>
    </tr>
   
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="license.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>




</div>
</body>
</html>