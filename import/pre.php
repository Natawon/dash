<?php 

$json = file_get_contents("INET_2018-04_ptgoinet21v3.json");
// Convert to array 
// $data = json_decode($json, true);
    //  print_r($data);

    $data = json_decode($json, true);
     var_dump($data); // print array


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
            <th>Disk_usage</th>
          
		</tr>
		<?php foreach ($data as $key => $var): ?>

        <tr>
            <td> <?php echo $key->bandwidth; ?> </td>
          
        </tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>	
</body>
</html>