<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>button-slide</title>

    <style>
    *{
  margin : 0;
  padding : 0;
}
body {
    height: 100vh;
    background-color: #000;
    font-family: 'Roboto',sans-serif;
    background: linear-gradient(180deg,#DB302A 0%,#62186B 100%) no-repeat;
}
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.box-minmax{
  margin-top: 30px;
  width: 608px;
  display: flex;
  justify-content: space-between;
  font-size: 20px;
  color: #FFFFFF;
  span:first-child{
    margin-left: 10px;
  }
}
.range-slider {
    margin-top: 30vh;
    
}
.rs-range {
    margin-top: 29px;
    width: 600px;
    -webkit-appearance: none;
    &:focus {
        outline: none;
    }
    &::-webkit-slider-runnable-track {
        width: 100%;
        height: 1px;
        cursor: pointer;
        box-shadow: none;
        background: #ffffff;
        border-radius: 0px;
        border: 0px solid #010101;
    }
    &::-moz-range-track {
        width: 100%;
        height: 1px;
        cursor: pointer;
        box-shadow: none;
        background: #ffffff;
        border-radius: 0px;
        border: 0px solid #010101;
    }
  
    &::-webkit-slider-thumb {
        box-shadow: none;
        border: 0px solid #ffffff;
        box-shadow: 0px 10px 10px rgba(0,0,0,0.25);
        height: 42px;
        width: 22px;
        border-radius: 22px;
        background: rgba(255,255,255,1);
        cursor: pointer;
        -webkit-appearance: none;
        margin-top: -20px;
    }
  &::-moz-range-thumb{
        box-shadow: none;
        border: 0px solid #ffffff;
        box-shadow: 0px 10px 10px rgba(0,0,0,0.25);
        height: 42px;
        width: 22px;
        border-radius: 22px;
        background: rgba(255,255,255,1);
        cursor: pointer;
        -webkit-appearance: none;
        margin-top: -20px;
  }
  &::-moz-focus-outer {
    border: 0;
    }
}
.rs-label {
    
    position: relative;
    transform-origin: center center;
    display: block;
    width: 98px;
    height: 98px;
    background: transparent;
    border-radius: 50%;
    line-height: 30px;
    text-align: center;
    font-weight: bold;
    padding-top: 22px;
    box-sizing: border-box;
    border: 2px solid #fff;
    margin-top: 20px;
    margin-left: -38px;
    left: attr(value);
    color: #fff;
    font-style: normal;
    font-weight: normal;
    line-height: normal;
    font-size: 36px;
    &::after {
        content: "kg";
        display: block;
        font-size: 20px;
        letter-spacing: 0.07em;
        margin-top: -2px;
    }
    
}
    </style>

    
</head>
<body>
<div class="container">
  
  <div class="range-slider">
    <span id="rs-bullet" class="rs-label">0</span>
    <input id="rs-range-line" class="rs-range" type="range" value="0" min="0" max="200">
    
  </div>
  
  <div class="box-minmax">
    <span>0</span><span>200</span>
  </div>
  
</div>
<script>
    var rangeSlider = document.getElementById("rs-range-line");
var rangeBullet = document.getElementById("rs-bullet");

rangeSlider.addEventListener("input", showSliderValue, false);

function showSliderValue() {
  rangeBullet.innerHTML = rangeSlider.value;
  var bulletPosition = (rangeSlider.value /rangeSlider.max);
  rangeBullet.style.left = (bulletPosition * 578) + "px";
}


    </script>

</body>
</html>