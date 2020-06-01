<?php
require_once __DIR__.'/vendor/autoload.php';

$wowzaToken = new \remiheens\WowzaSecureToken\WowzaSecureToken('wowzatoken','2b9c8d899ed22ad3');
$wowzaToken->setClientIP($_SERVER['REMOTE_ADDR']);
$wowzaToken->setURL('http://th-live-14.open-cdn.com:1935/vod/_definst_/events/EV001/smil:ev001.smil/playlist.m3u8');
$wowzaToken->setHashMethod(\remiheens\WowzaSecureToken\WowzaSecureToken::SHA256);

$starttime = time();
$endtime = strtotime('+3 HOUR');
$params = array(
    'endtime' => $endtime,
    'starttime' => $starttime,
    'CustomParam1' => 'CustomValue'
);

$wowzaToken->setExtraParams($params);

$hash = $wowzaToken->getHash();

$url = $wowzaToken->getFullURL();
echo $url;
?>