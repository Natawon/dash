<html>
<head>
<title> PHP & CSV To MySQL</title>
</head>
<body>
<?php
move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV

$objConnect = mysql_connect("localhost","admin","1234") or die("Error Connect to Database"); // Conect to MySQL
$objDB = mysql_select_db("customer");

$objCSV = fopen($_FILES["fileCSV"]["name"], "r");
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
	$strSQL = "INSERT INTO customer ";
	$strSQL .="(id,topic,source,project_name) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$objArr[0]."','".$objArr[1]."','".$objArr[2]."' ";
	$strSQL .=",'".$objArr[3]."') ";
	$objQuery = mysql_query($strSQL);
}
fclose($objCSV);

echo "Upload & Import Done.";
?>
</table>
</body>
</html>