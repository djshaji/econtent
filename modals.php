<form enctype="multipart/form-data" method="post" action="post.php?mode=set&prop=unit" class="modal fade" id="topic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="now-ui-icons ui-1_simple-remove"></i>
        </button>
        <h4 class="title title-up">Add Topic</h4>
      </div>
      <div class="modal-body">
      <form>
        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <label for="formGroupExampleInput">Semester</label>
              <select class="btn btn-primary" name="semester" id="semester">
                <?php
                  foreach ($semesters as $s) {
                    printf ("<option value='%s'>%s</option>", $s, $s);
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="formGroupExampleInput">University</label>
              <select class="btn btn-warning" name="university" id="university">
                <?php
                  foreach ($university as $s) {
                    printf ("<option value='%s'>%s</option>", $s, $s);
                  }
                ?>
                
              </select>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="formGroupExampleInput">Course</label><br>
              <select class="btn btn-success" name="course" id="course">
                <?php
                  foreach ($courses as $s) {
                    printf ("<option value='%s'>%s</option>", $s, $s);
                  }
                ?>
                
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <label for="formGroupExampleInput">Unit</label>
              <select class="btn btn-primary" name="unit" id="unit">
                <?php
                  foreach ($units as $s) {
                    printf ("<option value='%s'>%s</option>", $s, $s);
                  }
                ?>
              </select>
            </div>
          </div>
        
          <div class="col-md-5">
            <label>Title of Unit</label><br>
            <textarea class="form-control" placeholder="Title of Unit" name="title"></textarea>
          </div>

          <div class="col-md-5">
            <label>Name of Faculty Member who created the e-Content</label>
            <input class="form-control" name="faculty">
            <label class='mt-2'>Designation</label>
            <input class="form-control" name="designation">
            <label class='mt-2'>Institution</label>
            <input class="form-control" name="institution">
            <label class='mt-2'>Email</label>
            <input class="form-control" name="email">
            <label class='mt-2'>Phone</label>
            <input class="form-control" name="phone">
          </div>
        </div>
      </form>

      </div>
      <div class="modal-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-success m-1">
          <i class="fa fa-plus"></i>  
          Add</button>
        <button type="button" class="btn btn-danger m-1" data-dismiss="modal">
          <i class="fa fa-window-close"></i>
          Close</button>
      </div>
    </div>
  </div>
</form>
<!--  End Modal -->

<form enctype="multipart/form-data" method="post" action="post.php?mode=set&prop=file" class="modal fade" id="file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="now-ui-icons ui-1_simple-remove"></i>
        </button>
        <h4 class="title title-up">Add File</h4>
      </div>
      <div class="modal-body">
      <form>
        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <label for="formGroupExampleInput">Semester</label>
              <select class="btn btn-primary" name="semester" id="semester">
                <?php
                  foreach ($semesters as $s) {
                    printf ("<option value='%s'>%s</option>", $s, $s);
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="formGroupExampleInput">University</label>
              <select class="btn btn-warning" name="university" id="university">
                <?php
                  foreach ($university as $s) {
                    printf ("<option value='%s'>%s</option>", $s, $s);
                  }
                ?>
                
              </select>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="formGroupExampleInput">Course</label><br>
              <select class="btn btn-success" name="course" id="course">
                <?php
                  foreach ($courses as $s) {
                    printf ("<option value='%s'>%s</option>", $s, $s);
                  }
                ?>
                
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <label for="formGroupExampleInput">Unit</label>
              <select class="btn btn-primary" name="unit" id="unit">
                <?php
                  foreach ($units as $s) {
                    printf ("<option value='%s'>%s</option>", $s, $s);
                  }
                ?>
              </select>
            </div>
          </div>
        
          <div class="col-md-5">
            <label>Choose file</label><br>
            <input class="form-control" placeholder="Choose file" name="file" type="file">
            <label class="mt-2">Choose file type</label>
            <select class="form-control" name="filetype">
              <?php
                foreach ($filetypes as $f) {
                  printf ("<option value='%s'>%s</option>", $f, $f);
                }
                ?>
            </select>
          </div>

          <div class="col-md-5">
            <label>Name of Faculty Member who created the e-Content</label>
            <select class="form-control" name="faculty" id='faculty'>

            </select>
            <br>
            <label class="alert alert-warning" id="warning">
              <i class="fas fa-exclamation-circle"></i>
              Add a faculty member before uploading a file.
            </label>
          </div>
        </div>
      </form>

      </div>
      <div class="modal-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-success m-1">
          <i class="fa fa-plus"></i>  
          Upload</button>
        <button type="button" class="btn btn-danger m-1" data-dismiss="modal">
          <i class="fa fa-window-close"></i>
          Close</button>
      </div>
    </div>
  </div>
</form>
<!--  End Modal -->

<form enctype="multipart/form-data" method="post" action="post.php?mode=set&prop=convener" class="modal fade" id="convener" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="now-ui-icons ui-1_simple-remove"></i>
        </button>
        <h4 class="title title-up">Add Convener</h4>
      </div>
      <div class="modal-body">
      <form>
        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <label for="formGroupExampleInput">Semester</label>
              <select class="btn btn-primary" name="semester" id="semester">
                <?php
                  foreach ($semesters as $s) {
                    printf ("<option value='%s'>%s</option>", $s, $s);
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="formGroupExampleInput">University</label>
              <select class="btn btn-warning" name="university" id="university">
                <?php
                  foreach ($university as $s) {
                    printf ("<option value='%s'>%s</option>", $s, $s);
                  }
                ?>
                
              </select>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="formGroupExampleInput">Course</label><br>
              <select class="btn btn-success" name="course" id="course">
                <?php
                  foreach ($courses as $s) {
                    printf ("<option value='%s'>%s</option>", $s, $s);
                  }
                ?>
                
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <!-- <div class="col-md-4">
            <label>Title of Course</label><br>
            <input class="form-control" placeholder="Course Name" name="course-name">
          </div> -->

          <div class="col-md-4">
            <label>Course Code</label><br>
            <input class="form-control" placeholder="Course Code" name="course-code">
          </div>

          <div class="col-md-4">
            <label>Name of Convener</label>
            <input class="form-control" name="faculty">
            <label class='mt-2'>Designation</label>
            <input class="form-control" name="designation">
            <label class='mt-2'>Institution</label>
            <input class="form-control" name="institution">
            <label class='mt-2'>Email</label>
            <input class="form-control" name="email">
            <label class='mt-2'>Phone</label>
            <input class="form-control" name="phone">
          </div>
        </div>
      </form>

      </div>
      <div class="modal-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-success m-1">
          <i class="fa fa-plus"></i>  
          Add</button>
        <button type="button" class="btn btn-danger m-1" data-dismiss="modal">
          <i class="fa fa-window-close"></i>
          Close</button>
      </div>
    </div>
  </div>
</form>
<!--  End Modal -->

<form enctype="multipart/form-data" method="post" action="post.php?mode=edit&prop=unit" class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="now-ui-icons ui-1_simple-remove"></i>
        </button>
        <h4 class="title title-up">Edit Topic</h4>
      </div>
      <div class="modal-body">
      <form>
        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <label for="formGroupExampleInput">Semester</label>
              <select class="btn btn-primary" name="semester" id="semester">
                <?php
                  foreach ($semesters as $s) {
                    printf ("<option value='%s'>%s</option>", $s, $s);
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="formGroupExampleInput">University</label>
              <select class="btn btn-warning" name="university" id="university">
                <?php
                  foreach ($university as $s) {
                    printf ("<option value='%s'>%s</option>", $s, $s);
                  }
                ?>
                
              </select>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="formGroupExampleInput">Course</label><br>
              <select class="btn btn-success" name="course" id="course">
                <?php
                  foreach ($courses as $s) {
                    printf ("<option value='%s'>%s</option>", $s, $s);
                  }
                ?>
                
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <label for="formGroupExampleInput">Unit</label>
              <select class="btn btn-primary" name="unit" id="unit">
                <?php
                  foreach ($units as $s) {
                    printf ("<option value='%s'>%s</option>", $s, $s);
                  }
                ?>
              </select>
            </div>
          </div>
        
          <div class="col-md-5">
            <label>Title of Unit</label><br>
            <textarea class="form-control" placeholder="Title of Unit" name="title"></textarea>
          </div>

          <div class="col-md-5">
            <label>Name of Faculty Member who created the e-Content</label>
            <input class="form-control" name="faculty">
            <label class='mt-2'>Designation</label>
            <input class="form-control" name="designation">
            <label class='mt-2'>Institution</label>
            <input class="form-control" name="institution">
            <label class='mt-2'>Email</label>
            <input class="form-control" name="email">
            <label class='mt-2'>Phone</label>
            <input class="form-control" name="phone">
          </div>
        </div>
      </form>

      </div>
      <div class="modal-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-success m-1">
          <i class="fa fa-plus"></i>  
          Add</button>
        <button type="button" class="btn btn-danger m-1" data-dismiss="modal">
          <i class="fa fa-window-close"></i>
          Close</button>
      </div>
    </div>
  </div>
</form>
<!--  End Modal -->
