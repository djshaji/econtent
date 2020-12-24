<?php
include "header.php";
include "db.php";
// echo 'uid', gettype ($uid);
if ($uid == NULL) {
  include "footer.php" ;
  printf ('<script>
    swal ("Not authorized", "You are not logged in. Log in and try again", "error").then((e)=>{ 
    // window.history.back ()
    // alert ("sss")
    location.href = "/login.php"
    })

    </script>');

    die ();
}

?>

<div class="main" style="margin-top:0">
  <div class="section" style="padding:0">
    <div class="alert alert-info" role="alert">
      <div class="container">
          <i style="vertical-align:-3" class="fa fa-info-circle"></i>
          &nbsp;<strong>For any query click to contact</strong> 
          Prof. Shaji Khan
          <a href="https://wa.me/917006351732" type="button" class="btn btn-sm btn-success bmd-btn-fab">
              <span style="font-size: 14;" class="fab fab-whatsapp" data-icon="logos:whatsapp" data-inline="false"></span>
          </a>
          <a href="tel://+917006351732" type="button" class="btn btn-sm btn-danger bmd-btn-fab">
              <i class="fa fa-phone"  style="font-size: 14;" id='fab-phone'></i>
          </a>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">
          <i class="now-ui-icons ui-1_simple-remove"></i>
          </span>
        </button>
      </div>
    </div>

    <div class="container">
      <h3 class="h1-seo n-logo">Courses Uploaded</h3>
      <b>Scroll for more ></b>
      <div class="row table-responsive">
        <?php include 'courses.php' ;?>

      </div>
    </div>
  </div>
</div>

<?php
include 'modals.php';
include 'footer.php';
?>

