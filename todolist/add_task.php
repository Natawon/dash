<?php

//add_task.php

include('database_connection.php');

if($_POST["task_name"])
{
 $data = array(
  ':user_id'  => $_SESSION['user_id'],
  ':task_details' => trim($_POST["task_name"]),
  ':task_status' => 'no'
 );

 $query = "
 INSERT INTO task_list 
 (user_id, task_details, task_status) 
 VALUES (:user_id, :task_details, :task_status)
 ";

 $statement = $connect->prepare($query);

 if($statement->execute($data))
 {
  $task_list_id = $connect->lastInsertId();

  echo '<a href="#" class="list-group-item" id="list-group-item-'.$task_list_id.'" data-id="'.$task_list_id.'">'.$_POST["task_name"].' <span class="badge" data-id="'.$task_list_id.'">X</span></a>';
 }
}


?>
<?php
$link = 'https://abhai-donate.cpa.go.th/login.php';
$text='<style color:red;> Domain ที่ใกล้หมดอายุ</style>';
$line_api = 'https://notify-api.line.me/api/notify';
$access_token = 'IdJf3fa4EFY3yYo87CuxaANiFtscniQWKwTqGp4P24U';


$str = $_POST["task_name"];    //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร   //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
    
$image_thumbnail_url = '';  // ขนาดสูงสุด 240×240px JPEG
$image_fullsize_url = '';  // ขนาดสูงสุด 1024×1024px JPEG
$sticker_package_id = 1;  // Package ID ของสติกเกอร์
$sticker_id = 410;    // ID ของสติกเกอร์

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
//  if(curl_error($ch))
//  {
//   $return_array = array( 'status' => '000: send fail', 'message' => curl_error($ch) );
//  }
//  else
//  {
//   $return_array = json_decode($result, true);
//  }
//  curl_close($ch);
 return $return_array;
}

?>