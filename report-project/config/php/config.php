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
    define("_BASE_SERVICE_URL" , "http://chulatutor.froggenius.com/api");
    define("_BASE_DIR_URL"     , constant("_BASE_SITE_URL")."/data-file");
    define("_PROJECT_TITLE"    , "FROG Digital Group");
    define("_DEFAULT_GROUP"    , "G_Education");
    define("_GOOGLE_ANALYTICS" , '<!-- Global site tag (gtag.js) - Google Analytics -->
                                    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151037439-2"></script>
                                    <script>
                                    window.dataLayer = window.dataLayer || [];
                                    function gtag(){dataLayer.push(arguments);}
                                    gtag("js", new Date());
                                    
                                    gtag("config", "UA-151037439-2");
                                    </script>');
?>