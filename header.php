<?php
include 'token.php';
if ($_SESSION == null) {
  $token = $_COOKIE ['token'];
  if ($token != null) {
    $uid = token_verify ($token, true);
    // var_dump ($uid);
    if ($uid != null) {
      session_start () ;
      $_SESSION ['uid'] = $uid ;
      ?>
      <script>
        uid = "<?php echo $uid ;?>" ;
      </script>
      <?php
      // $_SESSION ['email'] = $uid -> {"email"} ;
    }
  } else {
    session_unset () ;
    if ($_SESSION)  
      session_destroy () ;
  }
  
  // session_start () ;
}

$codename = 'e-पुस्तकालय';
$description = 'JK Higher Education e-Content Repository';
$module = ucwords (substr (explode ('.',$_SERVER['REQUEST_URI']) [0],1));
if ($module == 'Index' || $module == '')
  $module = 'Home';
// var_dump ($token);
include 'db.php' ;

?>
<!--

=========================================================
* Now UI Kit - v1.3.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-kit
* Copyright 2019 Creative Tim (http://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/now-ui-kit/blob/master/LICENSE.md)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.14.4/firebase-app.js"></script>

<!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
<script src="https://www.gstatic.com/firebasejs/7.14.4/firebase-analytics.js"></script>

<!-- Add Firebase products that you want to use -->
<script src="https://www.gstatic.com/firebasejs/7.14.4/firebase-auth.js"></script>
<!-- <script src="https://www.gstatic.com/firebasejs/7.14.4/firebase-firestore.js"></script> -->
<!-- <script src="https://www.gstatic.com/firebasejs/7.14.5/firebase-storage.js"></script> -->
<script src="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.css" />
<script src="/firebaseConfig.js"></script>
<script src="/util.js?<?php echo time ();?>"></script>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php echo $codename ;?>

  </title>
  <meta name="description" content="<?php echo $description ;?>">
  <meta name="keywords" content="<?php echo $codename ; echo $description ;?>">
  <meta name="author" content="Shaji Khan | GDC Udhampur">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">
  <!-- Navbar -->
  <nav style="margin-bottom:0" class="navbar navbar-expand-lg bg-primary <?php if ($module == "Home") echo "fixed-top navbar-transparent\" color-on-scroll=\"400\"" ;?> >
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="/">
          <?php 
            printf ("%s | %s", $codename, $module);
            
          ?> 
        </a>
        <label class="text-white brand" id="email"></label>

        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
        <ul class="navbar-nav">
          <li class="nav-item d-none"  id="menu-upload">
            <a class="nav-link" href="/upload.php">
              <i class="fa fa-upload"></i> Upload e-Content
            </a>
          </li>          

          <li class="nav-item">
            <a class="nav-link" href="/login.php" id="menu-login">
              <i class="fa fa-shield-alt"></i> Login
            </a>
            <a class="nav-link d-none" href="javascript:logout ()" id="menu-logout">
              <i class="fa fa-shield-alt"></i> Logout
            </a>

          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
