<?php

	error_reporting( ~E_NOTICE );
	
$conn  = new PDO("mysql:host=localhost;dbname=donate", "admin", "1234");   
  $conn->query('SET NAMES utf8');

	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $conn->prepare('SELECT * FROM
             donate 
            WHERE id=:id');
		$stmt_edit->execute(array(':id'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		// 
		echo "not found";
	}
	
	
	
	// if(isset($_POST['btn_save_updates']))
	// {
		// $id = ['id'];// user name
		
		$Status = 1;// user emai
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $conn->prepare('UPDATE donate 
									     
										 SET id=:id,
										     Status=:Status 

								       WHERE id=:id');
			$stmt->bindParam(':id',$id);
			
			$stmt->bindParam(':Status',$Status);
			


				
			if($stmt->execute()){
				?>
                <script>
				alert(' ยืนยันสำเร็จ ...');
				window.location.href='checked.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	// }
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
   
    
	<!-- <table class="table table-bordered table-responsive">
	
  
      <tr>
    	<td><label class="control-label">id</label></td>
        <td><input class="form-control" type="text" name="id" value="<?php echo $id; ?>" required /></td>
    </tr>

     
    <tr>
    	<td><label class="control-label">จำนวน</label></td>
        <td><input class="form-control" type="text" name="Status" value="<?php echo $Status; ?>" required /></td>
    </tr>
   
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="admin.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>
        
        </td>
    </tr>
    
    </table> -->
    
</form>




</div>
</body>
</html>