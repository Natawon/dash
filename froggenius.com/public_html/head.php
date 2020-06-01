<?php 
  include 'stext.php';
  require_once 'lib/class.http-client-call.php';
  $oFunc = new HelperFunctions();
  $base = "services/";
  include($base."mainservices.php");
  $configuration = configuration();
  $news_groups_id = isset($_GET['news_groups_id']) ? $_GET['news_groups_id'] : '';
  $news = news($news_groups_id);
  $newsmain = newsmain();
  $newsid = newsid($_GET['id']);
  $news_groups = news_groups();
  $newsrandomshow = randomshow();
?>

<base href="/">

<link rel="shortcut icon" href="assets/img/all/FrogGenius_favicon.ico" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="<?=$configuration['meta_keywords']?>">
<meta name="description" content="<?=$configuration['meta_description']?>">
<meta name="author" content="">
<meta name="copyright" content = "">

<link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
<link rel="manifest" href="/assets/favicon/site.webmanifest">
<link rel="mask-icon" href="/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.css" rel="stylesheet">
<!-- Custom fonts for this template -->
<link href="assets/font-awesome/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">
<!-- Bootstrap core JavaScript -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!-- Plugin JavaScript -->
<script src="assets/js/jquery.easing.js"></script>
<!-- jQuery Modal -->
<script src="assets/js/jquery.modal.min.js"></script>
<link href="assets/css/jquery.modal.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<!-- Font -->
<link href="assets/fonts/font.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/css/main.css?v=1.0.0" rel="stylesheet">
<!-- animate -->
<link href="assets/css/animate.css" rel="stylesheet">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TB7MV3X');</script>
<!-- End Google Tag Manager -->
