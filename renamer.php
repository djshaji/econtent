<?php
include "db.php";
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

      // course code
      if (isset ($content [$r ['semester']][$r ['university']][$r ['course']]["course_code"])) {
        if (strpos ($content [$r ['semester']][$r ['university']][$r ['course']]["course_code"], $r ['course_code']) === false)
          $content [$r ['semester']][$r ['university']][$r ['course']]["course_code"] = $content [$r ['semester']][$r ['university']][$r ['course']]["course_code"] . ' ' . $r ['course_code'];
      }
      else
        $content [$r ['semester']][$r ['university']][$r ['course']]["course_code"] =  $r ['course_code'];

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

$rename = array () ;

foreach ($content as $semester => $s_array)  {
    foreach ($s_array as $university => $u_array) {
        foreach ($u_array as $course => $c_array) {
            // printf ("%s %s %s\r\n", $semester, $university, $course );
            $topics = array () ;
            $files = array () ;
            foreach ([1,2,3,4,5] as $unit) {
                $u = json_decode ($c_array ['unit_' . $unit], true);
                $f = json_decode ($c_array ['unit_' . $unit . '_files'], true);

                foreach ($f as $type => $ar) {
                    foreach ($ar as $array) {
                        foreach ($u as $topic => $a) {
                            // die ();
                            if (!isset ($array ['faculty']) || !isset ($a ['faculty'])) {
                                // var_dump ($array) ;
                                // var_dump ($a) ;
                                // die ();
                                continue ;
                            }
                            if ($array ['faculty'] == $a ['faculty']) {
                                // var_dump ($array ["file"]);
                                $src = sprintf ("%s/%s/%s/%s/%s", $university, $semester, $course, $type, $array ['file']);
                                $dest = sprintf ("%s/%s/%s/%s/Unit %s/%s-%s-%s", $university, $semester, $course, $type, $unit, $a ['faculty'], $topic, $array ['file']);
                                $rename [$src] = $dest;
                                // printf ("%s => %s\r\n", $src, $dest);
                            }
                        }
                    }
                }
            }
        }
    }
}

// var_dump ($rename);
$root_src = '/home/djshaji/Desktop/Projects/backup-econtent/uploads/uploads';
$root_dest = '/home/djshaji/Desktop/Projects/backup-econtent/renamed';

foreach ($rename as $src => $dest) {
    if (! file_exists (dirname ($root_dest . '/' . $dest),))
        mkdir (dirname ($root_dest . '/' . $dest), 0777, true);
    echo "Copying " . $src . " ...\n" ;
    copy ($root_src . '/' . $src, $root_dest . '/' . $dest) ;
}

?>