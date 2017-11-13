
var provider = new firebase.auth.GoogleAuthProvider();
provider.addScope('https://www.googleapis.com/auth/plus.login');
firebase.auth().languageCode = 'id';

function mlebu() {
  // firebase.auth().signInWithPopup(provider);
  firebase.auth().signInWithPopup(provider).then(function(result) {
  if (result.credential) {
    // This gives you a Google Access Token. You can use it to access the Google API.
    var token = result.credential.accessToken;
    // ...
  }
  // The signed-in user info.
  // var user = result.user;
  var user = firebase.auth().currentUser;
  var name, email, photoUrl, uid, emailVerified;

  if (user != null) {
    name = user.displayName;
    email = user.email;
    photoUrl = user.photoURL;
    emailVerified = user.emailVerified;
    uid = user.uid;  // The user's ID, unique to the Firebase project. Do NOT use
                     // this value to authenticate with your backend server, if
                     // you have one. Use User.getToken() instead.
  }
  console.log(token);
  console.log(name);
  console.log(email);
  console.log(photoUrl);
  console.log(uid);
  }).catch(function(error) {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;
    // The email of the user's account used.
    var email = error.email;
    // The firebase.auth.AuthCredential type that was used.
    var credential = error.credential;
    // ...
  });
}

function metu() {
  firebase.auth().signOut().then(function() {
    // Sign-out successful.
    console.log("signOut berhasil");
  }).catch(function(error) {
    // An error happened.
  });
}
