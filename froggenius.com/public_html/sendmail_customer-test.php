
<div class="d-none" style="display:none;">
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$base = "services/";
include($base."mainservices.php");
$configuration = configuration();
$presentations = list_presentations();

$mail = new PHPMailer(true);
if(isset($_POST['send'])){                           
try {
    //Server settings
    $mail->SMTPDebug = 0;                       
    $mail->isSMTP();                                      
    // $mail->Host = 'smtp-mail.outlook.com';  
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                               
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;                                    

    $mail->Username = 'info@frogdigital.co';
    $mail->Password = 'vrthefrog@TH@';

    $mail->setFrom('info@frogdigital.co', 'froggenius.com');
    $mail->addAddress($_POST['email'], $_POST['name']);  
    
    $mail->CharSet = "utf-8";

    $mail->isHTML(true);                                  
    $mail->Subject = 'ขอบคุณที่สนใจในบริการของ FrogGenius. - '.time();
    $mail->Body    = '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8"> <!-- utf-8 works for most cases -->
        <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn\'t be necessary -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
        <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
        <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->
        <style>
            html,
            body {
                margin: 0 auto !important;
                padding: 0 !important;
                height: 100% !important;
                width: 100% !important;
            }
            /* What it does: Stops email clients resizing small text. */
            * {
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
            }
        </style>
    </head>
    <body width="100%" style="margin: 0;">
        <div>
        เรียน คุณ '.$_POST['name'].'
        </div>
        <br>
        <div>
        บริษัท ฟร็อกดิจิตอล กรุ๊ป จำกัด ขอเสนอระบบการเรียนออนไลน์ (Froggenius LMS) ที่มีครบทุกฟังก์ชั่น บนระบบ Cloud ที่มีมาตราฐานระดับโลกและมีทีมงานผู้เชี่ยวชาญคอยดูแลตลอดการใช้งาน
        นอกจากนี้บริษัทของเรายังมีบริการด้านการถ่ายทำ และเป็นผู้นำเข้าและผลิตอุปกรณ์ที่มีมาตรฐานสูง ทำให้เราสามารถตอบโจทย์ลูกค้าได้ทุกรูปแบบ
        </div><br>';

        if (!empty($presentations)) {
            $mail->Body .= '
            <div>ท่านสามารถดูรายละเอียดแนะนำผลิตภัณฑ์เพิ่มเติมได้ตามลิงค์ด้านล่างครับ</div>
            <div><ul>';
                foreach ($presentations as $presentation) {
                    if ($presentation['type'] == "link") {
                        $mail->Body .= '<li><a href="'.$presentation["link"].'">'.$presentation["title"].'</a></li>';
                    } else {
                        $mail->Body .= '<li><a href="'.constant("_BASE_DIR_PRESENTATIONS_FILE").$presentation["file"].'">'.$presentation["title"].'</a></li>';
                    }
                }

            $mail->Body .= '</ul></div><br>';
        }

        $mail->Body .= '
        <!-- <div>
        หรือเยี่ยมชมเว็บไซต์เราได้ที่ <a href="https://www.froggenius.com/">https://www.froggenius.com</a>
        </div><br> -->
        <div>
        ทางบริษัทมีความยินดีเป็นอย่างยิ่งที่จะเข้าไปนำเสนอพร้อมทีมงานผู้ดูแลระบบ หากสนใจโปรดติดต่อตามเบอร์โทรศัพท์ด้านล่างเพื่อนัดหมายได้เลยครับ
        </div>

        <table>
            <tr>
                <td style="padding: 10px; padding-left: 0px; text-align: left; font-family: sans-serif; font-size: 14px; mso-height-rule: exactly; line-height: 20px; color: #222222;">
                    <span>---------------</span><br><span>Best regards</span>
                </td>
            </tr>

            <tr>
                <br>
                <table cellpadding="0" cellspacing="0" style="border-spacing:0px;border-collapse:collapse;color:rgb(68,68,68);width:100%;font-size:11pt;font-family:Arial,sans-serif;">
                    <tbody>
                        <tr>
                            <td width="125" valign="top" rowspan="6" style="font-family:Arial,sans-serif;padding:0px 10px 0px 0px;font-size:10pt;border-right:1px solid rgb(22,57,133);width:125px;vertical-align:top">
                                <a href="http://frogdigital.co/" style="font-size:13.3333px;background-color:transparent;color:rgb(51,122,183)" target="_blank">
                                    <img border="0" alt="Logo" src="https://www.froggenius.com/assets/img/all/logoFrog_mail.gif" style="border:0px;vertical-align:middle; float: right;" width="96" height="96" class="CToWUd">
                                </a><br>
                            </td>
                            <td style="padding:0px 0px 0px 10px; float: left;">
                                <table cellpadding="0" cellspacing="0" style="border-spacing:0px;border-collapse:collapse;background-color:transparent">
                                    <tbody>
                                        <tr>
                                            <td valign="top" style="font-family:Arial,sans-serif;padding:0px 0px 5px 10px;font-size:10pt;color:rgb(0,121,172);width:400px;vertical-align:top">
                                                <span style="font-weight:700">
                                                    <span style="font-size:11pt;color:rgb(22,57,133)">Tienchai Lukkum</span>
                                                </span>&nbsp;
                                                <span style="font-weight:700;font-size:11pt;color:rgb(0,0,0)">| Sale Officer&nbsp;</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="font-family:Arial,sans-serif;padding:5px 0px 5px 10px;font-size:10pt;vertical-align:top;line-height:17px">
                                                <span style="color:rgb(22,57,133)"><span style="font-weight:700">Frog Digital Group Co.,Ltd.</span></span><br>
                                                <span style="color:rgb(22,57,133)"><span style="font-weight:700">e:</span></span>
                                                <span style="font-size:10pt;color:rgb(0,0,0)">&nbsp;<a href="mailto:tl@frogdigital.co" style="color:rgb(17,85,204)" target="_blank">tl@frogdigital.co </a></span>&nbsp;|&nbsp;
                                                <span style="color:rgb(22,57,133)"><span style="font-weight:700">w:</span></span>
                                                <span style="font-size:10pt;color:rgb(0,0,0)">&nbsp;<a href="https://www.frogdigital.co/" style="color:rgb(17,85,204)" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.frogdigital.co/&amp;source=gmail&amp;ust=1577172087853000&amp;usg=AFQjCNHLMm_lAxA8yAh2uvRUU3GS7hYHvw">frog<wbr>genius.com</a></span><br>
                                                <span style="color:rgb(22,57,133)"><span style="font-weight:700">m:</span></span>
                                                <span style="font-size:10pt;color:rgb(0,0,0)">&nbsp;<a href="tel:+66918563219">+66 91 856 3219</a>, <a href="tel:+66952048102">+66 95 204 8102</a></span>&nbsp;|&nbsp;
                                                <span style="color:rgb(22,57,133)"><span style="font-weight:700">p:</span></span>
                                                <span style="font-size:10pt;color:rgb(0,0,0)">&nbsp;<a href="tel:+6624128880">+66 2 412 8880</a></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
            </tr>
            <tr>
                <td style="padding: 50px 10px 10px 10px; text-align: center; font-family: sans-serif; font-size: 12px; mso-height-rule: exactly; line-height: 20px; color: #222222;">
                    <hr>
                    <strong style="color: #909090; font-size: 12px;">( อีเมลฉบับนี้ส่งจากโปรแกรมอัตโนมัติบนเว็บไซต์บริษัท )</strong>
                </td>
            </tr>
        </table>
    </body>
</html>';

    
    // echo 'Message has been sent';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }

} 
catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
}
?>
</div>