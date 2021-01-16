<?php
include "header.php";
include "db.php";
?>

<div class="section">
  <div class="container">
    <div class="row">
    <p class="category">e-Content Review Dashboard</p>
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
            <b> <i style="vertical-align: -2" class="now-ui-icons users_single-02" aria-hidden="true"></i>
              Faculty Profile</b>
          </ul>
        </div>
        <div class="card card-plain">
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
                <input name="email" type="text" value="" placeholder="Email" class="form-control">
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div>
                <label class='text-muted'>Click below to save details</label>
                <button class="btn btn-success btn-round" type="button">Save</button>

              </div>
            </div>
          </div>
        </div>

        <div class="card-header">
          <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
            <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home1" role="tab">Reviews</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#messages1" role="tab">Messages</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#settings1" role="tab">Pending</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
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
<?php
include 'footer.php';
?>