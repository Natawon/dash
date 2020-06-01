<?php
$w = (!isset($_GET['w'])) ? '640' : $_GET['w'];
$h = (!isset($_GET['h'])) ? '360' : $_GET['h'];
?>
<html>
<body>

<script src="//cdn.bootcss.com/flv.js/1.5.0/flv.min.js"></script>
<video id="videoElement" controls preload="false" autoplay width="<?=$w?>" height="<?=$h?>" poster="player-bg.jpg" preload="none"></video>
<script>
    if (flvjs.isSupported()) {
        var videoElement = document.getElementById('videoElement');
        var flvPlayer = flvjs.createPlayer({
            type: 'flv',
            isLive: true,
            url: '<?=$_REQUEST['url']; ?>'
        });
        flvPlayer.attachMediaElement(videoElement);
        flvPlayer.load();
        flvPlayer.play();
    }
</script>

</body>
</html>
