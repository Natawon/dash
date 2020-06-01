<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
        <div id="video_container">
                <video poster="http://media.w3.org/2010/05/sintel/poster.png" preload="none" controls="" id="video" tabindex="0">
                    <source type="video/mp4" src="http://media.w3.org/2010/05/sintel/trailer.mp4" id="mp4"></source>
                    <source type="video/webm" src="http://media.w3.org/2010/05/sintel/trailer.webm" id="webm"></source>
                    <source type="video/ogg" src="http://media.w3.org/2010/05/sintel/trailer.ogv" id="ogv"></source>
                    <p>Your user agent does not support the HTML5 Video element.</p>
                </video>
                </div>
                
                <div>Current Time : <span  id="currentTime">0</span></div>
                
                <!-- <div>Total time : <span id="totalTime">0</span> -->
                    <?php
                    $total = '<span id="currentTime">0</span>';
                    echo "current = ".$total;

                                $k =0;
            $credit = 100;
            // for($i = 1;$i<=20;$i++){
                if ($i % 5 == 0) {
                    //  echo "The number is: $i <br>";
                      $sum += $i;
                     $k++;
                 }
            // }
            $result= $credit -(5 * $k);
            echo "จำนวนเครดิต = ".$result."<br>";


            
            ?>

        </div>
        <span id="getCurTime()" ></span>
       <!-- <button onclick="setCurTime()" type="button">Set time position to 5 seconds</button><br>  -->


    <script>
    $(function(){
        $('#currentTime').html($('#video_container').find('video').get(0).load());
        $('#currentTime').html($('#video_container').find('video').get(0).play());
    })
        setInterval(function(){
        $('#currentTime').html($('#video_container').find('video').get(0).currentTime);
        $('#totalTime').html($('#video_container').find('video').get(0).duration);    
    },500)


    // var video = document.getElementsByTagName('video')[0].currentTime;
    // console.log(document.getElementsByTagName('video')[0].currentTime); 
    </script> 
<script>
var vid = document.getElementById("video");

console.log(vid.currentTime);

// function getCurTime() { 
//     vid.currentTime;
// } 

function setCurTime() { 
  vid.currentTime=5;
} 
</script> 
</body>
</html>