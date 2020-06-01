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


// $res = shell_exec("ls");
// echo "<pre>$res</pre>";
//  $result = shell_exec('sudo /Users/natawonputtarasundorm/Downloads/bash_file/test.sh');
 
//  echo $result;
// $output = shell_exec('RET=`docker pull hello-world`;echo $RET');
// echo $output;
// echo "Done";

$output = shell_exec('./test.sh 2>&1');
echo "<pre>$output</pre>";// system ("source /Users/natawonputtarasundorm/Downloads/bash_file/test.sh");
// echo shell_exec('sh /Users/natawonputtarasundorm/Downloads/bash_file/test.sh');
//  $result = shell_exec('sudo /Users/natawonputtarasundorm/Downloads/bash_file/test.sh');
 
//  echo $result;


// $contents = file_get_contents('sh /Users/natawonputtarasundorm/Downloads/bash_file/test.sh');
// echo shell_exec($contents);
?>


<!-- This link will add ?run=true to your URL, myfilename.php?run=true -->
<!-- <a href="?run=true">Click Me!</a> -->

</body>
</html>