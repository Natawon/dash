<?php
	require_once('config/php/setting.php');
	$conn  = new PDO("mysql:host=monitor2.open-cdn.com;dbname=employee", "root", "dootvazws3e");

	$sth7 = $conn->prepare("SELECT DISTINCT InOutDate
	FROM employee_copy
	order by InOutDate desc ");
	$conn->query('SET NAMES utf8');

	$sth7->execute();

	$yearTH = date('Y')+543;
	$today = date('d/m/').$yearTH;

	$lmName1 = $today;

	if (isset($_POST['lmName1'])) {
		$lmName1 = $_POST['lmName1'];
	}

	// สาย
	$late_data = $conn->prepare("SELECT employee_copy.id, EmployeeName,EmpDeptName,Note, InOutDate, InTime ,TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 as ddiff ,timediff(InTime,'8:30:00') as ddiff2 ,user.image
	FROM employee_copy
	LEFT JOIN user
	ON employee_copy.user_id = user.id
	WHERE InOutDate ='".$lmName1."' and TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 > 1 order by ddiff DESC LIMIT 0,6");
	$conn->query('SET NAMES utf8');
	$late_data->execute();

    $fast_data = $conn->prepare("SELECT employee_copy.id, EmployeeName,EmpDeptName,Note, InOutDate, InTime ,TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 as ddiff ,timediff(InTime,'8:30:00') as ddiff2 ,user.image
	FROM employee_copy
	LEFT JOIN user
	ON employee_copy.user_id = user.id
	WHERE InOutDate ='".$lmName1."' and TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 <= 00 order by ddiff ASC LIMIT 0,3");
	$conn->query('SET NAMES utf8');
	$fast_data->execute();

	$normal_data = $conn->prepare("SELECT employee_copy.id, EmployeeName,EmpDeptName,Note, InOutDate, InTime ,TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 as ddiff ,timediff(InTime,'8:30:00') as ddiff2 ,user.image
	FROM employee_copy
	LEFT JOIN user
	ON employee_copy.user_id = user.id
	WHERE InOutDate ='".$lmName1."' and TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 <= 00 order by ddiff ASC LIMIT 3,100");
	$conn->query('SET NAMES utf8');

	$normal_data->execute();

	$leave_data = $conn->prepare("SELECT employee_copy.id, EmployeeName,EmpDeptName,Note, InOutDate, InTime ,TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 as ddiff ,timediff(InTime,'8:30:00') as ddiff2 ,user.image
	FROM employee_copy
	LEFT JOIN user
	ON employee_copy.user_id = user.id
	WHERE InOutDate ='".$lmName1."' and InTime = '-' order by ddiff ASC");
	$conn->query('SET NAMES utf8');

	$leave_data->execute();

	$count_data = 0;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="refresh" content="1800">
	<script type="text/javascript" src="config/js/datetime.js"></script>

	<title><?=_ATTENDANCE_SCHEDULE?> - FROG Digital Group</title>
	<?php include 'include/inc.css.php'; ?><style>
#myDIV {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: white;
  margin-top: 20px;
}
</style>
</head>
<body>
<button onclick="myFunction()">Try it</button>

<section id="attendance-schedule-section" class="d-flex flex-column h-100 w-100">
		<div class="container-fluid py-3 px-3 px-lg-4">
			<div class="row">
				<div class="col-12 mx-auto mb-4">
					<div class="form-row align-items-center">
						<h5 class="col-6 mb-0 font-weight-bold d-md-none">
							<?=_ATTENDANCE_SCHEDULE?>
						</h5>
						<h4 class="col-md-3 col-xl-2 mb-0 font-weight-bold d-none d-md-block">
							<?=_ATTENDANCE_SCHEDULE?>
						</h4>
						<div class="col-6 col-md-4 col-xl-3">
							<form action="#" method="post" name="form1" >
								<select name="lmName1" class="form-control" id="" onchange="document.form1.submit()";>
									<option value="">-- Select Date --</option>
									<?php while($row7 = $sth7->fetch(PDO::FETCH_ASSOC)) { ?>
									<option value="<?php echo $row7['InOutDate'];?>" <?=$row7['InOutDate'] == $lmName1 ? 'selected' : '' ?>><?php echo $row7['InOutDate'];?></option>
									<?php } ?>
								</select>
							</form>
						</div>
						<!-- <span><div id="div_refresh" ></span> -->
						<div class="d-flex bd-highlight">

						</div>

						<div class="col d-flex align-items-center justify-content-center justify-content-sm-start justify-content-md-end mt-3 mt-md-0">
						<span id="date_time" class="mr-2"></span>
							<span class="attendance-items rounded-sm bg-danger mr-2"></span> <span class="mr-3">มาสาย</span>
							<span class="attendance-items rounded-sm bg-success mr-2"></span> <span class="mr-3">มาเช้า</span>
							<span class="attendance-items rounded-sm bg-leave mr-2"></span> <span>ลา/อื่นๆ</span>

						</div>
						<!-- <div class="col-12 col-sm-4 col-md-12 col-xl-2 mt-3 mt-md-0 text-center text-md-right">
							<i class="far fa-calendar-alt text-muted mr-1 mr-md-2"></i> <?=date('d/m/Y H:i:s')?>
						</div> -->
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 mx-auto">

					<div class="row">
                    <div id="myDIV">

					<?php while($rs = $late_data->fetch(PDO::FETCH_ASSOC)) { $count_data++; ?>
						<div class="col-sm-6 col-lg-4 col-xl-3 col-xxl-2">
							<div class="card border-0 mb-3 shadow-sm">
							  	<div class="row no-gutters">
							    	<div class="col-5 col-sm-4 col-md-4">
							    		<div class="embed-responsive embed-responsive-1by1">
									  		<img src="uploads/<?=$rs['image'];?>" class="rounded-left embed-responsive-item" alt="...">
										</div>
							    	</div>
							    	<div class="col-7 col-sm-8 col-md-8">
							      		<div class="card-body py-2 px-3 py-md-3 h-100 bg-danger text-white rounded-right">
							        		<h5 class="card-title"><?=$rs['InTime']?></h5>
						    				<p class="card-text f-14"><?=$rs['EmployeeName']?></p>
							      		</div>
							    	</div>
							  	</div>
							</div>
						</div>
                    <?php } ?>
                </div>
        			
				</div>
			</div>
		</div>
	</section>
	<?php include 'include/inc.js.php'; ?>


<!-- <div id="myDIV">
This is my DIV element.
</div> -->


<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

</body>
</html>


