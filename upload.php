<?php
include "header.php";
include "db.php";
// echo 'uid', gettype ($uid);
$courses = [
  "Functional English",
  "General English",
  "English Literature",
  "Communicative English",
  'Honours Course 1',
  'Honours Course 2'
];


if ($uid == NULL) {
  $uid == $_GET ['uid'];
  if ($uid == null) {
    printf ("<script>append_uid=true;</script>");
    include "footer.php" ;
    printf ('<script>
      swal ("Not authorized", "You are not logged in. Log in and try again", "error").then((e)=>{ 
      // window.history.back ()
      // alert ("sss")
      // location.href = "/login.php"
      })
  
      </script>');
      var_dump ($_COOKIE);
      die ();
  
  }
}

$ddess = 'Courses Uploaded' ;
switch ($_GET ['mode']) {
  default:
    break ;
  case 'missing':
    $ddess = 'e-Content Not Uploaded' ;
    break ;
  case 'report':
    $ddess = 'e-Content Uploaded Report Semester / Unit wise' ;
    break ;
  case 'faculty':
    $ddess = 'e-Content Uploaded Report Faculty wise' ;
    break ;
}

?>

<div class="main" style="margin-top:0">
  <div class="section" style="padding:0">
    <?php if (!isset ($_GET ['mode'])) {
      ?>
    <div class="alert alert-info mb-0" role="alert">
      <div class="container">
          <i style="vertical-align:-3" class="fa fa-info-circle"></i>
          &nbsp;<strong>Designed by</strong> <br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prof. Shaji Khan
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
        <br>

        <div class="row">
          <div class="col-md-5">
            <b>Select University</b>
            <div class="mt-2 mb-3">
              <select class="btn btn-primary" id='university'>
                <option value="University of Jammu">University of Jammu</option>
                <option value="GCW Parade (Autonomous)">GCW Parade (Autonomous)</option>
                <option value="Cluster University">Cluster University</option>
              </select>
            </div>
            <b>Select Subject</b>
            <div class="mt-2 mb-3">
              <select class="btn btn-primary" id='subject'>
                <option>English</option>
              </select>
            </div>

          </div> 
          <div class="col-md-5">
            <b>Select Semester</b>
            <div class="mt-2 mb-3">
              <select class="btn btn-primary" id='semester'>
                <option value="1">Semester 1</option>
                <option value="3">Semester 3</option>
                <option value="5">Semester 5</option>
              </select>
              <br>
              <b>Select Course</b>
              <div class=" mt-2 mb-3">
                <select class="btn btn-primary" id='course'>
                <?php
                  foreach ($courses as $c) {
                    printf ("<option value='%s'>%s</option>", $c, $c);
                  }
                  ?>
                </select>
              </div>
             </div>
        
          </div>

        </div>

        <a href="javascript: upload_open ()" class="btn btn-danger text-white">Go</a>
        <a href="javascript: upload_open (true)" class="btn btn-success text-white">View All</a>

      </div>
    </div>
                <?php } else {?><div ></div><?php }?>

    <div class="alert alert-success" role="alert">
      <div class="container">
      <a href="/upload.php?mode=report" class="bold text-white btn btn-primary btn-info btn-round" type="button">Upload Status <b>Report</b></a>
      <a href="/upload.php?mode=faculty" class="text-white btn btn-primary btn-warning btn-round" type="button"><b>Faculty</b> Wise Report</a>
      <a href="/upload.php?mode=missing" class="text-white btn btn-danger btn-danger btn-round" type="button">Content <b>Not Uploaded</b></a>
      <?php if (strpos ($_SERVER ['REQUEST_URI'], '?' ) != false ) {
        ?>
          <a href="/upload.php" class="text-white btn btn-success btn-round" type="button"><b>Upload e-Content</b></a>

        <?php
      }
      ?>
      </div>
    </div>
    <div class="container">
      <h3 class="h1-seo n-logo"><?php echo $ddess ;?></h3>
      <b class='alert-info p-2'>
        <i class="fa fa-check text-success"> </i>
        Scroll right (using arrow keys or mouse) for Units 3, 4 and 5&nbsp;
        <i class="fas fa-arrow-right"></i>
      </b>
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

<script>
ui ("semester").value = '<?php echo $_GET ['semester'] ;?>';
ui ("university").value = '<?php echo $_GET ['university'] ;?>';
ui ("course").value = '<?php echo $_GET ['course'] ;?>';
</script>

