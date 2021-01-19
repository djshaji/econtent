<?php
if (php_sapi_name() != "cli") {   
    include 'header.php';
    ?>
    <div class="main card" style="margin-top:0">
      <div class="section m-2 p-2" style="padding:0">
    <?php
}
include 'db.php';

function generate_title ($course, $f, $template = "catalogue.rtf") {
    // var_dump ($course ['"Course Material Prepared by (Include complete information along with namedesignationparent institution and contact information)"']);
    // die ();
    $myfile = fopen ($template, "r") or die ("Cannot open file: " . $f . "\n");
    $contents = '';
    while (!feof ($myfile))
      $contents .= fread ($myfile, 8192);
    fclose ($myfile);
    $contents = str_replace ("UNIVERSITY__", $course ["university"], $contents);
    $contents = str_replace ("COURSE__", $course ["course"] . ' - ' . $course ["course_code"], $contents);
    $contents = str_replace ("SEMESTER__", $course ["semester"], $contents);
    $contents = str_replace ("REVIEWEDBY__", $course ["Reviewer\r"], $contents);
    $preparedby = '';
    $files = '';
    foreach ([1,2,3,4,5] as $unit) {
        $unp = '' ;
        $un = json_decode ($course ["unit_" . $unit], true);
        foreach ($un as $u => $v) {
            $unp .= sprintf ("%s \line %s, %s %s %s \line \line ", $u, $v ['faculty'], $v ['designation'], $v ['institution'], $v ['email'], $v ['phone']);
        }

        $preparedby .= sprintf ("Unit %s \line %s \line \line ", $unit, $unp);
        /*
        $unp = '' ;
        $un = json_decode ($course ["unit_" . $unit . '_files'], true);
        foreach ($un as $u => $v) {
            $type = $u . ' \line ';
            foreach ($v as $name => $array) {
                var_dump ($array);
                $type .= sprintf ("%s: %s \line ", $array ['faculty'], $array ['file']);
            }

            $files .= sprintf ("Unit %s \line %s \line \line ", $unit, $type);
        }
        */

    }
    // echo $preparedby ;
    $size = 0 ;
    $cmd = sprintf ("du -sh 'uploads/%s/%s/%s'", $course ['university'], $course ['semester'], $course ['course']);
    exec ($cmd, $size, $retval);
    // var_dump ($size) ;
    $size = explode ("uploads", $size [0]) [0];
    $convener = json_decode ($course ['convener'], true);
    $contents = str_replace ("__PREPAREDBY__", str_replace ("\n", " \line ", $preparedby . ' \line '. $files), $contents);
    $contents = str_replace ("CONVENER__", sprintf ("%s \line %s \line %s \line Phone:  %s \line \line Size of e-Content: %s", $convener ["faculty"], $convener ["designation"], $convener ["institution"], $convener ["phone"], $size),  $contents);
    $contents = str_replace ('"',"", $contents);
  
    $file = fopen ($f, "w");
    fwrite ($file, $contents);
    fclose ($file);
  }
  
  function generate_title_all () {
    global $f ;
    foreach ($f as $course) {
      $path = sprintf ("eContent/%s/%s/%s/Unit 0.rtf",
        $course ["Name of University"], $course ["Semester"], $course ["Course"]);
      echo "Generating " . $path . "\n";
      generate_title ($course, $path) ;
    }
  
    convert_to_pdf (".rtf");
  }
  
  function generate_certificates () {
    global $f ;
    foreach ($f as $course) {
      $path = sprintf ("eContent/certificates/%s-%s-%s.rtf",
        $course ["university"], $course ["semester"], $course ["course"]);
      echo "Generating " . $path . "\n";
      generate_title ($course, $path, "certificate.rtf") ;
    }
  
    // convert_to_pdf (".rtf");
  }
  
  function download () {
    global $f ;
    foreach ($f as $course) {
      foreach ([1,2,3,4,5] as $unit) {
        if (! isset ($course ['Unit ' . $unit])) {
          printf ("Missing Unit %s in %s Semester %s %s\n", $unit, $course ["Name of University"], $course ["Semester"], $course ["Course"]);
          // var_dump ($course);
          die ();
        }
        $src=  $course ["Unit " . $unit];
        $src = str_replace ("/open", "/uc", $src) . "&export=download";
        // $src = str_replace ("/view?usp=drive_open", "&export=download", $src);
        $dir = sprintf ("eContent/%s/%s/%s", $course ["Name of University"], $course ["Semester"], $course ["Course"]) ;
        $path = sprintf ("eContent/%s/%s/%s/Unit %s.docx",
          $course ["Name of University"], $course ["Semester"], $course ["Course"],$unit);
        $cmd = sprintf ("wget --load-cookies ~/cookie.txt '%s' -c -O '%s'", $src, $path);
        if (! file_exists ($dir))
          mkdir ($dir, 0777, true);
        if (! file_exists ($path)) {
          // echo $cmd . "\n" ;
          printf ("Downloading Unit %s: %s Semester %s %s\n", $unit, $course ["Name of University"], $course ["Semester"], $course ["Course"]);
          passthru ($cmd, $return);
          // exec ($cmd, $output, $return);
          // var_dump ($return) ;
          if ($return != 0) {
            // echo $output ;
            unlink ($path);
            die () ;
          }
        } else {
          printf ("Skipping %s Semester %s %s\n", $course ["Name of University"], $course ["Semester"], $course ["Course"]);
        }
      }
    }
  }
  
  function convert_to_pdf ($ext = ".docx") {
    $glob = glob ("eContent/*/*/*/*" . $ext);
    // var_dump ($glob);
    $total = sizeof ($glob);
    $counter = 1 ;
    foreach ($glob as $g) {
      echo "[" . $counter . ' of ' . $total . '] '. $g . "\n";
      // $pdf = str_replace (".docx", ".pdf", $g);
      $cmd = sprintf ("soffice  --headless --convert-to pdf --outdir '%s' '%s'",
        dirname ($g), $g);
      passthru ($cmd, $return);
      $counter ++ ;
      // var_dump ($return) ;
      if ($return != 0) {
        die () ;
      }
    }
  }
  
  function join_pdf () {
    $glob = glob ("eContent/*/*/*");
    foreach ($glob as $g) {
      // $gl = glob ($g . "/*.pdf") ;
      // $files = '';
      // foreach ($gl as $l) {
      //   $files .= '"' . $l .'" ' ;
      // }
  
      $files = '"'.$g . '/Unit 0.pdf" ' ;
      foreach ([1, 2, 3, 4, 5] as $i) {
        $pdf = sprintf ("/home/djshaji/Desktop/Projects/exam/Unit %s.pdf", $i) ;
        $files .= '"' . $pdf . '" ' ;
        $pdf = sprintf ("%s/Unit %s.pdf", $g, $i) ;
        $files .= '"' . $pdf . '" ' ;
      }
  
      $outdir = str_replace ("eContent", "PDF", $g);
      mkdir ($outdir, 0777, true);
      $outdir = $outdir . '/content' ;
      $cmd = sprintf ("pdfunite %s '%s.pdf'", $files, $outdir);
      echo $cmd . "\n";
      passthru ($cmd, $return);
      // var_dump ($return) ;
      if ($return != 0) {
        var_dump ($g);
        die () ;
      }
    }
  }
  

function zipper () {
    $glob = glob ("uploads/*/*/*", GLOB_ONLYDIR);
    foreach ($glob as $g) {
      $cmd = sprintf ("zip -r '%s.zip' '%s'", $g, $g);
      exec ($cmd, $output, $result);
      var_dump ($output);
    }
}

$sql =  "SELECT * FROM content where semester  = '1';";
$ret = $db -> prepare ($sql) ;
$ret -> execute () ;
$ret = $ret -> fetchAll ();
$f = $ret ;
?>

  </div>
</div>

<?php
$options = getopt ("m:f:");
// var_dump ($options);
switch ($options ["m"]) {
  case 'download':
  default:
    download ();
    break ;
  case "pdf":
    convert_to_pdf ();
    break ;
  case "join":
    join_pdf () ;
  break;
  case "title":
    generate_title_all () ;
  break;
  case "cert":
    generate_certificates () ;
  break;
  case "zip":
      zipper ();
  break;
}
if (php_sapi_name() != "cli") {   
    include 'footer.php' ;
}
?>