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

<div class="main">
  <div class="section">
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

