<?php
require_once("mysqlFunction.php");

$https = !empty($_SERVER['HTTPS']) && strcasecmp($_SERVER['HTTPS'], 'on') === 0 ||
         !empty($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
         strcasecmp($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') === 0;

$full_host_url = ($https ? 'https://' : 'http://').
          (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'].
          ($https && $_SERVER['SERVER_PORT'] === 443 ||
          $_SERVER['SERVER_PORT'] === 80 ? '' : ':'.$_SERVER['SERVER_PORT'])));


/* DEFINE CONSTANTS FOR SITE */
define("_BASE_SITE_URL", $full_host_url);

// For service laravel
$BASE_SERVICE_URL = constant("_BASE_SITE_URL")."/api";

// For data file
define("_BASE_DATA_FILE_DIR_URL", constant("_BASE_SITE_URL")."/data-file");
define("_BASE_DIR_LOGO", constant("_BASE_DATA_FILE_DIR_URL")."/configuration/logo/");
define("_BASE_DIR_EVENT_BANNER", constant("_BASE_DATA_FILE_DIR_URL")."/configuration/event_banner/");
define("_BASE_DIR_FILE_PRESENT", constant("_BASE_DATA_FILE_DIR_URL")."/configuration/file_present/");
define("_BASE_DIR_EVENT_BANNERS_PICTURE", constant("_BASE_DATA_FILE_DIR_URL")."/event_banners/picture/");
define("_BASE_DIR_PRESENTATIONS_FILE", constant("_BASE_DATA_FILE_DIR_URL")."/presentations/file/");

function configuration(){
    global $BASE_SERVICE_URL;
    $service = file_get_contents($BASE_SERVICE_URL."/configuration");
    $json = json_decode($service, true);
    return $json;
}

function news($news_groups_id = ''){
    global $BASE_SERVICE_URL;
    $service = file_get_contents($BASE_SERVICE_URL."/news/all?news_groups_id=".$news_groups_id);
    $json = json_decode($service, true);
    return $json;
}

function newsid($id){
    global $BASE_SERVICE_URL;
    $service = file_get_contents($BASE_SERVICE_URL."/news/".$id);
    $json = json_decode($service, true);
    return $json;
}

function newsmain(){
    global $BASE_SERVICE_URL;
    $service = file_get_contents($BASE_SERVICE_URL."/news/showmain");
    $json = json_decode($service, true);
    return $json;
}

function news_groups(){
    global $BASE_SERVICE_URL;
    $service = file_get_contents($BASE_SERVICE_URL."/news_groups/all");
    $json = json_decode($service, true);
    return $json;
}

function news_groups_id($id){
    global $BASE_SERVICE_URL;
    $service = file_get_contents($BASE_SERVICE_URL."/news_groups/".$id);
    $json = json_decode($service, true);
    return $json;
}

function randomshow(){
    global $BASE_SERVICE_URL;
    $service = file_get_contents($BASE_SERVICE_URL."/news/randomshow");
    $json = json_decode($service, true);
    return $json;
}

function event_banners_today(){
    global $BASE_SERVICE_URL;
    $service = file_get_contents($BASE_SERVICE_URL."/site/event_banners/today");
    $json = json_decode($service, true);
    return $json;
}

function list_presentations(){
    global $BASE_SERVICE_URL;
    $service = file_get_contents($BASE_SERVICE_URL."/site/presentations");
    $json = json_decode($service, true);
    return $json;
}

?>