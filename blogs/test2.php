<?php 

   $json = file_get_contents('http://68.183.225.86:9000/employees/v1');
	
	$data = json_decode($json);

    // print_r($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <link rel="stylesheet" href="css/less.css"> -->
	<title>Blog_test</title>
</head>


<body>
	
<div class="container">

<table>
	<tbody>
		<tr>
			<th>Name</th>
            <th>Disk_usage</th>
            <th>bandwidth_rx</th>
            <th>bandwidth_tx</th>
            <th>record_date</th>
            <th>record_time</th>


		</tr>
		<?php foreach ($data as $row) : ?>
        <tr>
            <td> <?php echo $row->project_name; ?> </td>
            <td> <?php echo $row->disk_usage; ?> </td>
            <td> <?php echo $row->bandwidth_rx; ?> </td>
            <td> <?php echo $row->bandwidth_tx; ?> </td>
            <td> <?php $newDate = date("d-m-Y", strtotime ( substr( ($row->record_date),0,10)));
                       echo $newDate;     
               ?> </td>
            <td> <?php  echo  substr( ($row->record_date),11,11); ?> </td>



        </tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>	
</body>
</html>