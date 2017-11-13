var facebook = new firebase.auth.FacebookAuthProvider();
firebase.auth().languageCode = 'id';
// To apply the default browser preference instead of explicitly setting it.
// firebase.auth().useDeviceLanguage();
function logIn() {
firebase.auth().signInWithPopup(facebook).then(function(result) {
  if (result.credential) {
    // This gives you a Facebook Access Token. You can use it to access the Facebook API.
    var token = result.credential.accessToken;
    // ...
  }
  // The signed-in user info.
  var user = firebase.auth().currentUser;
  var name, email, photoUrl, uid, emailVerified,userToken;

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
  console.log("berhasil");
  }).catch(function(error) {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;
    // The email of the user's account used.
    var email = error.email;
    // The firebase.auth.AuthCredential type that was used.
    var credential = error.credential;
    console.log(errorCode);
    console.log(errorMessage);
    console.log(email);
  });
}

function logOut() {
  firebase.auth().signOut().then(function() {
    // Sign-out successful.
    console.log("berhasil logOut");
  }).catch(function(error) {
    // An error happened.
  });
}
