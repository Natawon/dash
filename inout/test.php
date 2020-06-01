<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>timestamp</title>
</head>
<body>
    <?php
    $timestamp = 1554114720;
    $datetimeFormat = 'Y-m-d H:i:s';
    
    $date = new \DateTime();
    // If you must have use time zones
    // $date = new \DateTime('now', new \DateTimeZone('Europe/Helsinki'));
    $date->setTimestamp($timestamp);
    echo $date->format($datetimeFormat)."<br>";




    $date = '2019-04-01 10:32:00';
 
//Convert it into a Unix timestamp using strtotime.
$timestamp2= strtotime($date);
 
//Print it out.
echo $timestamp2;



    ?>
</body>
</html>