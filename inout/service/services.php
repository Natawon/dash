<?php
function milliseconds() {
    $mt = explode(' ', microtime());
    return ((int)$mt[1]) * 1000 + ((int)round($mt[0] * 1000));
}

function loadTest() {
    global $oFunc, $oClient;
    // $responseHttp = $oClient->curl(constant("_BASE_SITE_URL")."/load-test.php", "GET", $oFunc->getCookieString());
    $responseHttp = $oClient->curl(constant("_BASE_SITE_URL")."/load-test.php", "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function loadTestWithLaravel() {
    global $oFunc, $oClient;
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/load-test", "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function getcCsrfToken(){
    global $oFunc, $oClient;

    // $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/csrf/token", "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];

    // if (isset($responseData['csrf_token'])) {
    //     $oFunc->set_cookie('XSRF-TOKEN', $responseData['encrypted_csrf_token'], 1);
    // }

    return $responseData;
}

function configuration(){
    global $oFunc, $oClient;

    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/configuration", "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];

    return $responseData;
}

function highlights($groupsKey){
    global $oFunc, $oClient;

    // $oClient = new HttpClientCall();
    // echo "highlights start:".date("H:i:s")."<br>";
    // $st = milliseconds();
    // echo "highlights start: ".$st."<br>";
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/groups/".$groupsKey."/highlights?&order_by=order&order_direction=asc", "GET", $oFunc->getCookieString());
    // echo "highlights ended:".date("H:i:s")."<br>";
    // sleep(2);
    // $en = milliseconds();
    // echo "highlights ended: ".$en."<br>".($en - $st)." ms. <br><br>";
    $responseData = $responseHttp['body'];
    return $responseData;
}

function avatars_list(){
    global $oFunc;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/avatars_list?&order_by=order&order_direction=asc", "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function avatars($id){
    global $oFunc, $oClient;

    // $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/avatars/".$id, "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function categories($groupsKey){
    global $oFunc, $oClient;

    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/groups/".$groupsKey."/categories/?&order_by=order&order_direction=asc", "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function faqs($search_faqs){
    global $oFunc;

    $search_faqs = rawurlencode($search_faqs);

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/faqs/".$search_faqs."?&order_by=order&order_direction=asc", "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function courses_list($groupsKey, $options = []){
    global $oFunc, $oClient;

    $queryString = http_build_query($options);

    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/groups/".$groupsKey."/courses_list?".$queryString, "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function live_courses_list($groupsKey, $options = []){
    global $oFunc, $oClient;

    $queryString = http_build_query($options);

    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/groups/".$groupsKey."/live_courses_list?".$queryString, "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function courses_category_list($groupsKey, $options = []){
    global $oFunc, $oClient;

    $queryString = http_build_query($options);

    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/groups/".$groupsKey."/courses_category_list?".$queryString, "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function courses_list_index($groupsKey, $options = []){
    global $oFunc, $oClient;

    $queryString = http_build_query($options);

    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/groups/".$groupsKey."/courses_list_index?".$queryString, "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function live_courses_list_index($groupsKey, $options = []){
    global $oFunc, $oClient;

    $queryString = http_build_query($options);

    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/groups/".$groupsKey."/live_courses_list_index?".$queryString, "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function search_courses($groupsKey, $keyword, $options = []){
    global $oFunc, $oClient;

    $keyword = rawurlencode($keyword);
    $queryString = http_build_query($options);

    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/groups/".$groupsKey."/courses/search/".$keyword."?".$queryString, "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function filter_course($groupsKey, $options = []){
    global $oFunc, $oClient;

    $queryString = http_build_query($options);

    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/groups/".$groupsKey."/courses/filter?".$queryString, "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function categories2courses($id, $groupsKey, $options = []){
    global $oFunc;

    $queryString = http_build_query($options);

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/groups/".$groupsKey."/categories/".$id."/courses?".$queryString, "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function courses($id, $groupsKey){
    global $oFunc;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/groups/".$groupsKey."/courses/".$id, "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function courses_recommended($groupsKey){
    global $oFunc;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/groups/".$groupsKey."/courses_recommended?&order_by=order&order_direction=asc", "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function session(){
    global $oFunc, $oClient;
    // echo date("Y-m-d H:i:s u")."<br>";
    // $oClient = new HttpClientCall();
    // echo "session start:".date("H:i:s")."<br>";
    // $st = milliseconds();
    // echo "session start: ".$st."<br>";
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/user/session", "GET", $oFunc->getCookieString());
    // echo "session ended:".date("H:i:s")."<br>";
    // sleep(2);
    // $en = milliseconds();
    // echo "session ended: ".$en."<br>".($en - $st)." ms. <br><br>";
    // echo date("Y-m-d H:i:s u");
    // echo "<pre>";
    // print_r($responseHttp);
    // echo "</pre>";
    $responseData = $responseHttp['body'];
    if (isset($responseData['data'])) {
        return $responseData['data'];
    } else {
        return null;
    }
    // $json = json_decode($responseData, true);
}

function session_require($action = 'HOME', $id = null){
    global $oFunc, $groupKey;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/user/session", "GET", $oFunc->getCookieString());

    // echo "<pre>";
    // print_r($responseHttp);
    // echo "</pre>";
    // exit();
    $responseData = $responseHttp['body'];
    // $json = json_decode($responseData, true);
    if (!isset($responseData['data'])) {
        if (isset($oFunc->constArr("_BASE_GROUPS")[$groupKey])) {
            $redirectTo = $oFunc->constArr("_BASE_GROUPS")[$groupKey]['login'];
            $isRedirect = $oFunc->constArr("_BASE_GROUPS")[$groupKey]['isRedirect'];
            $redirectPage = $oFunc->constArr("_BASE_GROUPS")[$groupKey]['redirectPage'];
        } else {
            header("Location : ".constant("_PAGE_404"));
            exit();
        }

        if ($isRedirect && $redirectPage != null) {
            switch (strtoupper($action)) {
                case 'HOME':
                    $redirectTo .= '?redirectPage='.urlencode($redirectPage."?action=home");
                    break;
                case 'INFO':
                    $redirectTo .= '?redirectPage='.urlencode($redirectPage."?courseid=".$id."&action=info");
                    break;
                case 'LEARNING':
                    $redirectTo .= '?redirectPage='.urlencode($redirectPage."?courseid=".$id."&action=learning");
                    break;

                default:
                    $redirectTo .= '?redirectPage='.urlencode($redirectPage."?action=home");
                    break;
            }
        }

        header("location: ".$redirectTo);
        exit();
    } else {
        return $responseData['data'];
    }
}

function instructor_session_require(){
    global $oFunc, $groupKey;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/instructors/session", "GET", $oFunc->getCookieString());

    $responseData = $responseHttp['body'];
    if (empty($responseData['data'])) {
        return null;
    } else {
        return $responseData['data'];
    }
}

function temp_session_require($action = 'HOME', $id = null){
    global $oFunc, $groupKey;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/set/user/temp/session", "GET", $oFunc->getCookieString());

    $responseData = $responseHttp['body'];
    if (empty($responseData['data'])) {
        if (isset($oFunc->constArr("_BASE_GROUPS")[$groupKey])) {
            $redirectTo = $oFunc->constArr("_BASE_GROUPS")[$groupKey]['login'];
            $isRedirect = $oFunc->constArr("_BASE_GROUPS")[$groupKey]['isRedirect'];
            $redirectPage = $oFunc->constArr("_BASE_GROUPS")[$groupKey]['redirectPage'];
        } else {
            header("Location : ".constant("_PAGE_404"));
            exit();
        }

        if ($isRedirect && $redirectPage != null) {
            switch (strtoupper($action)) {
                case 'HOME':
                    $redirectTo .= '?redirectPage='.urlencode($redirectPage."?action=home");
                    break;
                case 'INFO':
                    $redirectTo .= '?redirectPage='.urlencode($redirectPage."?courseid=".$id."&action=info");
                    break;
                case 'LEARNING':
                    $redirectTo .= '?redirectPage='.urlencode($redirectPage."?courseid=".$id."&action=learning");
                    break;

                default:
                    $redirectTo .= '?redirectPage='.urlencode($redirectPage."?action=home");
                    break;
            }
        }

        header("location: ".$redirectTo);
        exit();
    } else {
        return $responseData['data'];
    }
}

function groups($key){
     global $oFunc;

     $oClient = new HttpClientCall();
     $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/groups/".$key, "GET", $oFunc->getCookieString());
     $responseData = $responseHttp['body'];
     return $responseData;
}

function groups2id($id){
    global $oFunc;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/groups/".$id."/id", "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function groups404(){
    global $oFunc;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/groups404", "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function enroll($id){
    global $oFunc;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/enroll/".$id, "GET", $oFunc->getCookieString());

    if ($responseHttp['headers']['StatusCode'] == 404 && $responseHttp['headers']['Content-Type'] == "application/json") {
        header("Location: ".constant("_BASE_SITE_URL"));
        exit();
    }

    $responseData = $responseHttp['body'];
    return $responseData;
}

function exam2score($id){
    global $oFunc;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/exam2score/".$id, "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function enroll2topic($id){
    global $oFunc;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/enroll2topic/".$id, "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function enroll2topic_skip($id, $skip){
    global $oFunc;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/enroll2topic/".$id."/skip/".$skip, "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function enroll2summary($id){
    global $oFunc;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/enroll2summary/".$id, "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function mycourses(){
    global $oFunc;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/my2enroll", "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function mycourses_test(){
    global $oFunc;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl("https://elearning.set.or.th/api/site/my2enroll_test", "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function myorders(){
    global $oFunc;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/my2orders", "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function quiz($enroll_id, $quiz_id){
    global $oFunc;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/enroll/".$enroll_id."/quiz/".$quiz_id, "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function enrollByCourse($cid){
    global $oFunc;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/enroll/courses/".$cid, "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function methods(){
    global $oFunc;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/methods", "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function banks(){
    global $oFunc;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/banks", "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}

function discussion($key,$id){
    global $oFunc;

    $oClient = new HttpClientCall();
    $responseHttp = $oClient->curl(constant("_BASE_SERVICE_URL")."/site/discussion/groups/".$key."/courses/".$id, "GET", $oFunc->getCookieString());
    $responseData = $responseHttp['body'];
    return $responseData;
}