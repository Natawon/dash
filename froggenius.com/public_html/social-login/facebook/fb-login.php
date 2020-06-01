<?php
    session_start();
    require_once('config.php');
    require_once __DIR__ . '/bower_components/php-graph-sdk-5.x/src/Facebook/autoload.php';

    $connect_return = '';
    $url_return = '';
    if (isset($_GET['connect_return'])) {
        $connect_return = $_GET['connect_return'];
    }

    if (isset($_GET['url_return'])) {
        $url_return = $_GET['url_return'];
    }

    $_SESSION["connect_return"] = $connect_return;
    $_SESSION["url_return"] = $url_return;

    $fb = new Facebook\Facebook([
        'app_id' => constant('_FACEBOOK_APPID'),
        'app_secret' => constant('_FACEBOOK_APPSECRET'),
        'default_graph_version' => 'v5.0',
    ]);

    $helper = $fb->getRedirectLoginHelper();

    $permissions = ['email']; // Optional permissions
    $loginUrl = $helper->getLoginUrl(constant("_BASE_SITE_URL").'/social-login/facebook/fb-callback.php', $permissions);
    // $loginUrl = $helper->getLoginUrl('https://0981cf6c.ngrok.io/fb-callback.php', $permissions);

    // echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
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
        <div class="text-center">
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
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                window.location = '<?=$loginUrl?>';
            }, 1000);
        });
    </script>
</body>
</html>
