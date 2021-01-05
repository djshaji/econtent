<?php

$sql =  "SELECT * FROM content ;";
$ret = $db -> prepare ($sql) ;
$ret -> execute () ;
$ret = $ret -> fetchAll ();
$content = array ();
foreach ($ret as $r) {
  // var_dump ($r ['unit_1_files']);
  // die ();
  if (! isset ($content [$r ['semester']]))
    $content [$r ['semester']] = array ();
  if (! isset ($content [$r ['semester']][$r ["university"]]))
    $content [$r ['semester']][$r ["university"]] = array ();
  if (isset ($content [$r ['semester']][$r ["university"]][$r ["course"]]))
    // $content [$r ['semester']][$r ["university"]][$r ["course"]] = array ();

  // if (isset ($content [$r ['semester']][$r ['university']][$r ['course']])) {
    {
    for ($i = 1 ; $i < 6 ; $i ++) {
      $json1 = json_decode ($content [$r ['semester']][$r ['university']][$r ['course']]["convener"] , true);
      $json2 = json_decode ($r["convener"], true) ;
      if ($json1 == null)
        $json1 = array () ;
      if ($json2 == null)
        $json2 = array ();
      // var_dump (array_merge($json1, $json2));
      $content [$r ['semester']][$r ['university']][$r ['course']]["convener"] = json_encode (array_merge ($json1, $json2));

      foreach (['', '_files'] as $prefix) {
        $json1 = json_decode ($content [$r ['semester']][$r ['university']][$r ['course']]["unit_" . $i . $prefix] , true);
        $json2 = json_decode ($r["unit_" . $i . $prefix], true) ;
        if ($json1 == null)
          $json1 = array () ;
        if ($json2 == null)
          $json2 = array () ;
        $content [$r ['semester']][$r ['university']][$r ['course']]["unit_" . $i . $prefix] = json_encode (array_merge ($json1, $json2));
        // var_dump ($r, "<br><br>") ;
        // var_dump ($content [$r ['semester']][$r ['university']][$r ['course']]);
        // die ();
      }
    }
  } 
  else
    $content [$r ['semester']][$r ['university']][$r ['course']] = $r ;
}

// $a = json_decode ($content ["1"]["University of Jammu"]["English Literature"]["unit_1"]);
// foreach ($a as $c => $v) {
//   echo ($c);
// }
// var_dump (json_decode ($content [$_GET ['semester']][$_GET ['university']][$_GET ['course']]['unit_1_files'],true));

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
<?php if ($_GET ['mode'] == null || $_GET ['mode'] == 'report' || $_GET ['mode'] == 'missing') {
?>
<table class="table table-hover shadow table-bordered border border-dark">
  <thead>
    <th>Semester</th>
    <th>University</th>
    <th>Course</th>
    <?php foreach ($cols as $co) printf ("<th>%s</th>", $co); ?>
  </thead>
  <tbody>

<?php
}
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
$faculty = array ();
if ($_GET ['mode'] == 'faculty') {
  ?>
  <table class="table table-hover shadow table-bordered border border-dark">
    <thead>
      <th>Name of Faculty Member</th>
      <th>Phone</th>
      <th>College</th>
      <th>Topics / Units Assigned</th>
      <!-- <th>PDFs</th>
      <th>PPTs</th>
      <th>Videos</th>
      <th>Audios</th> -->
      <?php foreach ($filetypes as $f) printf ("<th>%s</th>", $f) ; ?>
      <th>%age Prepared</th>
    </thead>
    <tbody>
  <?php
  foreach ($semesters as $i) {
    foreach ($university as $u) {
      foreach ($courses as $c) {
        foreach ($units as $unit) {
          $un = json_decode ($content [$i][$u] [$c]['unit_' . intval ($unit)], true);
          // var_dump ($un);
          $un_f = json_decode ($content [$i][$u] [$c]['unit_' . intval ($unit) . '_files'], true);
          foreach ($un_f as $type => $array) {
            foreach ($array as $f) {
              // var_dump ($f );
              if (!isset ($faculty [$f ['faculty']]))
                $faculty [$f ['faculty']] = array () ;
              if (!isset ($faculty [$f ['faculty']][$type]))
                $faculty [$f ['faculty']][$type] = [];
              if (!isset ($faculty [$f['faculty']]['units']))
                $faculty [$f['faculty']]['units'] = 0 ;
              array_push ($faculty [$f ['faculty']][$type], $f ['file']);
              foreach ($un as $z => $zz) {
                if ($zz ['faculty'] == $f ['faculty']) {
                  $faculty [$f['faculty']]['units'] ++ ;
                  if ($zz ['phone'] != '')
                    $faculty [$f['faculty']]['phone'] = $zz['phone'];
                  if ($zz ['email'] != '')
                    $faculty [$f['faculty']]['email'] = $zz['email'];
                  if ($zz ['institution'] != '')
                    $faculty [$f['faculty']]['institution'] = $zz['institution'];
    
                }
              }
            }
          }
  
        }
      }
    }
  }

  // var_dump ($faculty);
  foreach ($faculty as $f => $v) {
    echo '<tr>' ;
    printf ("
      <td>%s</td>
    ", $f);

    foreach (['phone', 'institution', 'units'] as $i) {
      printf ("<td>%s</td>", $faculty [$f][$i]);
    }
    foreach ($filetypes as $a) {
      printf ("<td>%s</td>", sizeof ($faculty [$f][$a]));
    }
    echo '</tr>' ;
  }
}

else if ($_GET ['mode'] == 'report') {
    foreach ($semesters as $i) {
        foreach ($university as $u) {
          foreach ($courses as $c) {
            $convener = json_decode ($content [$i][$u] [$c]['convener'], true)['faculty'];
            
            // var_dump ($json);
            printf ("<tr>
              <td>%s</td>
              <td>%s</td>
              <td>%s</td>
              <td>%s</td>"
              , $i, $u, $c, $convener);
          
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

    
}

else if ($_GET ['mode'] == 'missing') {
  foreach ($semesters as $i) {
      foreach ($university as $u) {
        foreach ($courses as $c) {
          $convener = json_decode ($content [$i][$u] [$c]['convener'], true)['faculty'];
          
          // var_dump ($json);
          printf ("<tr>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>"
            , $i, $u, $c, $convener);
        
          if ($_GET ['course'] != null && ($_GET ['course'] != $c || $_GET ['university'] != $u || $_GET ['semester'] != $i))
              continue ;
            if ($u != 'Cluster University' && $c[0] == 'H')
              continue ;
            
          foreach ($units as $unit) {
            $un = json_decode ($content [$i][$u] [$c]['unit_' . intval ($unit)], true);
            $un_f = json_decode ($content [$i][$u] [$c]['unit_' . intval ($unit) . '_files'], true);
            
            echo '<td>' ;
            $faculty = array ();
            foreach ($un as $n) {
              foreach($un_f as $type => $array) {
                $submitted = false ;
                foreach ($array as $a) {
                  if ($a ['faculty'] == $n ["faculty"])
                    // continue ;
                    $submitted = true ;
                  
                }

                if (! $submitted) {
                  if (! isset ($faculty [$type]))
                    $faculty [$type] = array () ;
                  $faculty [$type][$n ['faculty']] = array () ;
                  $faculty [$type][$n ['faculty']]['faculty'] = $n ['faculty'] ;
                  $faculty [$type][$n ['faculty']]['file'] = ' ';
                }
                  
              }
            }

            foreach ($faculty as $type => $file) {
              // var_dump ($type);
              if ($type != 'PPT' && $type != 'Video')
                continue;
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

  
}

else # normal mode
foreach ($semesters as $i) {
  // printf ("<tr><td class='h5' rowspan='16'>%s&nbsp;
  //   <span class='badge badge-info'></span>
  //   </td></tr>", $i);
  foreach ($university as $u) {
    // printf ("<tr><td rowspan='5'>%s&nbsp;
    // <span class='badge badge-primary'></span>
    // </td></tr>", $u);
    foreach ($courses as $c) {
      if ($_GET ['course'] != null && ($_GET ['course'] != $c || $_GET ['university'] != $u || $_GET ['semester'] != $i))
        continue ;
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
          <td>%s</td>
          <td>%s</td>
          <td>
            %s %s
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
        // sem and uni
        $i, $u,
        $c, $content [$i][$u][$c]['course_code'],
          $convener,
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
                    "<div class='card p-1'>
                    <b>%s</b><br><label>%s</label><br>
                    Designation: %s<br>Institution: %s<br>Phone: %s<br>Email: %s
                    
                      <div class='card-footer text-muted' style='position:absolute;right:-10;top:-30'
                        data-faculty='%s' data-designation='%s' data-phone='%s' data-email='%s' data-title='%s' >
                        <button  class='badge badge-info' data-toggle=\"modal\" data-target=\"#edit\" data-semester=\"%s\" data-university=\"%s\" data-course=\"%s\" data-unit=\"%s\" >
                          <i class='fa fa-edit'></i>
 
                        </button>
                        <button  class='badge badge-danger' onclick='delete_unit (this, \"%s\", \"%s\");'>
                          <i class='fa fa-trash'></i>
                        </button>
                      </div>  
                    </div>
                    ",
                    $topic,
                    $data -> {'faculty'},
                    $data -> {'designation'},
                    $data -> {'institution'},
                    $data -> {'phone'},
                    $data -> {'email'},
                    //for div
                    $data -> {"faculty"},
                    $data -> {"designation"},
                    $data -> {"phone"},
                    $data -> {"email"},
                    $topic,
                    $i, $u, $c, $k + 1,
                    $k + 1,
                    $topic
                  );
              }
        }
  
        $file = '' ;
        if (isset ($content [$i][$u] [$c]["unit_" . $k + 1])) {
            $unit_sa = json_decode ($content [$i][$u] [$c]["unit_" . intval ($k + 1) . '_files']);
            // var_dump ($unit_sa);
            if (sizeof ($unit_sa) != 0)
              foreach ($unit_sa as $filetype => $array) {
                $file .= sprintf ("<br><div class='navbar-nav card p-1'><b class='col p-1 alert alert-danger'>
                  <i class='fa fa-file'></i>
                  %s</b> Click to open <br>", $filetype);
                foreach ($array as $a) {
                  if ($a -> {"file"} == null ) 
                    // var_dump ($a); 
                    continue;
                  $file .= sprintf (
                    "<br>
                    <div class='card card-plain'>
                      <i>%s</i>
                      <button  class='badge badge-danger' onclick='delete_file (this, \"%s\", \"%s\", \"%s\");'>
                        <i class='fa fa-trash'></i>
                      </button><br>
                      <a class='btn btn-sm btn-info' href='uploads/%s/%s/%s/%s/%s'>%s</a><br>
                    </div>
                    ",
                    $a -> {'faculty'},
                    $k + 1,
                    $filetype,
                    $a -> {'file'},
                    $u, $i , $c, $filetype,
                    $a -> {'file'},
                    $a -> {'file'}
                  );

                }

                $file .= '</div>';
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
} # end normal mode
?>
</tbody>
</table>