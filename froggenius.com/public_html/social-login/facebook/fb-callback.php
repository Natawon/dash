<?php
    session_start();
    // require_once('config/php/config.php');
    require_once('config.php');
    require_once __DIR__ . '/bower_components/php-graph-sdk-5.x/src/Facebook/autoload.php';

    $connect_return = $_SESSION["connect_return"];
    $url_return = $_SESSION["url_return"];

    $fb = new Facebook\Facebook([
        'app_id' => constant('_FACEBOOK_APPID'),
        'app_secret' => constant('_FACEBOOK_APPSECRET'),
        'default_graph_version' => 'v5.0',
    ]);

    $helper = $fb->getRedirectLoginHelper();

    try {
        $accessToken = $helper->getAccessToken();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        // echo 'Graph returned an error: ' . $e->getMessage();
        // exit;
        header('Location: '.$connect_return);
        // if (isset($_SESSION['facebook_access_token'])) {
        //     header('Location: '.constant("_BASE_SITE_URL"));
        // } else {
        //     header('Location: '.constant("_BASE_SITE_URL"));
        // }

    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        // echo 'Facebook SDK returned an error: ' . $e->getMessage();
        // exit;
        header('Location: '.$connect_return);
        // if (isset($_SESSION['facebook_access_token'])) {
        //     header('Location: '.constant("_BASE_SITE_URL"));
        // } else {
        //     header('Location: '.constant("_BASE_SITE_URL"));
        // }

    }

    if (isset($accessToken)) {
        // Logged in!
        $_SESSION['facebook_access_token'] = (string) $accessToken;

        // Now you can redirect to another page and use the
        // access token from $_SESSION['facebook_access_token']

        $response = $fb->get('/me?fields=id,name,gender,email,link,picture', $accessToken);

        $user = $response->getGraphUser();

        $_SESSION['social_status'] = "success";
        $_SESSION['facebook_status'] = "success";
        $_SESSION['facebook_id'] = $user['id'];
        $_SESSION['facebook_name'] = $user['name'];
        $_SESSION['facebook_email'] = $user['email'];
        $_SESSION['facebook_link'] = $user['link'];

        $facebook_id = $_SESSION['facebook_id'];
        $facebook_name = $_SESSION['facebook_name'];
        $facebook_email = $_SESSION['facebook_email'];
        $name = explode(" ", $facebook_name);
        $first_name = $name[0];
        $last_name = $name[1];
        $error_action = false;

        $fbData = array(
            'facebook_id' => $facebook_id,
            'email' => $facebook_email,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'picture_url' => $user['picture']['url'],
            'connect_return' => $connect_return
        );
    } else {
        // header('Location: '.$connect_return);
        // if ($connect_return) {
        // } else {
     //     header('Location: '.constant("_BASE_SITE_URL"));
        // }
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Verify</title>
    <link rel="stylesheet" href="bower_components/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/fontawesome-free-5.11.2-web/css/all.css">
    <style>
        html, body {
            height: 100%;
        }

        @media (min-width: 768px) {
            /* body {
                background: url('http://dev.froggenius.com/data-file/assets/bg-login-register-2.jpg');
                background-size: 100%;
                background-repeat: no-repeat;
                background-attachment: fixed;
            } */
        }

        .fa-spin-1 {
            -webkit-animation: fa-spin 1s infinite linear;
            animation: fa-spin 1s infinite linear;
        }
    </style>
</head>
<body>
    <div class="d-flex align-items-center justify-content-center h-100">
        <div id="response-connect" class="text-center">
            <h1>
                Facebook connecting...
            </h1>
        </div>
    </div>

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/popper.js/dist/popper.min.js"></script>
    <script src="bower_components/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>

    <!-- <script src="config/js/config.js" type="text/javascript"></script> -->
    <!-- <script src="config/js/setting.js" type="text/javascript"></script> -->
    <!-- <script src="js/global.js" type="text/javascript"></script> -->
    <script type="text/javascript">
        var connect_return = '<?=$connect_return?>';
        var url_return = '<?=$url_return?>';
        var fbData = <?=json_encode($fbData)?>;
        function facebookLogin(postData) {
            var form = document.createElement("form");
            var element1 = document.createElement("input");
            var element2 = document.createElement("input");
            var element3 = document.createElement("input");
            var element4 = document.createElement("input");
            var element5 = document.createElement("input");
            var element6 = document.createElement("input");
            var element7 = document.createElement("input");

            form.method = "POST";
            form.action = connect_return;

            element1.value = postData.facebook_id;
            element1.name = "facebook_id";
            form.appendChild(element1);

            element2.value = postData.email;
            element2.name = "email";
            form.appendChild(element2);

            element3.value = postData.first_name;
            element3.name = "first_name";
            form.appendChild(element3);

            element4.value = postData.last_name;
            element4.name = "last_name";
            form.appendChild(element4);

            element5.value = 'facebook';
            element5.name = "connected_type";
            form.appendChild(element5);

            element6.value = connect_return;
            element6.name = "connect_return";
            form.appendChild(element6);

            element7.value = url_return;
            element7.name = "url_return";
            form.appendChild(element7);

            document.body.appendChild(form);

            form.submit();
            // console.log(postData);
            return false;
            // $promiseData = $.post(URL_API + '/site/user/facebook_login', postData);
            // $promiseData.done(function(data) {
            //     if (data.is_error == false) {
            //         $('#response-connect').html('<h1 class="text-success mb-3"><i class="fas fa-check-circle mr-1"></i> Welcome, ' + postData.first_name + ' ' + postData.last_name + '</h1><h3>Please wait...</h3>');
            //         setTimeout(function() {
            //             if (connect_return) {
            //              window.location.href = connect_return;
            //          } else {
            //              window.location.href = '/';
            //          }
            //         }, 3000);
            //     } else if (data.is_error == true) {
            //         $('#response-connect').html('<h1 class="text-danger"><i class="fas fa-exclamation-circle mr-1"></i> Connection Failed</h1><br><div class="text-center"><button class="btn btn-primary px-3">กลับ</button></div>');
            //         // fns.handleAlert(_noty.facebook_connect_error, _txt.try_again, 'warning', true, configuration_data);
            //     }
            // });


            // $.post(URL_API + '/site/facebook/checkExistsMember', postData, function(data) {
            //     if (data.exists) {
            //         setTimeout(function() {
            //             window.location = '<?=constant("_BASE_SITE_URL")?>';
            //         }, 700);
            //     } else {
            //         $('#response-connect').html('<h1 class="mb-3">First Time Connection</h1><h3>Redirecting to register...</h3>');
            //         setTimeout(function() {
            //             var queryString = '?register=1&facebook_id=' + postData.facebook_id + '&facebook_email=' + postData.facebook_email + '&first_name=' + postData.first_name + '&last_name=' + postData.last_name;
            //             window.location = '<?=constant("_BASE_SITE_URL")?>' + queryString;
            //         }, 700);
            //     }
            // }).fail(function() {
            //     $('#response-connect').html('<h1 class="text-danger"><i class="fas fa-exclamation-circle mr-1"></i> Connection Failed</h1><br><h6>Please contact: <a class="text-dark" href="mailto:support@liveloom.com">support@liveloom.com</a></h6>');
            // });
            // return true;
        }

        setTimeout(function() {
            facebookLogin(fbData);
            // var postData = {
            //     first_name: 'Honn',
            //     last_name: 'Tanakrit',
            // }
            // $('#response-connect').html('<h1 class="text-success mb-3"><i class="fas fa-check-circle mr-1"></i> Welcome, ' + postData.first_name + ' ' + postData.last_name + '</h1><h3>Please wait...</h3>');
        }, 2000);
    </script>
</body>
</html>
