<!DOCTYPE HTML>
<html lang="en-US">
  <head>
      <meta charset="UTF-8">
      <title></title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

      <style>
html,
body {
  margin: 0;
  padding: 0;
  height: 100%;
  width: 100%;
}
.theme-light {
  --color-primary: #0060df;
  --color-secondary: #fbfbfe;
  --color-accent: #fd6f53;
  --font-color: #000000;
}
.theme-dark {
  --color-primary: #17ed90;
  --color-secondary: #2a2c2d;
  --color-accent: #12cdea;
  --font-color: #ffffff;
}
.container {
  display: flex;
  width: 100%;
  height: 100%;
  background: var(--color-secondary);
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.container h1 {
  color: var(--font-color);
  font-family: sans-serif;
}
.container button {
  color: var(--font-color);
  background: var(--color-primary);
  padding: 10px 20px;
  border: 0;
  border-radius: 5px;
}

/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: 0.4s;
  transition: 0.4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 40px;
  width: 40px;
  left: 0px;
  bottom: 4px;
  top: 0;
  bottom: 0;
  margin: auto 0;
  -webkit-transition: 0.4s;
  transition: 0.4s;
  box-shadow: 0 0px 15px #2020203d;
  background: white url('https://i.ibb.co/FxzBYR9/night.png');
  background-repeat: no-repeat;
  background-position: center;
}

input:checked + .slider {
  background-color: #2196f3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196f3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(24px);
  -ms-transform: translateX(24px);
  transform: translateX(24px);
  background: white url('https://i.ibb.co/7JfqXxB/sunny.png');
  background-repeat: no-repeat;
  background-position: center;
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.a{
  width:auto;
}
.b{
  margin-top:-41%;
  margin-left:29.5%;
}
  

        #button {
  /* Text */
  font-size: 45px;
  
  /* Dimensions */
  width: 100px;
  height: 100px;
  
  /* Positioning */
  position: fixed;
  top: 42.6%;
  left: 43.8%;
  z-index: 2;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  
  /* The code above makes sure the video is
  both vertically and horizontally centered
  to the screen */
  
  /* Styling */
  background-color: rgba(0, 0, 0, 0.95);
  border: 0; /* remove annoying grey border */
  border-radius: 50%; /* make it a circle */
  outline: none; /* Ditch the annoyning blue outline on click */
  cursor: pointer;
  box-shadow: 0px 0px 0px 2px rgba(0, 0, 0, 0.25);
  
  /* ----- Transformations ----- */
  -webkit-transform: scale(1, 1);
  -moz-transform: scale(1, 1);
  -ms-transform: scale(1, 1);
  -o-transform: scale(1, 1);
  transform: scale(1, 1);
  
  /* ----- Transitions ----- */
  -webkit-transition: transform .5s ease;
  -moz-transition: transform .5s ease;
  -ms-transition: transform .5s ease;
  -o-transition: transform .5s ease;
  transition: transform .5s ease;
}

#button:hover {
  /* ----- Transformations ----- */
  -webkit-transform: scale(1.2, 1.2);
  -moz-transform: scale(1.2, 1.2);
  -ms-transform: scale(1.2, 1.2);
  -o-transform: scale(1.2, 1.2);
  transform: scale(1.2, 1.2);
  
  /* ----- Transitions ----- */
  -webkit-transition: transform .5s ease;
  -moz-transition: transform .5s ease;
  -ms-transition: transform .5s ease;
  -o-transition: transform .5s ease;
  transition: transform .5s ease;
}

#button > i {
  /* Text */
  color: grey;
  text-shadow: 1px 1px rgba(255, 255, 255, 0.2);
  
  /* Make play sign 3d-ish */
  
  /* Positioning */
  position: relative;
  margin-top: 4px;
  margin-left: 6px;
  
  /* ----- Transitions ----- */
  -webkit-transition: color .5s ease;
  -moz-transition: color .5s ease;
  -ms-transition: color .5s ease;
  -o-transition: color .5s ease;
  transition: color .5s ease;
}

#button:hover > i {
  /* Text */
  color: white;
  
  /* ----- Transitions ----- */
  -webkit-transition: color .5s ease;
  -moz-transition: color .5s ease;
  -ms-transition: color .5s ease;
  -o-transition: color .5s ease;
  transition: color .5s ease;
  
  /* When we hover on the button make the play sign white. */
}

#lightbox {
  /* ----- Positioning ----- */
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;
  
  /* The code above makes sure that the
  lightbox covers the entire page*/
  
  /* ----- Visibility ----- */
  display: none;
  
  /* ----- Styling ----- */
  background-color: rgba(0, 0, 0, 0.95);
  
  /* Normally, most lightboxes do not use
  a completely solid black, but with about
  90-95% opacity so that the background is
  somewhat visible */
}

#video-wrapper {
  /* ----- Positioning ----- */
  position: absolute;
  top: 50%;
  left: 50%;
  z-index: 2;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  
  /* The code above makes sure the video is
  both vertically and horizontally centered
  to the screen */
  
  /* ----- Styling ----- */
  box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.1);
  
  /* The code above is used to add a little shadow to the video making blend in better */
}

#close-btn {
  /* ----- Text ----- */
  color: grey;
  font-size: 25px;
  
  /* ----- Positioning ----- */
  position: fixed;
  top: 3%;
  right: 3%;
  z-index: 2;
  
  /* The code above is used to put the button on the upper right corner of the lightbox */
  
  /* ----- Transformations ----- */
  -webkit-transform: scale(1, 1);
  -moz-transform: scale(1, 1);
  -ms-transform: scale(1, 1);
  -o-transform: scale(1, 1);
  transform: scale(1, 1);
  
   /* The code above is used to initialize the scale for the button so that it can be used in transitions */
  
  /* ----- Transitions ----- */
  -webkit-transition: transform .5s ease, color .5s ease;
  -moz-transition: transform .5s ease, color .5s ease;
  -ms-transition: transform .5s ease, color .5s ease;
  -o-transition: transform .5s ease, color .5s ease;
  transition: transform .5s ease, color .5s ease;
}

#close-btn:hover {
  /* ----- Text ----- */
  color: white;
  
  /* ----- Styling ----- */
  cursor: pointer;
  
  /* ----- Transformations ----- */
  -webkit-transform: scale(1.2, 1.2);
  -moz-transform: scale(1.2, 1.2);
  -ms-transform: scale(1.2, 1.2);
  -o-transform: scale(1.2, 1.2);
  transform: scale(1.2, 1.2);
  
    /* ----- Transitions ----- */
  -webkit-transition: transform .5s ease, color .5s ease;
  -moz-transition: transform .5s ease, color .5s ease;
  -ms-transition: transform .5s ease, color .5s ease;
  -o-transition: transform .5s ease, color .5s ease;
  transition: transform .5s ease, color .5s ease;
}
      </style>
      <script>
        $(document).ready(function() {
    
    // When the button is clicked make the lightbox fade in in the span of 1 second, hide itself and start the video
    $("#button").on("click", function() {
      $("#lightbox").fadeIn(1000);
      $(this).hide();
      var videoURL = $('#video').prop('src');
      videoURL += "?autoplay=1";
      $('#video').prop('src',videoURL);
    });
    
    // When the close button is clicked make the lightbox fade out in the span of 0.5 seconds and show the play button
    $("#close-btn").on("click", function() {
      $("#lightbox").fadeOut(500);
      $("#button").show(250);
    });
  });
      </script>
  </head>
  <body>
      <!--Requirements-->

<!--I use a font awesome icon as a close button.
Be sure to include in your file the latest version
of Font Awesome for it to work.
LINK:
https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css-->

<!--Also remember to include the latest version of jQuery
in order for the script to work
LINK: https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js-->

<button id = "button"><i class = "fa fa-play" aria-hidden = "true"></i></button>
<div id = "lightbox">
  <i id = "close-btn" class="fa fa-times"></i>
  <div id = "video-wrapper">
    <iframe id = "video" width="960" height="540" src = "https://www.youtube.com/embed/jC1ZDnN42q0?rel=0&amp;autoplay=1&amp;controls=0&amp;showinfo=0" frameborder = "0" allowfullscreen></iframe>
  </div>
</div>
<div class="container">
  <div class="a">
  <button onclick="myFunction3()">frog-white</button>
  <button onclick="myFunction4()">frog-black</button>
  <button onclick="myFunction5()">frog-blue ขอบขาว</button>
  <button onclick="myFunction6()">frog-white ขอบดำ</button>
  <button onclick="myFunction7()">frog-orange</button>
  <button onclick="myFunction8()">frog-orange(ขอบกำ)</button>
  <button onclick="myFunction9()">frog-orangewhite </button>
  <button onclick="myFunction10()">frog-orangewhite ขอบขาว</button>
  </div>
  <img id="myImg" src="img/Frog_ID_White.png" alt="frogid" width="960" height="540">
    <!-- <h1>Switcher</h1> -->
    <label id="switch" class="switch">
            <input type="checkbox" onchange="toggleTheme()" id="slider">
            <span class="slider round"></span>
        </label>
  </div>
  <script>
  // function to set a given theme/color-scheme
  function setTheme(themeName) {
            localStorage.setItem('theme', themeName);
            document.documentElement.className = themeName;
        }

        // function to toggle between light and dark theme
        function toggleTheme() {
            if (localStorage.getItem('theme') === 'theme-dark') {
                setTheme('theme-light');
            } else {
                setTheme('theme-dark');
            }
        }

        // Immediately invoked function to set the theme on initial load
        (function () {
            if (localStorage.getItem('theme') === 'theme-dark') {
                setTheme('theme-dark');
                document.getElementById('slider').checked = false;
            } else {
                setTheme('theme-light');
              document.getElementById('slider').checked = true;
            }
        })();





Resources


  </script>
  <script>
  function myFunction3() {
  document.getElementById("myImg").src = "img/Frog_ID_White.png";
}
function myFunction4() {
  document.getElementById("myImg").src = "img/Frog_ID.png";
}
function myFunction5() {
  document.getElementById("myImg").src = "img/Frog_ID Blue2.png";
}
function myFunction6() {
  document.getElementById("myImg").src = "img/Frog_ID Blue White1.png";
}
function myFunction7() {
  document.getElementById("myImg").src = "img/FrogID_Orange.png";
}
function myFunction8() {
  document.getElementById("myImg").src = "img/FrogID_Orange1.png";
}
function myFunction9() {
  document.getElementById("myImg").src = "img/FrogID_OrangeWhite.png";
}
function myFunction10() {
  document.getElementById("myImg").src = "img/FrogID_OrangeWhite2.png";
}
  </script>
  </body>
</html>