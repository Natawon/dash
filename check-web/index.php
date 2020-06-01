<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>check</title>
</head>
<body>
<?php
$conn  = new PDO("mysql:host=localhost;dbname=tests", "admin", "1234");   
$sth = $conn->prepare("SELECT * FROM stock2 ");
$sth->execute();
// $host = 'live.kaokonlakao.com';
// if($socket =@ fsockopen($host, 80, $errno, $errstr, 30)) {
// echo 'online!';
// fclose($socket);
// } else {
// echo 'offline.';
// }


// function checkOnline($domain) {
//     $curlInit = curl_init($domain);
//     curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
//     curl_setopt($curlInit,CURLOPT_HEADER,true);
//     curl_setopt($curlInit,CURLOPT_NOBODY,true);
//     curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);
 
//     //get answer
//     $response = curl_exec($curlInit);
 
//     curl_close($curlInit);
//     if ($response) return true;
//     return false;
//  }
//  if(checkOnline('live.kaokonlakao.com')) { echo "live.kaokonlakao Online"; }


/**
 * PHP/cURL function to check a web site status. If HTTP status is not 200 or 302, or
 * the requests takes longer than 10 seconds, the website is unreachable.
 * 
 * Follow me on Twitter: @HertogJanR
 * Send your donation through https://www.paypal.me/jreilink. Thanks!
 *
 * @param string $url URL that must be checked
 */
function url_test( $url ) {
  $timeout = 10;
  $ch = curl_init();
  curl_setopt ( $ch, CURLOPT_URL, $url );
  curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
  curl_setopt ( $ch, CURLOPT_TIMEOUT, $timeout );
  $http_respond = curl_exec($ch);
  $http_respond = trim( strip_tags( $http_respond ) );
  $http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
  if ( ( $http_code == "200" ) || ( $http_code == "302" ) ) {
    return true;
  } else {
     return $http_code;
    return false;
  }
  curl_close( $ch );
}
$i=0;
$j=0;

while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        echo "<br>";

        $website = $row['name'];

        
        if( url_test( $website ) ) {
            echo $website ." is down!";
            $j++;

          }
          else { 
              
            
            echo $website ." is online."; 
            $i++;

        }
          


    
    }
    echo "<br>". "มี online อยู่"." ".$i."โดเมน";
    echo "<br>". "มี offline อยู่"." ".$j."โดเมน";




// if( !url_test( $website ) ) {
//   echo $website ." is down!";
// }
// else { echo $website ." is online."; }

?>
</body>
</html>