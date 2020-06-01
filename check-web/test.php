<?php
session_start();
// Do Something
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check</title>
</head>
<body>
    <?php
   $var_value = $_SESSION['varname'];

   $link = 'https://abhai-donate.cpa.go.th/login.php';
   $text='<style color:red;> Domain ที่ใกล้หมดอายุ</style>';
   $line_api = 'https://notify-api.line.me/api/notify';
   $access_token = 'uYV9ZFgWYr9KT4iJCGJ7oyQgcviTipN5ygoPPpGSu3j';
   
   
   #$str = date("Y-m-d H:i:s", strtotime ("+7 hour"))."\n"."มี"." ".$i." "."Domain ที่ใกล้หมดอายุ"."\n".substr($data, 0, -1);    //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร   //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
   if($var_value == null){
    $str = " Monitor is up: ".$var_value;    

   } else{
    $str = " Monitor is DOWN: ".$var_value;    

   }
   $image_thumbnail_url = '';  // ขนาดสูงสุด 240×240px JPEG
   $image_fullsize_url = '';  // ขนาดสูงสุด 1024×1024px JPEG
   $sticker_package_id = 1;  // Package ID ของสติกเกอร์
   $sticker_id = 1;    // ID ของสติกเกอร์
   
   $message_data = array(
    'message' => $str,
    'imageThumbnail' => $image_thumbnail_url,
    'imageFullsize' => $image_fullsize_url,
    'stickerPackageId' => $sticker_package_id,
    'stickerId' => $sticker_id
   );
   
   $result = send_notify_message($line_api, $access_token, $message_data);
   print_r($result);
   
   function send_notify_message($line_api, $access_token, $message_data)
   {
    $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$access_token );
   
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $line_api);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $message_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    // Check Error
    if(curl_error($ch))
    {
     $return_array = array( 'status' => '000: send fail', 'message' => curl_error($ch) );
    }
    else
    {
     $return_array = json_decode($result, true);
    }
    curl_close($ch);
    return $return_array;
   }
   
    ?>

</body>
</html>