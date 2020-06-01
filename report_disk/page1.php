<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style type='text/css'>

.progress {
        border: 2px solid #5E96E4;
        height: 32px;
        width: 540px;
        margin: 30px auto;
}
.progress .prgbar {
        background: #A7C6FF;
        width: <?php echo $dp; ?>%;
        position: relative;
        height: 32px;
        z-index: 999;
}
.progress .prgtext {
        color: #286692;
        text-align: center;
        font-size: 13px;
        padding: 9px 0 0;
        width: 540px;
        position: absolute;
        z-index: 1000;
}
.progress .prginfo {
        margin: 3px 0;
}

</style>

</head>
<body>
<?php 

   $json = file_get_contents('http://68.183.225.86:9000/employees/v1');
	
	$data = json_decode($json);

    // print_r($data);
?>
<?php

/* get disk space free (in bytes) */
foreach($data as $var ){
   $df =  ;
}

/* and get disk space total (in bytes)  */
$dt = disk_total_space("/Users/natawonputtarasundorm/Downloads");
/* now we calculate the disk space used (in bytes) */
$du = $dt - $df;
/* percentage of disk used - this will be used to also set the width % of the progress bar */
$dp = sprintf('%.2f',($du / $dt) * 100);

/* and we formate the size from bytes to MB, GB, etc. */
$df = formatSize($df);
$du = formatSize($du);
$dt = formatSize($dt);

function formatSize( $bytes )
{
        $types = array( 'B', 'KB', 'MB', 'GB', 'TB' );
        for( $i = 0; $bytes >= 1024 && $i < ( count( $types ) -1 ); $bytes /= 1024, $i++ );
                return( round( $bytes, 2 ) . " " . $types[$i] );
}

?>
<div class='progress'>
        <div class='prgtext'><?php echo $dp; ?>% Disk Used</div>
        <div class='prgbar'></div>
        <div class='prginfo'>
                <span style='float: left;'><?php echo "$du of $dt used"; ?></span>
                <span style='float: right;'><?php echo "$df of $dt free"; ?></span>
                <span style='clear: both;'></span>
        </div>
</div>


</body>
</html>



