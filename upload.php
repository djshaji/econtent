<?php
include "header.php";
include "db.php";
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

