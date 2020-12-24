<?php

$sql =  "SELECT * FROM content ;";
$ret = $db -> prepare ($sql) ;
$ret -> execute () ;
$ret = $ret -> fetchAll ();
$content = array ();
foreach ($ret as $r) {
  if (! isset ($content [$r ['semester']]))
    $content [$r ['semester']] = array ();
  if (! isset ($content [$r ['semester']][$r ["university"]]))
    $content [$r ['semester']][$r ["university"]] = array ();
  if (! isset ($content [$r ['semester']][$r ["university"]][$r ["course"]]))
    $content [$r ['semester']][$r ["university"]][$r ["course"]] = array ();

  $content [$r ['semester']][$r ['university']][$r ['course']] = $r ;
}

// $a = json_decode ($content ["1"]["University of Jammu"]["English Literature"]["unit_1"]);
// foreach ($a as $c => $v) {
//   echo ($c);
// }
// var_dump ($content ['1']['University of Jammu']);

$cols = [
  "Convener",
  "Unit 1",
  // "Unit 1 Compiled by",
  "Unit 2",
  // "Unit 2 Compiled by",
  "Unit 3",
  // "Unit 3 Compiled by",
  "Unit 4",
  // "Unit 4 Compiled by",
  "Unit 5"
  // "Unit 5 Compiled by",
  // "PPTs",
  // "Videos",
  // "Audios",
  // "Actions"
];
?>
<script>
content = <?php echo json_encode ($content);?>;
</script>
<table class="table table-hover shadow table-bordered border border-dark">
  <thead>
    <th>Semester</th>
    <th>University</th>
    <th>Course</th>
    <?php foreach ($cols as $co) printf ("<th>%s</th>", $co); ?>
  </thead>
  <tbody>
<?php
$university = [
  "University of Jammu",
  "Cluster University",
  "GCW Parade (Autonomous)"
];

$courses = [
  "Functional English",
  "General English",
  "English Literature",
  "Communicative English",
  'Honours Course 1',
  'Honours Course 2'
];

$semesters = [1,3,5];
$units = [1,2,3,4,5];
$filetypes = ["PDF", "Word", "PPT", "Video", "Audio"];

foreach ($semesters as $i) {
  printf ("<tr><td class='h5' rowspan='16'>%s&nbsp;
    <span class='badge badge-info'></span>
    </td></tr>", $i);
  foreach ($university as $u) {
    printf ("<tr><td rowspan='5'>%s&nbsp;
    <span class='badge badge-primary'></span>
    </td></tr>", $u);
    foreach ($courses as $c) {
      if ($u != 'Cluster University' && $c[0] == 'H')
        continue ;
        
      $convener = '' ;
      if (isset ($content [$i][$u] [$c]["convener"])) {
          $convener_s = json_decode ($content [$i][$u] [$c]["convener"]);
          if (sizeof ($convener_s) != 0)
            $convener = sprintf (
              "<b>%s</b><br>%s<br>%s<br>%s
              <button class='badge badge-danger' onclick='delete_convener (this);'>
                <i class='fa fa-minus'></i>
              </button>
              ",
              $convener_s -> {'faculty'},
              $convener_s -> {'designation'},
              $convener_s -> {'institution'},
              $convener_s -> {'phone'}
            );
      }
  
      printf ("
        <tr data-semester='%s' data-university='%s' data-course='%s' >
          <td>
            %s
            <span class='badge badge-warning'></span>

          </td>
          <td>%s
          <button class='btn-sm btn text-white btn-success' style='width:100px' data-toggle='modal' data-target='#convener' data-semester='%s' data-university='%s' data-course='%s' data-unit='%s' data-type='topic'>
            <i class='fa fa-plus'></i>  Convener
          </button>


          </td>
      ",
        // for tr
        $i, $u, $c,  
        $c,$convener,
          $i, $u, $c, $k + 1
  
      );

      for ($k = 0 ; $k < sizeof ($units) ; $k ++) {
        $unit = '' ;
        if (isset ($content [$i][$u] [$c]["unit_" . $k + 1])) {
            // var_dump ($content [$i][$u] [$c]["unit_" . intval ($k+1)]);
            $unit_sa = json_decode ($content [$i][$u] [$c]["unit_" . intval ($k + 1)]);
            // var_dump ($unit_sa -> {"BACON"});
            if (sizeof ($unit_sa) != 0)
              foreach ($unit_sa as $topic => $data) {
                // echo $topic ;1
                  $unit .= sprintf (
                    "<b>%s</b><br><label>%s</label><br>%s<br>%s<br>%s
                    <button class='d-none badge badge-danger' onclick='delete_convener (this);'>
                      <i class='fa fa-minus'></i>
                    </button>
                    ",
                    $topic,
                    $data -> {'faculty'},
                    $data -> {'designation'},
                    $data -> {'institution'},
                    $data -> {'phone'}
                  );
              }
        }
  
        $file = '' ;
        if (isset ($content [$i][$u] [$c]["unit_" . $k + 1])) {
            $unit_sa = json_decode ($content [$i][$u] [$c]["unit_" . intval ($k + 1) . '_files']);
            if (sizeof ($unit_sa) != 0)
              foreach ($unit_sa as $filetype => $array) {
                $file .= sprintf ("<br><b class='col'>%s</b>  <br>", $filetype);
                foreach ($array as $a) {
                  $file .= sprintf (
                    "<br><i>%s</i>%s<br>
                    <button class='d-none badge badge-danger' onclick='delete_convener (this);'>
                      <i class='fa fa-minus'></i>
                    </button>
                    ",
                    $a -> {'faculty'},
                    $a -> {'file'}
                  );
                }
              }
        }

        printf (
          '<td>%s
            <div class="container row">
              <div class="col">
                <button class="btn-sm btn text-white btn-success" style="width:100px" data-toggle="modal" data-target="#topic" data-semester="%s" data-university="%s" data-course="%s" data-unit="%s" data-type="topic">
                  <i class="fa fa-plus"></i>  Faculty
                </button>
              </div>
               %s         
              <div class="col">
                <a class="btn-sm btn text-white btn-warning" style="width:100px"  data-toggle="modal" data-target="#file" data-semester="%s" data-university="%s" data-course="%s" data-unit="%s" data-type="topic">
                  <i class="fa fa-plus"></i>  File
                </a>
              </div>
              
            </div>
          </td>',
          $unit,
          //topic button
          $i, $u, $c, $k + 1,

          $file,
          //file button
          $i, $u, $c, $k + 1

        );
      }
      // printf ("<td>
      //   <a class='btn text-white btn-success' style='width:100px'>
      //     <i class='fa fa-save'></i>&nbsp;Save</a>
      // </td>");
      echo "</tr>";
    }

    echo "</tr>";
  }
  echo "</tr>";
}
?>
</tbody>
</table>