<?php
    require_once('config.php');

    define("_PROJECT_VERSION"  , "1.0.0");
    define("_PAGE_404"         , constant("_BASE_SITE_URL")."/404");

    define("_BASE_DIR_AVATARS"           , constant("_BASE_DIR_URL")."/avatars/");
    define("_BASE_DIR_LOGO"              , constant("_BASE_DIR_URL")."/configuration/logo/");
    define("_BASE_DIR_HIGHLIGHTS"        , constant("_BASE_DIR_URL")."/highlights/");
    define("_BASE_DIR_COURSES_THUMBNAIL" , constant("_BASE_DIR_URL")."/courses/thumbnail/");
    define("_BASE_DIR_GROUPS_THUMBNAIL"  , constant("_BASE_DIR_URL")."/groups/thumbnail/");
    define("_BASE_DIR_CATEGORIES_ICON"   , constant("_BASE_DIR_URL")."/categories/icon/");
    define("_BASE_DIR_SLIDES"            , constant("_BASE_DIR_URL")."/slides/picture/");
    define("_BASE_DIR_FILE"              , constant("_BASE_DIR_URL")."/file/");
    define("_BASE_DIR_INSTRUCTORS_PDF"   , constant("_BASE_DIR_URL")."/instructors/pdf/");
    define("_BASE_DIR_MEMBERS_PICTURE"   , constant("_BASE_DIR_URL")."/members/picture/");
    define("_BASE_DIR_FAVICONS"          , constant("_BASE_DIR_URL")."/favicons/");
    define("_BASE_DIR_OG_IMAGE"          , constant("_BASE_DIR_URL")."/configuration/og_image/");
    define("_BASE_DIR_METHODS"          , constant("_BASE_DIR_URL")."/methods/picture/");
    define("_BASE_DIR_BANKS"          , constant("_BASE_DIR_URL")."/banks/picture/");
    define("_BASE_DIR_PAYMENTS"          , constant("_BASE_DIR_URL")."/payments/picture/");

    /* DEFINE CONSTANTS FOR GROUPS */
    define("_BASE_GROUPS", serialize([
        constant("_DEFAULT_GROUP") => [
            "isRedirect"   => false,
            "redirectPage" => null,
            "login"        => constant("_BASE_SITE_URL")."/".constant("_DEFAULT_GROUP")."/login",
            "forgot"       => constant("_BASE_SITE_URL")."/".constant("_DEFAULT_GROUP")."/forgot-password",
        ],
    ]));

    /* INCLUDE LIBRARY */
    require_once(dirname(__FILE__)."/../../lib/function.php");
    require_once(dirname(__FILE__)."/../../lib/class.function.php");
    require_once(dirname(__FILE__)."/../../lib/class.http-client-call.php");
    require_once(dirname(__FILE__)."/../../lib/class.underscore.php");

    $oFunc = new HelperFunctions();
    $oClient = new HttpClientCall();

    /* INCLUDE SERVICES */
    require_once(dirname(__FILE__)."/../../service/services.php");

    $scriptSite = "";
    // ============================================= //
    // =============== Check WebView =============== //
    // ============================================= //
    if (isset($_GET['site']) && strtolower($_GET['site']) == "webview") {
        // $oFunc->set_cookie('site', 'webview', 1);
        $ck_expire = time()+(1*60*60*24); // calculate to timestamp
        setcookie('site','webview',$ck_expire,'/');
        $scriptSite .= '<script type="text/javascript">';
        $scriptSite .= 'document.getElementsByTagName("body")[0].className += "_webview";';
        $scriptSite .= '</script>';
    } else if (isset($_COOKIE['site']) && $_COOKIE['site'] == "webview") {
        $scriptSite .= '<script type="text/javascript">';
        $scriptSite .= 'document.getElementsByTagName("body")[0].className += "_webview";';
        $scriptSite .= '</script>';
    } else {
        $scriptSite .= '<script type="text/javascript">';
        $scriptSite .= 'document.getElementsByTagName("body")[0].className += "_normal";';
        $scriptSite .= '</script>';
    }

    // Menu active
    $menu = '';
    if (!isset($sidebar_static_status)) {
        $sidebar_static_status = 1;
    }

    if (!isset($header_format)) {
        $header_format = 1;
    }

    $main_content_cls = 'ml-lg-auto col-lg-10';
    $sidebar_cls = 'wp-sidebar-toggle d-lg-block';
    $sidebar_btn_close_cls = 'd-lg-none';

    if ($sidebar_static_status == 0) {
        $main_content_cls = 'col-12';
        $sidebar_cls = 'wp-sidebar-toggle';
        $sidebar_btn_close_cls = '';
    }

    $groupKey = constant("_DEFAULT_GROUP");
    if (isset($_GET['group_key'])) {
        $groupKey = cleanGroupKey($_GET['group_key']);
    }

    // if($_GET["lang"] == 'th'){
    //     $_SESSION['lang'] = 'th';
    //     include('lang/language-th.php');
    //     $sublink = explode('/th', $_SERVER['REQUEST_URI'])[1];
    // } else {
    //     $_SESSION['lang'] = 'en';
    //     include('lang/language-en.php');
    //     $sublink = explode('/en', $_SERVER['REQUEST_URI'])[1];
    // }

    // if($_GET["lang"] == 'en'){
    //     $_SESSION['lang'] = 'en';
    //     include('lang/language-en.php');
    //     $sublink = explode('/en', $_SERVER['REQUEST_URI'])[1];
    //     $th = '';
    //     $en = 'adisabled';
    // } else {
    // }
    $_SESSION['lang'] = 'th';
    include('lang/th.php');
    $sublink = explode('/th', $_SERVER['REQUEST_URI'])[1];

    $th = 'adisabled';
    $en = '';

    $prefix_url = '/'.$_SESSION['lang'];

    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    $search = '';

    require_once(dirname(__FILE__).'/../../service/services-global.php');

?>