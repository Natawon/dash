<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>toomtam auth</title>

</head>
<body>


<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBTe1ldH5dQzE6DmVkPM0RxZgWQIqpMm9g",
    authDomain: "login-52073.firebaseapp.com",
    databaseURL: "https://login-52073.firebaseio.com",
    projectId: "login-52073",
    storageBucket: "login-52073.appspot.com",
    messagingSenderId: "208751294907"
  };
  firebase.initializeApp(config);
  
  var provider = new firebase.auth.GoogleAuthProvider();
  
  function onSignInButtonClick(){
    firebase.auth().signInWithPopup(provider).then(function(result) {
      // This gives you a Google Access Token. You can use it to access the Google API.
      var token = result.credential.accessToken;
      // The signed-in user info.
      var user = result.user;
      // ...
      console.log(token);
      console.log(user);
    }).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // The email of the user's account used.
      var email = error.email;
      // The firebase.auth.AuthCredential type that was used.
      var credential = error.credential;
      // ...
      console.log(error.code);
      console.log(error.message);
    });
    }
</script>
<button onclick="onSignInButtonClick()">Login</button>
</body>
</html>