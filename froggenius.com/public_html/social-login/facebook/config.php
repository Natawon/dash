<?php
    session_start();
    $https = !empty($_SERVER['HTTPS']) && strcasecmp($_SERVER['HTTPS'], 'on') === 0 ||
             !empty($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
             strcasecmp($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') === 0;

    $full_host_url = ($https ? 'https://' : 'http://').
              (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'].
              ($https && $_SERVER['SERVER_PORT'] === 443 ||
              $_SERVER['SERVER_PORT'] === 80 ? '' : ':'.$_SERVER['SERVER_PORT'])));


    /* DEFINE CONSTANTS FOR SITE */
    define("_BASE_SITE_URL"    , $full_host_url);
    define("_FACEBOOK_APPID"    , "158672598886973");
    define("_FACEBOOK_APPSECRET"    , "6b2997e9c7fdc34c90dabb579d22d158");
?>