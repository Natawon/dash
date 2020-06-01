<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

<?php 
    $bytes = disk_free_space("/Users/natawonputtarasundorm/Downloads/API"); 
    $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    $base = 1024;
    $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
    echo $bytes . '<br />';
    echo sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class] . '<br />';
?>
</body>
</html>