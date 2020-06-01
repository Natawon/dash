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
    function isSiteAvailible($url){
        // Check, if a valid url is provided
        if(!filter_var($url, FILTER_VALIDATE_URL)){
            return false;
        }
    
        // Initialize cURL
        $curlInit = curl_init($url);
        
        // Set options
        curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
        curl_setopt($curlInit,CURLOPT_HEADER,true);
        curl_setopt($curlInit,CURLOPT_NOBODY,true);
        curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);
    
        // Get response
        $response = curl_exec($curlInit);
        
        // Close a cURL session
        curl_close($curlInit);
    
        return $response?true:false;
    }
    ?>
<?php

$URL = 'http://live.kaokonlakao.com';

if(isSiteAvailible($URL)){
    echo 'The website is available.';      
}else{
   echo 'Woops, the site is not found.'; 
}

?>
</body>
</html>