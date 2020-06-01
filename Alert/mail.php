<?PHP
session_start();

/* Easy PHP Send mail by mean (http://oldirh.com)
# Create : 22/06/2009
*/
// print_r($_POST['verifycode']);
print_r($_SESSION['total']);
// $_SESSION(['verifycode'];

if($_POST['action']){
 if($_POST['verifycode'] !=$_POST['verifycode'] ){
    echo " Verify Code ไม่ถูกต้อง โปรดใสใหม่อีกครั้ง<br>";
    
 }else{
     $headers  = "MIME-Version: 1.0
";
     $headers .= "Content-type: text/html; charset=tis-620
";
     $headers .= "From:  ".$_POST['name']." <".$_POST['email'].">
";

     $msgs .= " จากคุณ  ".$_POST['name'].'<br>';
     $msgs .= " โทร  ".$_POST['tel'].'<br>';
     $msgs .= "ข้อความ<br>".$_POST['msg'];


     $mailto = "nathaworn.pa.dootvmedia@gmail.com"; # อีเมล์ผู้รับ
     if(mail($mailto, $_POST['subj'], $msgs, $headers)){
     echo "ส่งสำเร็จ";
     }else{
     echo "ผิดพลาด";
     }
     exit();
 }
  }
?>
