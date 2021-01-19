var firebaseConfig = {
  apiKey: "AIzaSyCxoa3sC5zzGbePrKAPXHXsTqdNpg6jceE",
  authDomain: "auth.epustakalaya.devikacloud.in",
  // authDomain: "codename-plasma.firebaseapp.com",
  databaseURL: "https://codename-plasma.firebaseio.com",
  projectId: "codename-plasma",
  storageBucket: "codename-plasma.appspot.com",
  messagingSenderId: "552925571796",
  appId: "1:552925571796:web:5e8ac3717f55eee8efa941",
  measurementId: "G-TEJ40F72FT"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();

var uiConfig = {
  callbacks: {
    signInSuccessWithAuthResult: function(authResult, redirectUrl) {
      // User successfully signed in.
      // Return type determines whether we continue the redirect automatically
      // or whether we leave that to developer to handle.
      return true;
    },

    uiShown: function() {
      // The widget is rendered.
      // Hide the loader.
      // document.getElementById('loader').style.display = 'none';
    }
  },
  // Will use popup for IDP Providers sign-in flow instead of the default, redirect.
  // signInFlow: 'popup',
  signInSuccessUrl: '/index.php',
  signInOptions: [
    // Leave the lines as is for the providers you want to offer your users.
    firebase.auth.GoogleAuthProvider.PROVIDER_ID,
    // firebase.auth.FacebookAuthProvider.PROVIDER_ID,
    // firebase.auth.TwitterAuthProvider.PROVIDER_ID,
    // firebase.auth.GithubAuthProvider.PROVIDER_ID,
    firebase.auth.EmailAuthProvider.PROVIDER_ID
    // firebase.auth.PhoneAuthProvider.PROVIDER_ID
  ]
  // Terms of service url.
  // tosUrl: '<your-tos-url>',
  // Privacy policy url.
  // privacyPolicyUrl: '<your-privacy-policy-url>'
};