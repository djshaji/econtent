<?php
include "header.php";
include "db.php";

if ($uid == null) {
  echo '<script>
    location.href="/login.php" ;
  </script>';
  die () ;
}

$sql =  sprintf ("SELECT * FROM reviews where uid = '%s' ;", $uid);
$ret = $db -> prepare ($sql) ;
$ret -> execute () ;
$ret = $ret -> fetchAll ();

$sql =  sprintf ("SELECT * FROM reviewer where uid = '%s' ;", $uid);
$reviewer = $db -> prepare ($sql) ;
$reviewer -> execute () ;
$reviewer = $reviewer -> fetchAll ();
// var_dump ($reviewer);

?>
<div class="alert alert-info" role="alert">
  <div class="container">
    <div class="alert-icon">
      <i class="now-ui-icons travel_info"></i>
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">
        <i class="now-ui-icons ui-1_simple-remove"></i>
      </span>
    </button>
      <strong>How to use this portal</strong> <br>
      <ul>
        <li><b>Step 1</b> Fill your details and click on <b>Save</b></li>
        <li><b>Step 2</b> Click on <b>Add Review</b> to add a review</li>
      </ul>

      <a href="/upload.php?mode=faculty&assign" class="btn btn-round btn-danger text-white">Review Committee Task List</a>
  </div>
</div>
<div class="section p-1">
  <div class="container">
    <div class="row">
    <p class="category">e-Content Review Dashboard</p>
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
            <b> <i style="vertical-align: -2" class="now-ui-icons users_single-02" aria-hidden="true"></i>
              Reviewer Profile</b>
          </ul>
        </div>
        <form class="card card-plain" method="post" action="post.php?mode=set&prop=reviewer" enctype="multipart/form-data">
          <div class="card-body row m-2">
            <div class="col-sm-6 col-lg-3">
              <div class="form-group">
                <label>Name of Faculty Member</label>
                <input name="faculty" type="text" value="" placeholder="Name" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="form-group">
                <label>Designation</label>
                <input name="designation" type="text" value="" placeholder="Designation" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="form-group">
                <label>Institution</label>
                <input name="institution" type="text" value="" placeholder="Institution" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="form-group">
                <label>Phone</label>
                <input name="phone" type="text" value="" placeholder="Phone" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="form-group">
                <label>EMail</label>
                <input name="email" type="text" value="" placeholder="Email" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <img width="100" id="photo" class="d-none">
              <div id='photo-up'>
                <label>Upload photograph</label><br>
                <input class="form-control" placeholder="Choose file" name="photo" type="file">
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <img width="100" id="sign" class='d-none'>  
              <div id='sign-up'>
                <label>Upload signature</label><br>
                <input class="form-control" placeholder="Choose file" name="sign" type="file">
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div>
                <label class='text-muted'>Click below to save details</label>
                <button class="btn btn-success btn-round" type="submit">Save</button>

              </div>
            </div>
          </div>
        </form>

        <div class="card-header <?php if (sizeof ($reviewer) == 0) echo "d-none" ;?> ">
          <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
            <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home1" role="tab">Reviews</a>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#messages1" role="tab">Messages</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#settings1" role="tab">Pending</a>
            </li> -->
          </ul>
        </div>
        <div class="card-body <?php if (sizeof ($reviewer) == 0) echo "d-none" ;?> ">
          <!-- Tab panes -->
          <div class="tab-content text-center">
            <div class="tab-pane active" id="home1" role="tabpanel">
              <table class="table table-hover shadow table-bordered border border-dark">
                <thead>
                  <th>S. No</th>
                  <th>University</th>
                  <th>Semester</th>
                  <th>Course</th>
                  <th>Status</th>
                </thead>
                <tbody>
                <?php
                $counter = 1 ;
                  foreach ($ret as $r) {
                    printf ("<tr>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>",
                    $counter,
                    $r ['university'],
                    $r ['semester'],
                    $r ['course'],
                    $r ['Quantum_of_the_Content_Submitted_from_Introduction_to_Conclusion'],
                    );
                    $count ++ ;
                  }
                ?>
                </tbody>
              </table>

              <a href="/review_add.php" class="btn btn-primary btn-round text-white" type="button">Add Review</a>
            </div>
            <div class="tab-pane" id="messages1" role="tabpanel">

            </div>
            <div class="tab-pane" id="settings1" role="tabpanel">
              <p>

              </p>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>
<script>
<?php
if (sizeof ($reviewer) > 0) {
  foreach (['faculty', 'designation', 'institution', 'email', 'phone'] as $v) {
      printf ("document.getElementsByName ('%s')[0].value='%s';",$v,$reviewer [0] [$v]);
  }
  foreach (['photo', 'sign'] as $v) {
      printf ("document.getElementById ('%s').src='faculty/%s/%s';",$v,$v,$uid );
      printf ("document.getElementById ('%s-up').classList.add ('d-none');", $v);
      printf ("document.getElementById ('%s').classList.remove ('d-none');", $v);
  }
}
?></script><?php
include 'footer.php';
?>