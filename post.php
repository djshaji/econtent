<?php
include 'header.php';
// include 'token.php' ;
include 'db.php' ;
// var_dump ($_FILES);
// die ();
$mode = $_GET ['mode'];
// $uid = token_verify ($_SESSION ['token']) ;
// die () ;
if (php_sapi_name() != "cli") {
    if ($uid == null) {
        // echo '
        // <script>
        //     alert ("You are not authorized for this operation. Log in and try again.");
        //     window.history.back();
        // </script>
        // ' ;
        printf ('<script>
        swal ("Unauthorized", "You are not authorized to perform this operation.", "error").then((e)=>{ 
        location.href = "%s"
        })

        </script>', $_SERVER['HTTP_REFERER']);
        die () ;
    }
}

function sql_get ($semester, $university, $course, $col) {
    global $db ;
    $sql = sprintf ("SELECT %s FROM content where semester = '%s' and course = '%s' and university = '%s';",
        $col, $semester, $course, $university);
    $ret = $db -> prepare ($sql) ;
    $ret -> execute () ;
    $ret = $ret -> fetchAll ();
    
    return $ret ;    
}

function sql_exec ($sql) {
    global $db, $_SERVER ;
    try {
        $ret = $db -> query ($sql) ;

    } catch (Exception $e) {
        printf ('<script>
        swal ("Data Not Saved", "Your data could not be added. Try again.\n%s", "error").then((e)=>{ 
        // window.history.back ()
        // alert ("sss")
        location.href = "%s"
        })

        </script>', $e -> errorInfo [2], $_SERVER['HTTP_REFERER']);

    }

    // $ret -> execute () ;
    // var_dump ($ret) ;
    if ($ret)
        printf ('<script>
        swal ("Operation Completed Successfully", "Your operation has been completed successfully", "success").then((e)=>{ 
        // window.history.back ()
        // alert ("sss")
        location.href = "%s"
        })

        </script>', $_SERVER['HTTP_REFERER']);
        
}

function delete_convener () {
    global $_POST, $uid, $db, $_FILES ;
    $sql = sprintf ("UPDATE content SET convener = '' WHERE course = '%s' and university = '%s' and semester = '%s'",
        $_GET ['course'], $_GET ['university'], $_GET ['semester']);
    $uploader = sql_get ($_GET ['semester'], $_GET ['university'], $_GET ['course'], "convener");
    $uploader = json_decode ($uploader[0]["convener"] );
    // var_dump ($uploader);
    if ($uploader -> {"uploader"} != $uid) {
        printf ('<script>
        swal ("Unauthorized", "You are not authorized to perform this operation.", "error").then((e)=>{ 
        location.href = "%s"
        })

        </script>', $_SERVER['HTTP_REFERER']);        
    } else
        sql_exec ($sql);
}

function add_unit () {
    global $_POST, $uid, $db, $_FILES ;
    $uploader = sql_get ($_GET ['semester'], $_GET ['university'], $_GET ['course'], "unit_" . $_POST ['unit']);
    $unit = json_decode ($uploader[0]["unit_" . $_POST ['unit']] );

    if (sizeof  ($unit) == 0)
        $unit = array ();
    $set = array (
        "uploader" => $uid
    );
    foreach (["faculty", 'designation', 'institution', 'email', 'phone'] as $p) {
        $set [$p] = $_POST [$p];
    }

    $unit [$_POST ['title']] = $set ;
    $sql = sprintf ('UPDATE content set unit_%s = \'%s\' where semester = "%s" and university = "%s" and course = "%s";',
        $_POST ['unit'], json_encode ($unit), $_POST ['semester'], $_POST ['university'], $_POST ['course']);

    // echo $sql;
    sql_exec ($sql);
}

function add_file () {
    global $db, $_SERVER, $_FILES, $_POST, $_GET, $uid;
    $files = [];
    foreach ($_FILES as $f => $v) {
        $target_file = sprintf ("uploads/%s/%s/%s/%s/%s",
            $_POST ["university"], $_POST ["semester"], $_POST ["course"], $_POST ["filetype"], $_FILES ["file"]["name"]);
        mkdir (dirname ($target_file), 0777, true);
        // var_dump (error_get_last ());
        if (! move_uploaded_file($_FILES[$f]["tmp_name"], $target_file)) {
            printf ('<script>
            swal ("File not uploaded", "The file could not be uploaded. Try again.", "error").then((e)=>{ 
            location.href = "%s"
            })
    
            </script>',  $_SERVER['HTTP_REFERER']);
    

        }
    }             

    $file = sql_get ($_POST ['semester'], $_POST ['university'], $_POST ['course'], "unit_" . intval ($_POST ["unit"]) . '_files');
    // echo ($file [0]['unit_' . intval ($_POST ['unit']) . '_files']);
    $file = json_decode ($file [0]['unit_' . intval ($_POST ['unit']) . '_files'], true);
    // var_dump($file);
    if ($file == null) {
        $file = array () ;
    } 
    
    if (! isset ($file [$_POST ['filetype']]))
        $file [$_POST ['filetype']] = array ();

    if (! isset ($file [$_POST ['filetype']][$_POST ['unit']]))
        $file [$_POST ['filetype']][$_POST ['unit']] = array ();
    
    $file [$_POST ['filetype']][$_FILES ['file']['name']] = array (
        "file" => $_FILES ['file']['name'],
        "uploader" => $uid,
        'faculty' => $_POST ['faculty']
    ) ;

    $json = json_encode ($file);
    $sql = sprintf ("UPDATE content SET unit_%s_files = '%s' where semester = '%s' and university = '%s' and course = '%s'",
        $_POST ['unit'],$json, $_POST ['semester'], $_POST ['university'], $_POST ['course']);

    // echo 'SQL is', $sql; 
    sql_exec ($sql);

}

function add_convener () {
    global $_POST, $uid, $db, $_FILES ;
    $sql = sprintf ("INSERT INTO content (subject, semester, university, course, course_code, convener) VALUES ('english', '%s', '%s','%s', '%s',",
        $_POST ['semester'], $_POST ['university'], $_POST ['course'], $_POST ['course-code']) ;

    $convener = array (
        "uploader" => $uid
    ) ;
    foreach (["faculty", 'designation', 'institution', 'email', 'phone'] as $p) {
        $convener [$p] = $_POST [$p];
    }

    $sql .= sprintf ("'%s');", json_encode ($convener));
    try {
        $ret = $db -> query ($sql) ;

    } catch (Exception $e) {
        printf ('<script>
        swal ("Data Not Saved", "Your data could not be added. Try again.\n%s", "error").then((e)=>{ 
        // window.history.back ()
        // alert ("sss")
        location.href = "%s"
        })

        </script>', $e -> errorInfo [2], $_SERVER['HTTP_REFERER']);

    }
    // $ret -> execute () ;
    // var_dump ($db) ;
    if ($ret)
        printf ('<script>
        swal ("Operation Completed Successfully", "Your operation has been completed successfully", "success").then((e)=>{ 
        // window.history.back ()
        // alert ("sss")
        location.href = "%s"
        })

        </script>', $_SERVER['HTTP_REFERER']);
    
}

function create_db () {
    global $db, $uid ;
    $sql = 'drop table content ;
        create table content (
            subject text,
            semester text,
            university text,
            course text,
            course_code text,
            convener text,
            unit_1 text,
            unit_1_files text,
            unit_2 text,
            unit_2_files text,
            unit_3 text,
            unit_3_files text,
            unit_4 text,
            unit_4_files text,
            unit_5 text,
            unit_5_files text
    );';

    echo $sql;
    $ret = $db -> prepare ($sql) ;
    $ret -> execute () ;

}

function add_entry () {
    global $_POST, $uid, $db, $_FILES ;
    $timestamp = time () ;

    $prefix = null ;
    if (sizeof ($_FILES)) {
        foreach ($_FILES as $k => $v) {
            $prefix = explode ('-', $k) [0];
            break ;
        }

        $target_dir = "uploads/" . $uid . '/' . $prefix . '/';
        mkdir ($target_dir, 0777, true);
        $files = [];
        foreach ($_FILES as $f => $v) {
            $target_file = $target_dir . $f ;
            array_push ($files, $f);
            $target_file .=  '-'. $timestamp ;
            // echo $target_file;
            // if ($_FILES[$f]["type"] == 'image/jpeg')
            //     $target_file  = $target_file . '.jpg' ;
            // else if ($_FILES[$f]["type"] == 'application/pdf')
            //     $target_file  = $target_file . '.pdf' ;
            if (move_uploaded_file($_FILES[$f]["tmp_name"], $target_file)) {
                // echo "The file ". basename( $_FILES[$f]["name"]). " has been uploaded.";
                // echo ("<script>alert ('Saved information successfully');location.href='/profile.php';</script>");
            } else {
                // echo "Sorry, there was an error uploading your file.";
                printf ('<script>
                swal ("File not uploaded", "The file could not be uploaded. Try again.", "error").then((e)=>{ 
                location.href = "%s"
                })
        
                </script>',  $_SERVER['HTTP_REFERER']);
        
    
            }
        }             
    }

    $cols = 'INSERT INTO ' . $_GET ['module'] . ' (uid';
    $values = 'VALUES ("' . $uid . '"';

    foreach ($_POST as $p => $v) {
        $cols .= ', ' . $p ;
        $values .= ', "' . $v . '"';
    }

    if ($prefix != null) {
        $cols .= ', ' . $prefix ;
        $values .= ', "' . implode ($files, ';') . '"';
    }

    $sql = sprintf ("%s, timestamp) %s, %s);", $cols, $values, $timestamp);
    // $sql = 'INSERT INTO services (uid, category, service, quantity, price) VALUES ("' . $uid . '"';

    // foreach ([
    //     'category',
    //     'service',
    //     'quantity',
    //     'price'
    //     ] as $c)
    //         $sql .= ', "'. $_POST [$c] . '"';
    
    // $sql .= ');';
    // echo $sql;
    // die () ;
    try {
        $ret = $db -> query ($sql) ;

    } catch (Exception $e) {
        // var_dump ();
        printf ('<script>
        swal ("Service Not Saved", "Your service could not be added. Try again.\n%s", "error").then((e)=>{ 
        // window.history.back ()
        // alert ("sss")
        location.href = "%s"
        })

        </script>', $e -> errorInfo [2], $_SERVER['HTTP_REFERER']);

    }
    // $ret -> execute () ;
    // var_dump ($db) ;
    if ($ret)
        printf ('<script>
        swal ("Service Added Successfully", "Your service has been added successfully", "success").then((e)=>{ 
        // window.history.back ()
        // alert ("sss")
        location.href = "%s"
        })

        </script>', $_SERVER['HTTP_REFERER']);

    // echo $sql ;
}
// create_db ();
// add_entry ();

switch ($mode) {
    case 'set':
    default:
        switch ($_GET ["prop"]) {
            case 'convener':
                add_convener ();
                break ;
            case 'unit':
                add_unit ();
                break ;
            case 'file':
                add_file ();
                break ;
            default:
                printf ('<script>
                swal ("No action specified", "Your service could not be added. Try again.\n%s", "error").then((e)=>{ 
                window.history.back ()
                })
        
                </script>');
                    
        }
        break ;
    case 'delete':
        if ($_GET ['semester'] == null || $_GET ['university'] == null || $_GET ['course'] == null) {
            printf ('<script>
            swal ("Incorrect number of arguments", "Incorrect invocation of command", "error").then((e)=>{ 
            location.href = "%s"
            })
    
            </script>', $_SERVER['HTTP_REFERER']);
            die () ;
        }

        switch ($_GET ['prop']) {
            case 'convener':
                delete_convener ();
                break ;
            default:
                printf ('<script>
                swal ("No action specified", "Your service could not be added. Try again.\n%s", "error").then((e)=>{ 
                window.history.back ()
                })
        
                </script>');
                

        }
        break ;
}
// create_db ();
include 'footer.php';
?>
