
<div class="d-none" style="display:none;">
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

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
    $mail->addAddress('salesfg@frogdigital.co', 'FrogGenius Team');  
    
    $mail->CharSet = "utf-8";

    $mail->isHTML(true);                                  
    $mail->Subject = 'คุณ '.$_POST['name'].' สนใจในบริการของ FrogGenius.';
    $mail->Body    = '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta charset="utf-8"> <!-- utf-8 works for most cases -->
                <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn\'t be necessary -->
                <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
                <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
                <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

                <!-- Web Font / @font-face : BEGIN -->
                <!-- NOTE: If web fonts are not required, lines 9 - 26 can be safely removed. -->

                <!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
                <!--[if mso]>
                    <style>
                        * {
                            font-family: sans-serif !important;
                        }
                    </style>
                <![endif]-->

                <!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
                <!--[if !mso]><!-->
                    <!-- insert web font reference, eg: <link href=\'https://fonts.googleapis.com/css?family=Roboto:400,700\' rel=\'stylesheet\' type=\'text/css\'> -->
                <!--<![endif]-->

                <!-- Web Font / @font-face : END -->

                <!-- CSS Reset -->
                <style>

                    /* What it does: Remove spaces around the email design added by some email clients. */
                    /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
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

                    /* What it does: Centers email on Android 4.4 */
                    div[style*="margin: 16px 0"] {
                        margin:0 !important;
                    }

                    /* What it does: Stops Outlook from adding extra spacing to tables. */
                    table,
                    td {
                        mso-table-lspace: 0pt !important;
                        mso-table-rspace: 0pt !important;
                    }

                    /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
                    table {
                        border-spacing: 0 !important;
                        border-collapse: collapse !important;
                        table-layout: fixed !important;
                        margin: 0 auto !important;
                    }
                    table table table {
                        table-layout: auto;
                    }

                    /* What it does: Uses a better rendering method when resizing images in IE. */
                    img {
                        -ms-interpolation-mode:bicubic;
                    }

                    /* What it does: A work-around for iOS meddling in triggered links. */
                    .mobile-link--footer a,
                    a[x-apple-data-detectors] {
                        color:inherit !important;
                        text-decoration: underline !important;
                    }

                    /* What it does: Prevents underlining the button text in Windows 10 */
                    .button-link {
                        text-decoration: none !important;
                    }

                </style>

                <!-- Progressive Enhancements -->
                <style>

                    /* What it does: Hover styles for buttons */
                    .button-td,
                    .button-a {
                        transition: all 100ms ease-in;
                    }
                    .button-td:hover,
                    .button-a:hover {
                        background: #222222 !important;
                        border-color: #222222 !important;
                    }

                    /* Start Customize */
                    a {
                      color: #0066B3;
                      text-decoration: none;
                    }
                    a:hover {
                      color: #004883;
                    }
                    .link-website {
                      margin-left: 62px;
                    }
                    /* End Customize */

                    /* Media Queries */
                    @media screen and (max-width: 480px) {

                        /* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
                        .fluid {
                            width: 100% !important;
                            max-width: 100% !important;
                            height: auto !important;
                            margin-left: auto !important;
                            margin-right: auto !important;
                        }

                        /* What it does: Forces table cells into full-width rows. */
                        .stack-column,
                        .stack-column-center {
                            display: block !important;
                            width: 100% !important;
                            max-width: 100% !important;
                            direction: ltr !important;
                        }
                        /* And center justify these ones. */
                        .stack-column-center {
                            text-align: center !important;
                        }

                        /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
                        .center-on-narrow {
                            text-align: center !important;
                            display: block !important;
                            margin-left: auto !important;
                            margin-right: auto !important;
                            float: none !important;
                        }
                        table.center-on-narrow {
                            display: inline-block !important;
                        }

                    }

                </style>

            </head>
            <body width="100%" bgcolor="#222222" style="margin: 0;">
                <center style="width: 100%; background: #F6F6F6;">

                    <!-- Visually Hidden Preheader Text : BEGIN -->
                    <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">
                    เนื่องจากมีผู้ที่สนใจ FrogGenius Platform ผ่านระบบ Request หน้าเว็บไซต์ froggenius.com รายละเอียดและไฟล์แนบมาดังนี้
                    </div>
                    <!-- Visually Hidden Preheader Text : END -->

                    <!--
                        Set the email width. Defined in two places:
                        1. max-width for all clients except Desktop Windows Outlook, allowing the email to squish on narrow but never go wider than 680px.
                        2. MSO tags for Desktop Windows Outlook enforce a 680px width.
                        Note: The Fluid and Responsive templates have a different width (600px). The hybrid grid is more "fragile", and I\'ve found that 680px is a good width. Change with caution.
                    -->
                    <div style="max-width: 680px; margin: auto;">
                        <!--[if mso]>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="680" align="center">
                        <tr>
                        <td>
                        <![endif]-->

                        <!-- Email Header : BEGIN -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 680px;">
                            <tr>
                                <td style="padding: 20px 0; text-align: center">
                                    <!-- <img src="http://placehold.it/200x50" width="200" height="50" alt="alt_text" border="0" style="height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #222222;"> -->
                                </td>
                            </tr>
                        </table>
                        <!-- Email Header : END -->

                        <!-- Email Body : BEGIN -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 680px;">

                            <!-- 2 Even Columns : BEGIN -->
                            <tr>
                                <td bgcolor="#ffffff" align="center" height="100%" valign="top" width="100%">
                                    <!--[if mso]>
                                    <table role="presentation" border="0" cellspacing="0" cellpadding="0" align="center" width="660">
                                    <tr>
                                    <td align="center" valign="top" width="660">
                                    <![endif]-->
                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="max-width:660px;">
                                        <tr>
                                            <td style="padding: 40px 10px; text-align: center; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #222222;">
                                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="max-width:660px;">
                                                  <tr>
                                                    <td align="left" style="padding: 10px 0 0;">
                                                        <a href="http://froggenius.com/">
                                                          <img src="http://froggenius.com/assets/img/all/FrogGenius_logo_website.png" alt="Froggenius" width="135" />
                                                        </a>
                                                    </td>
                                                    <td align="right" style="padding: 10px 0 0;">
                                                        <strong style="color:#111111; font-size: 16px;">FROGGENIUS REQUEST</strong>
                                                    </td>
                                                  </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0 10px 10px 10px; text-align: left; font-family: sans-serif; font-size: 14px; mso-height-rule: exactly; line-height: 20px; color: #222222;">
                                                <strong style="color:#111111;">ถึง ฝ่ายขาย</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px; text-align: left; font-family: sans-serif; font-size: 14px; mso-height-rule: exactly; line-height: 20px; color: #222222;">
                                                <p style="text-indent: 30px; margin: 0;">
                                                   มีผู้สนใจบริการ FrogGenius LMS ติดต่อเข้ามา ซึ่งมีรายละเอียด ดังนี้
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 20px 10px; text-align: left; font-family: sans-serif; font-size: 14px; mso-height-rule: exactly; line-height: 20px; color: #222222;">
                                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="max-width:660px;">
                                                  <tr>
                                                    <th style="width: 30%; padding: 10px 0 0;">ชื่อ-นามสกุลผู้ติดต่อ</th>
                                                    <td style="width: 70%; padding: 10px 0 0;">'.$_POST['name'].'</td>
                                                  </tr>
                                                  <tr>
                                                    <th style="width: 30%; padding: 10px 0 0;">อีเมล์</th>
                                                    <td style="width: 70%; padding: 10px 0 0;">'.$_POST['email'].'</td>
                                                  </tr>
                                                  <tr>
                                                    <th style="width: 30%; padding: 10px 0 0;">เบอร์ติดต่อ</th>
                                                    <td style="width: 70%; padding: 10px 0 0;">'.$_POST['tel'].'</td>
                                                  </tr>
                                                  <tr>
                                                    <th style="width: 30%; padding: 10px 0 0;" valign="top">URL เว็บไซด์ของลูกค้าหรือบริษัท</th>
                                                    <td style="width: 70%; padding: 10px 0 0;">'.$_POST['company'].'</td>
                                                  </tr>
                                                  <tr>
                                                    <th style="width: 30%; padding: 10px 0 0;" valign="top">รายละเอียดอื่นๆ</th>
                                                    <td style="width: 70%; padding: 10px 0 0;">'.$_POST['remark'].'</td>
                                                  </tr>
                                                  <tr>
                                                    <th style="width: 30%; padding: 10px 0 0;"></th>
                                                    <td style="width: 70%; padding: 10px 0 0;"></td>
                                                  </tr>
                                                  <tr>
                                                    <th style="width: 30%; padding: 10px 0 0;">วันเวลาที่ติดต่อ</th>
                                                    <td style="width: 70%; padding: 10px 0 0;">'.date("d/m/").(date("Y")+543).date(" H:i").'</td>
                                                  </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 50px 10px 10px 10px; text-align: center; font-family: sans-serif; font-size: 12px; mso-height-rule: exactly; line-height: 20px; color: #222222;">
                                                <hr>
                                                <strong style="color: #909090; font-size: 12px;">( อีเมลฉบับนี้ส่งจากโปรแกรมอัตโนมัติบนเว็บไซต์บริษัท )</strong>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--[if mso]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                            <!-- 2 Even Columns : END -->

                            <!-- 3 Even Columns : BEGIN -->

                            <!-- 3 Even Columns : END -->

                            <!-- Thumbnail Left, Text Right : BEGIN -->

                            <!-- Thumbnail Left, Text Right : END -->

                            <!-- Thumbnail Right, Text Left : BEGIN -->

                            <!-- Thumbnail Right, Text Left : END -->

                        </table>
                        <!-- Email Body : END -->

                        <!-- Email Footer : BEGIN -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 680px;">
                            <tr>
                                <td style="padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; mso-height-rule: exactly; line-height:18px; text-align: center; color: #888888;">
                                    <!-- <webversion style="color:#cccccc; text-decoration:underline; font-weight: bold;">View as a Web Page</webversion>
                                    <br><br> -->
                                    Powered by FrogGenius.com<!-- <br><span class="mobile-link--footer">123 Fake Street, SpringField, OR, 97477 US</span><br><span class="mobile-link--footer">(123) 456-7890</span>
                                    <br><br>
                                    <unsubscribe style="color:#888888; text-decoration:underline;">unsubscribe</unsubscribe> -->
                                </td>
                            </tr>
                        </table>
                        <!-- Email Footer : END -->

                        <!--[if mso]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->
                    </div>
                </center>
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