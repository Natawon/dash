<?php
 
$banner = '
<pre>
======================================================
-----------PHP CURL GOOGLE LOGIN SCRIPT---------------
---Author : KHOIRUL ANAM a.k.a Synchronizer (Hydra)---
------------Thanks to Stupidc0de Family---------------
------------http://facebook.com/iniannam--------------
------------http://dwnsource.blogspot.com-------------
-----------------http://pwnzid.ga---------------------
======================================================
</pre>
';
 
function google_by_hydra() {
if(isset($_POST['email'])) {
   
$email = $_POST['email'];
$password = $_POST['password'];
 
$target_url = "https://accounts.google.com/ServiceLoginAuth";
 
$bypass1 = 'Page=PasswordSeparationSignIn';
$bypass2 = '&GALX=mGDB7K9zbrA&gxf=AFoagUVjztZYkqkyLadakYj-n3oGPW8YmQ%3A1460264072096';
$bypass3 = '&continue=https%3A%2F%2Faccounts.google.com%2FManageAccount&hl=in&sacu=1';
$bypass4 = '&ProfileInformation=APMTquly2nV_-lYbiwsH-IZCsEluHsN8mKOerhd4JfCotzZXjBPK-Gu0_bkKJtD60myjTUreu2R9ld98EP-TFeprczUrJW-MnH5UGlhzfOOBZxE66aXKERZ1dwWLNFIATYessFcegQsyRH9Ttz1GzyGP8EV8HlwvFDC4hwYHD42Dfsm-ar41uLhiuV_r0Dl6bzm12-MOjGzM5FF_Nrd2_qHClSpYSgNDcKGYy4naax1YUfLB80RLAjs';
$bypass5 = '&_utf8=%E2%98%83&bgresponse=%21ycpCvOTG8hwJumpEI7L-wHjbWvICAAAAMFIAAAAFCgAQZ9adjZ-80DMYgLxjH9cEb5kBE2cOlVeuSenauWpCANr2Wb3emPpG0tMw5w7BWfup_N1UumBSl2H5egWKR3amE8DXZ4kS-glcadjhhF1jWGeiOKhLu8QwZ0N2jITcCCL8tAQ-rsjvDID2gmLJuyRn73q-oYkSzBSmQ1Cd66TawMVzR7B_4aFgktD0APbYbLHeJGDhAoyNBPE4ObUVtkHZYyaWmJG5iMMukWzpi-wz-P0W9JTpIZ-tYLSMwXX7qHUStmFQHdBmkTkuJDractXsJzVFRJPfsERE_l9GYr3yR-MLrBPGddPoplqaW-vpRQKRkDYYa8xui63CUICUM_XFEWXPDns_nMT95Z4lXkpyyePqHHKzXQJpInL7h9Treji1_vkFaFTx';
$bypass6 = '&pstMsg=1';
$bypass7 = '&dnConn=';
$bypass8 = '&checkConnection=youtube%3A10327%3A1&checkedDomains=youtube';
$bypass9 = '&identifiertoken=';
$bypass10 = '&identifiertoken_audio=';
$bypass11 = '&identifier-captcha-input=';
$bypass12 = '&Email='.urlencode($email).'&Passwd='.$password;
$bypass13 = '&rmShown=1';
 
$bypassCSRFGoogle = $bypass1.$bypass2.$bypass3.$bypass4.$bypass5.$bypass6.$bypass7;
$SesionSIGN = $bypass8.$bypass9.$bypass10.$bypass11.$bypass12.$bypass13;
$data = $bypassCSRFGoogle.$SesionSIGN;
 
$curl_opt_hydra = curl_init();
curl_setopt ($curl_opt_hydra, CURLOPT_URL, $target_url);
curl_setopt ($curl_opt_hydra, CURLOPT_TIMEOUT, 60);
curl_setopt($curl_opt_hydra, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_opt_hydra, CURLOPT_POST, 1);
curl_setopt($curl_opt_hydra, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl_opt_hydra, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl_opt_hydra, CURLOPT_POSTFIELDS, $data);
 
$headers  = array();
$headers[] =  'User-Agent: Mozilla/5.0 (Windows NT 6.3; rv:45.0) Gecko/20100101 Firefox/45.0';
$headers[] =  'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
$headers[] =  'Accept-Language: en-US,en;q=0.5';
$headers[] =  'Accept-Encoding: gzip, deflate, br';
$headers[] =  'Referer: https://accounts.google.com/ServiceLogin?sacu=1&continue=https%3A%2F%2Faccounts.google.com%2FManageAccount&hl=in';
$headers[] =  'Cookie: NID=78=RYSeIinNsJOS3DXgTIGvVISGotCFw5TZwbQIVmWvjlf0AAF8oMBIYoUIphKJ_wXYkEjD4WtS2cMsQ3xYHG8vb1PZ70IPx7NKXGkCzut7NDiMNQLxH7PPXXFxkNl7A-AUhiVakA_ebQ9Jic4ITDy0eVqda3GewNiEbKGFGAvkq_kEsnHwS2bmXWVCzjbbMjo; OGP=-5061451:-5061821:; OGPC=5061821-4:; GAPS=1:0B2GlwnEqWTiL-2iMZHHo7saYOcfpw:USMASGMV8sKvQie4; ACCOUNT_CHOOSER=AFx_qI6n2cQW4BV16ODLWN6HLey92lqkIlZj8Ttm2g8h_tEFHJzrQB1WzN-qIHwqEye2UFXaxWNV0QFUSLfQSYMg2uureOEN2HqgxM-SV3Uh9z-SPQ6Npac; GMAIL_RTT=2030; GALX=mGDB7K9zbrA; GoogleAccountsLocale_session=in; RMME=false';
$headers[] =  'Connection: keep-alive';
$headers[] =  'Content-Type: application/x-www-form-urlencoded';
 
 
curl_setopt ($curl_opt_hydra, CURLOPT_HTTPHEADER, $headers);
curl_setopt ($curl_opt_hydra, CURLOPT_HEADER, 1);
 
$result = curl_exec($curl_opt_hydra);
curl_close($curl_opt_hydra);
if(preg_match('#302 Moved#', $result)) {
echo "<h3 style='color:green;'><b>LOGIN SUCCESS !</b></h3>";
 
}else {
    echo "<h3 style='color:red;'><b>LOGIN FAILED !</b></h3>";
   
}
}
}
 
?>
<style>
.hydra-ganteng {
    border:1px solid green;
    border-radius:2px;
    width:300;
    padding:5px;
}
.hydra-kece {
    background:white;
    color:green;
    width:300;
    border:2px solid green;
    padding:7px;
    border-radius:2px;
}
</style>
 
<title>GOOGLE TRUE LOGIN [ DEMO ]</title>
<link rel="shortcut icon" href="https://ssl.gstatic.com/ui/v1/icons/mail/images/favicon5.ico" type="image/x-icon">
<br><Br>
<center>
<h2 style="background:green;padding:7px;width:550px;"><font color=white><b>GOOGLE TRUE LOGIN [ <font color=silver>DEMO </font>]</b></font></h2><br>
<form method="post" action="">
<input class="hydra-ganteng" type="text" name="email" placeholder="isiemailmu@goblok.com" required><br><Br>
<input class="hydra-ganteng" type="password" placeholder="isipasswordmuasu" name="password" required><p><br>
<input class="hydra-kece" type="submit" name="submit" value="LOGIN">
</form>
<?php echo google_by_hydra();?>
<br><Br><br>
 
<h4 style='color:green;'><b>CREATED BY : <font color=red>TULIS NAMA LU DISINI NJENG!</font></b></h4>