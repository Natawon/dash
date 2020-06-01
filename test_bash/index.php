<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test_bash</title>
</head>
<body>
    
<?php

//  $result = shell_exec('sudo /Users/natawonputtarasundorm/Downloads/bash_file/test.sh');
 
//  echo $result;
$output = shell_exec('RET=`docker pull hello-world`;echo $RET');
echo $output;
?>


<!-- This link will add ?run=true to your URL, myfilename.php?run=true -->
<!-- <a href="?run=true">Click Me!</a> -->

</body>
</html>