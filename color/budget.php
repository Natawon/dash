<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>budget</title>
    <style>
    @import url(https://fonts.googleapis.com/css?family=Concert+One);
@import url(https://fonts.googleapis.com/css?family=Advent+Pro:300);
html,body{
  height:100%;   
}
body{
  text-align:center;
 background: #d5d5d5; /* Old browsers */
background: -moz-linear-gradient(top,  #d5d5d5 0%, #f3f3f3 80%, #feffff 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#d5d5d5), color-stop(80%,#f3f3f3), color-stop(100%,#feffff)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #d5d5d5 0%,#f3f3f3 80%,#feffff 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #d5d5d5 0%,#f3f3f3 80%,#feffff 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #d5d5d5 0%,#f3f3f3 80%,#feffff 100%); /* IE10+ */
background: linear-gradient(to bottom,  #d5d5d5 0%,#f3f3f3 80%,#feffff 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d5d5d5', endColorstr='#feffff',GradientType=0 ); /* IE6-9 */

}
label[for=range] {
position: absolute;
top: 50%;
left: 50%;
margin-left: -175px;
margin-top: -32px;
height: 49px;
padding-top: 6px;
width: 350px;
padding-left: 13px;
-webkit-transform: skew(-62deg);
overflow: hidden;
padding-bottom: 10px;
}
label[for=range]:after {
content: "";
position: absolute;
bottom: 11px;
left: 69px;
height: 9px;
width: 278px;
box-shadow: 0px 3px 10px -3px rgba(0, 0, 0, 0.51);
-webkit-transform: skew(62deg);
}
input[type=range] {
-webkit-appearance: none;
background-color: transparent;
width: 300px;
height: 38px;
  padding-top:10px;
  overflow:hidden;
margin: 0;
margin-left: -20px;
transform-style: preserve-3d;
perspective: 300;
transform-origin: 50% 50% 300px;
perspective-origin: 50% -121%;
transform: skew(62deg);
}
input[type=range]:focus{
  outline:none;
}
input[type="range"]::-webkit-slider-thumb {
  position:relative;
     -webkit-appearance: none;
    cursor:pointer;
    background-color: transparent;
    width: 30px;
    height: 18px;
    box-shadow: 1px 5px 10px -1px rgba(0, 0, 0,0.2),
    -25px 0 0 10px rgba(90, 184, 6, 0.5),
    -75px 0 0 10px rgba(90, 184, 6, 0.5),
    -125px 0 0 10px rgba(90, 184, 6, 0.5),
    -175px 0 0 10px rgba(90, 184, 6, 0.5),
    -225px 0 0 10px rgba(90, 184, 6, 0.5),
    -275px 0 0 10px rgba(90, 184, 6, 0.5),
    -325px 0 0 10px rgba(90, 184, 6, 0.5);
  z-index:2;
}
input[type="range"]::-webkit-slider-thumb:after {
content: "";
position: absolute;
z-index: 1;
left: -285px;
top: -28px;
width: 300px;
height: 140px;
background: #9FE472;
transform: rotateX(90deg);
transform-origin: 0 0px 0;
transform: rotateX(90deg) translateY(-140px) translateZ(-18px);
}
input[type="range"]::-webkit-slider-thumb:before {
content: "< >";
font-family: 'Concert One', cursive;
position: absolute;
background: #eaebe5;
background: -moz-linear-gradient(top, #eaebe5 0%, #dcdedd 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#eaebe5), color-stop(100%,#dcdedd));
background: -webkit-linear-gradient(top, #eaebe5 0%,#dcdedd 100%);
background: -o-linear-gradient(top, #eaebe5 0%,#dcdedd 100%);
background: -ms-linear-gradient(top, #eaebe5 0%,#dcdedd 100%);
background: linear-gradient(to bottom, #eaebe5 0%,#dcdedd 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#eaebe5', endColorstr='#dcdedd',GradientType=0 );
top: -2px;
left: 0px;
border-radius: 2px;
color: #5a5a5a;
text-shadow: 0 1px 0 white;
height: 22px;
width: 32px;
border-top: 1px solid white;
border-left: 1px solid white;
box-sizing: border-box;
text-align: center;
line-height: 19px;
font-size: 17px;
}
input[type="range"]::-webkit-slider-runnable-track:before {
content: "";
position: absolute;
height: 38px;
width: 283px;
background: #e8e8e8;
background: -moz-linear-gradient(top, #dfdfdf 0%, #d8d8d8 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#dfdfdf), color-stop(100%,#d8d8d8));
background: -webkit-linear-gradient(top, #dfdfdf 0%,#d8d8d8 100%);
background: -o-linear-gradient(top, #dfdfdf 0%,#d8d8d8 100%);
background: -ms-linear-gradient(top, #dfdfdf 0%,#d8d8d8 100%);
background: linear-gradient(to bottom, #dfdfdf 0%,#d8d8d8 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#dfdfdf', endColorstr='#d8d8d8',GradientType=0 );
bottom: 0;
left: 0;
}
input[type="range"]::-webkit-slider-runnable-track:after {
content: "";
position: absolute;
height: 10px;
width: 270px;
background: rgb(247, 247, 247);
top: 0;
right: 26px;
transform: skew(62deg);
}
input[type=range]:before {
content: "";
position: absolute;
background: rgb(190, 190, 190);
box-shadow:0 1px 0 rgb(235, 235, 235);
width: 283px;
left: 0;
height: 1px;
top: 29px;
z-index: 1;
}
input[type=range]:after {
content: "";
position: absolute;
background: rgb(190, 190, 190);
width: 7px;
left: 3px;
border-radius: 50%;
height: 6px;
top: 26px;
z-index: 1;
box-shadow:30px 0 0 rgb(190, 190, 190),
60px 0 0 rgb(190, 190, 190),
90px 0 0 rgb(190, 190, 190),
120px 0 0 rgb(190, 190, 190),
150px 0 0 rgb(190, 190, 190),
180px 0 0 rgb(190, 190, 190),
210px 0 0 rgb(190, 190, 190),
240px 0 0 rgb(190, 190, 190),
270px 0 0 rgb(190, 190, 190),
60px 1px 0 rgb(235, 235, 235),
90px 1px 0 rgb(235, 235, 235),
120px 1px 0 rgb(255, 255, 255),
150px 1px 0 rgb(235, 235, 235),
180px 1px 0 rgb(235, 235, 235),
210px 1px 0 rgb(235, 235, 235),
240px 1px 0 rgb(235, 235, 235),
270px 1px 0 rgb(235, 235, 235);
}

.budget {
position: absolute;
top: 50%;
left:0;
margin-top: -100px;
text-align: center;
width: 100%;
font-size: 2em;
font-family: 'Advent Pro', sans-serif;
color: rgb(58, 58, 58);
}
.output {
position: absolute;
bottom: 50%;
left: 0;
margin-bottom: -100px;
text-align: center;
width: 100%;
font-size: 2em;
font-family: 'Advent Pro', sans-serif;
color: rgba(132, 206, 66, 1);
}
    </style>
</head>
<body>
<p class="budget">What is your budget?</p>
<label for="range">
      <input type="range" name="range" id="range" min="0" max="300" step="5" value="175"/>
</label>
 <output for="range" class="output"></output>
</body>
<script>
$('#range').on("input", function() {
    $('.output').val(this.value +",000  " );
    }).trigger("change");
</script>
</html>
