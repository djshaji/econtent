<?php
include "header.php";
include "db.php";
include "courses.php";

$options = [
  "Very Good",
  "Good",
  "Small Weaknesses",
  "Great Weaknesses",
  "Absolutely Unacceptable"
];

$questions = [
  "Is the topic Content in PDF form Relevant to the Objectives of the  E-Content  and formats Given",
  "Is the topic Content in Audio form Relevant to the Objectives of the  E-Content  and formats Given",
  "Is the topic Content in Video form Relevant to the Objectives of the  E-Content  and formats Given",
  "Is the topic Content in PPT form Relevant to the Objectives of the  E-Content  and formats Given",
  "Is the topic Content in Assessment / Evaulation form Relevant to the Objectives of the  E-Content  and formats Given",
  "The relevance of the Content to the subject/discipline",
  "Quantum of the Content  Submitted from Introduction  to Conclusion",
  "Paedogogical quality, and relevance",
  "Results (novelty, interpretation, discussion etc.)",
  "Discussion (quality and novelty of conclusions and suggestions, etc.)",
  "Readability"
];

$questions_text = [
  "Changes required in Unit 1",
  "Changes required in Unit 2",
  "Changes required in Unit 3",
  "Changes required in Unit 4",
  "Changes required in Unit 5",
  "Remarks"
];

?>
<div class="main" style="margin-top:0">
  <div class="section" style="padding:0">
    <div class="card card-plain">
      <div class="card-body row m-2">
        <div class="col-sm-6 col-lg-3">
          <div class="form-group">
            <label>Select University</label>
            <select class="form-control" id="university">
              <option value="University of Jammu">University of Jammu</option>
              <option value="GCW Parade (Autonomous)">GCW Parade (Autonomous)</option>
              <option value="Cluster University">Cluster University</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="form-group">
            <label>Select Semester</label>
            <select class="form-control" id="semester">
              <option value="1">Semester 1</option>
              <option value="3">Semester 3</option>
              <option value="5">Semester 5</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="form-group">
            <label>Select Course</label>
            <select class="form-control" id="course">
              <?php
                foreach ($courses as $c) {
                  printf ("<option value='%s'>%s</option>", $c, $c);
                }
                ?>
            </select>
          </div>
        </div>
        <div class="col">
          <div>&nbsp;</div>
          <button onclick="review_open ();" class="btn btn-primary btn-round text-white">Add Review</button>
          <button onclick="location.href='/review_add.php';" class="btn btn-info btn-round text-white">Reset</button>

        </div>
      </div>
    </div>


  </div>

<?php if ($_GET ['semester'] && $_GET ['course'] && $_GET ['university']) { ?>
<div class="section" style="padding:0">
  <div class="m-1 table-responsive">
    <table class="table table-hover shadow table-bordered border border-dark">
      <thead>
        <?php foreach ($cols as $co) printf ("<th>%s</th>", $co); ?>
      </thead>
      <tbody>
<?php
    foreach ($semesters as $i) {
      foreach ($university as $u) {
        foreach ($courses as $c) {
          if ($c != $_GET ['course'] || $_GET ['university'] != $u || $_GET ['semester'] != $i)
            continue ;
          $convener = json_decode ($content [$i][$u] [$c]['convener'], true)['faculty'];
          
          // var_dump ($json);
          printf ("<tr>
            <td>%s</td>"
            , $convener);
        
          if ($_GET ['course'] != null && ($_GET ['course'] != $c || $_GET ['university'] != $u || $_GET ['semester'] != $i))
              continue ;
            if ($u != 'Cluster University' && $c[0] == 'H')
              continue ;
            
          foreach ($units as $unit) {
            $un = json_decode ($content [$i][$u] [$c]['unit_' . intval ($unit)], true);
            $un_f = json_decode ($content [$i][$u] [$c]['unit_' . intval ($unit) . '_files'], true);
            
            echo '<td>' ;
            $faculty = array ();
            // foreach ($un as $n) {
            //   foreach($un_f as $type => $array) {
            //     foreach ($array as $a) {
            //       if ($a ['faculty'] == $n ["faculty"])
            //         continue ;
                  
            //     }
            //   }
            // }

            foreach ($un_f as $type => $file) {
              // var_dump ($type);
              printf ("<br><b class='mt-1 alert-danger'>%s</b><br>", $type);
              foreach ($file as $f) {
                if ($f ['file'] == '')
                  continue ;
                printf ("<b>%s</b>:<br>%s<br>", $f ['faculty'], $f ['file']);
              }
            }

            echo '</td>';
          }

          echo '</tr>';

        }
      }

  }
?>

      </tbody>
    </table>
  
  </div>
</div>

<form class="section" style="padding:0">
  <h6 class='alert alert-info'>The following questions require evaluation on a five point scale</h6>
  <div class="m-2 row">
    <?php foreach ($questions as $q) {
      printf ('
      <div class="card card-plain col-md-3" >
        <div class="card-body blockquote blockquote-primary mb-0 p-2">
          <b class="card-title">%s</b>

      ', $q);
      printf ("
        <select class='form-control id='%s' name='%s' required>
          <option value=''>&nbsp;</option>
      ", $q, $q );

      foreach ($options as $o) {
        printf ("
          <option value='%s'>%s</option>
        ", $o, $o);

      }

      echo '</select></div></div>';
    }
    ?>
  </div>
  <h6 class='alert alert-info'>The following questions require text answers</h6>

  <div class="m-2 row">
    <?php foreach ($questions_text as $q) {
      printf ('
      <div class="card card-plain col-md-4" >
        <div class="card-body blockquote blockquote-primary mb-0 p-2">
          <b class="card-title">%s</b>

      ', $q);
      printf ("
        <textarea class='form-control id='%s' name='%s' required></textarea>
      ", $q, $q );

      echo '</div></div>';
    }
    ?>
  </div>

  <div class="row">
    <div class="modal-footer m-3">
      <button type="submit" class="btn btn-round btn-primary"><i class="fas fa-save"></i> Save</button>

    </div>
  </div>
</form>

</div>
<!-- main -->
<?php } ?>
<?php
include "footer.php";
?>