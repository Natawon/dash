<?php
/*
 * set var
 */
$cfHost = "localhost";
$cfUser = "admin";
$cfPassword = "1234";
$cfDatabase = "shop";

/*
 * connection mysql
 */
$meConnect = mysql_connect($cfHost, $cfUser, $cfPassword) or die("Error conncetion mysql...");
$meDatabase = mysql_select_db($cfDatabase);
mysql_query("SET NAMES UTF8");
?>