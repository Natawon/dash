<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thangman22 auth</title>
    <!-- <script src="https://www.gstatic.com/firebasejs/3.4.0/firebase.js"></script> -->
    <script src="https://www.gstatic.com/firebasejs/7.11.0/firebase-app.js"></script>

    <script>
    // Initialize Firebase
    var firebaseConfig = {
    apiKey: "AIzaSyCCDHFIgMZ-80rTCa_-TOmVDPUIdp87l2M",
    authDomain: "helpdesk-973e3.firebaseapp.com",
    databaseURL: "https://helpdesk-973e3.firebaseio.com",
    projectId: "helpdesk-973e3",
    storageBucket: "helpdesk-973e3.appspot.com",
    messagingSenderId: "663734655339",
    appId: "1:663734655339:web:f46d5631a7403e1637d42e",
    measurementId: "G-DGK480LMWD"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

    var provider = new firebase.auth.GoogleAuthProvider();

    function onSignInButtonClick(){
      firebase.auth().signInWithPopup(provider).then(function(result) {
        console.log(result);
        //Do something when login complete
      }).catch(function(error) {
        //Do something when error
      });
    }
</script>
</head>
<body>
<button onclick="onSignInButtonClick()">Login</button>
</body>
</html>