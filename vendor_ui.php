<?php

$categories = array (
  'Decoration' => false ,
  'Balloons - Rubber/ Foil' => true ,
  'Buntings' => true ,
  'Party Poppers'=> true,
  'Flowers' => true,
  'Shamiana/ Mandap'=> true,
  'Entertainment'=> false,
  'Face Masks'=> true,
  'Sash'=> true,
  'Tattoo/ Mehndi Artist'=> true,
  'Jokers/ Magician'=> true,
  'Photography Props'=> true,
  'Catering'=> false,
  'Cake'=> true,
  'Snacks'=> true,
  'Mithai/ Chocolates'=> true,
  'Tea/ Coffee/ Cold Drink/ Packaged Water'=> true,
  'Lights & Sound'=> true,
  'Photography'=> true,
  'Return Gifts'=> true,
  'Others' => true 
);

$services = array (
    'service' => 'text',
    'category'=> 'text',
    'price'=> 'text',
    'quantity'=> 'text',
    'category' => $categories,
    'photos' => 'file'
) ;
$themes = array (
    'name'=> 'text',
    'price' => 'text',
    'description' => 'text',
    'photos' => 'file'
) ;

$messages = array (
  // "uid" => 'text',
  "sender" => 'text',
  "message" => 'text',
  "photos" => 'file'
);

?>
<script>
var services = "<?php json_encode ($services) ;?>" ;
var themes = "<?php json_encode ($themes) ;?>" ;
var messages = "<?php json_encode ($messages) ;?>" ;
</script>
<?php
function print_service ($table, $cols, $hide_actions = false) {
    global $db, $uid ;
    $files = null ;
    ?>
    <div class="col-md-12">
          <div >
            <div class="d-none card-header card-header-icon card-header-primary" >
            <h4 class="card-title">
              <i style='vertical-align:middle' class="material-icons">extension</i>
              &nbsp;<?php echo ucwords ($table) ;?></h4>
              <!-- <i class="material-icons"></i> -->
            </div>
            <div class="card-content">
              <div class="row">
                <div class="col-md-12">
                  <div class="m-3 table-responsive table-sales">
                    <table class="table table-hover border shadow">
                      <thead>
                        <th>S. No</th>
                        <!-- <th>Service</th>
                        <th>Category</th>
                        <th>Price per item</th>
                        <th>Quantity fulfillable</th> -->
                        <?php
                        foreach ($cols as $c => $v) {
                            if ($v == 'text')
                                printf ("<th>%s</th>", ucwords ($c));
                            else
                                $files = $c ;
                        }
                        ?>
                        <th></th>
                      </thead>

                      <tbody>
                        <!-- <tr>
                          <td>1</td>
                          <td>Flowers</td>
                          <td>Decoration</td>
                          <td>32</td>
                          <td>Any</td>
                        </tr> -->
                        <?php
                        $count = 1 ;
                        $sql = 'select * from ' . $table . ' where uid="' . $uid . '"';
                        // var_dump ($sql);
                        $ret = $db -> prepare ($sql) ;

                        $ret -> execute () ;
                        $ret = $ret -> fetchAll ();
                        // var_dump ($ret);

                        foreach ($ret as $row) {
                          printf ("<tr id='%s-%s'>", $table, $count);
                          printf ("<td>%s</td>", $count) ;
                          foreach ($cols as $c => $v) {
                            if ($v == 'text')
                              printf ("<td id='%s-%s'>%s</td>", $c, $count, $row [$c]);
                            }
                          echo '<td>';
                          if ($files != null )
                            printf (
                              "<button onclick='populate_gallery (\"%s\",\"%s\",\"galleria\", \"%s\")' class='btn btn-sm btn-outline-success'>
                                <i class='material-icons'>photo</i>
                              </button>",
                              $row [$files], $row["timestamp"], $files
                            );
                          printf ("
                              <button onclick='edit_entry (\"%s\", \"%s\")' class='d-none btn btn-sm btn-outline-primary'>
                                <i class='material-icons'>content_copy</i>
                              </button>
                              <button onclick='delete_entry (\"%s\", \"%s\")' class='btn btn-sm btn-outline-danger'>
                                <i class='material-icons'>delete</i>
                              </button>
                            </td>
                          ",$table, $count, $row['timestamp'], $table);

                          echo "</tr>";
                          $count ++ ;

                        }

                        ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- <a class="m-3 justify-align-right btn btn-primary text-white">
                    <i class="material-icons">add_circle</i>
                    Add Service</a> -->
                    <?php if (! $hide_actions) { ?>
                      <button type="button" class="m-3 btn btn-primary" data-toggle="modal" data-target="#<?php echo $table ;?>-add">
                        <i class="material-icons">add_circle</i>                      
                        Add <?php echo ucwords ($table) ;?>
                      </button>
                    <?php }?>

                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
}

function print_service_add ($table, $cols) {
  ?>
  <form enctype="multipart/form-data" class="modal fade" id="<?php echo $table ;?>-add" tabindex="-1" role="dialog" aria-labelledby="<?php echo $table ;?>-add-label" aria-hidden="true"
    method="post" action="post.php?module=<?php echo $table ;?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="<?php echo $table ;?>-add-label">Add <?php echo ucwords ($table) ;?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php
          // var_dump ($cols);
          foreach ($cols as $c => $v) {
            if (gettype ($v) != 'array')
              continue;
            ?>
            <div class="row">
              <div class="col">            
                <select id='<?php echo $table . '-' . $c ;?>' name="<?php echo  $c ;?>" class='btn btn-primary'>
                <?php
                  foreach ($v as $cat => $bool) {
                    $b = '';
                    if (!$bool)
                      $b = 'disabled';
                    if ($bool) {
                      printf ("
                        <option value='%s' %s>%s</option>
                      ",$cat, $b, $cat);
                    }
                  }

                ?>
              </select>   
            </div>
          </div>
          <?php         
          }
          ?>
          <div class="row">
          <?php
            foreach ($cols as $c => $v) {
              if ($v == 'text') {
                ?>
                <div class="col-5">
                  <div class="form-group">
                    <label ><?php echo ucwords ($c) ;?></label>
                    <input name="<?php echo $c ;?>" type="text" class="form-control" id="product-<?php echo $c ;?>" placeholder="<?php echo ucwords ($c) ;?>" required>
                  </div>
                </div>
                <?php
              }
            }
            ?>
            </div>
            <?php

            foreach ($cols as $c => $v) {
              if ($v == 'file') {
                ?>
                <b class="col-7">Add <?php echo ucwords ($c) ;?></b>
                <a href="javascript: add_files ('<?php echo $table . '-'. $c ;?>', '<?php echo $c ;?>')" class="btn btn-sm btn-outline-primary m-2">
                    <i class="material-icons">add_circle</i>
                    Add more <?php echo ucwords ($c) ;?>
                </a>

                <div class="row" id="<?php echo $table . '-'. $c ;?>">
                  <div class="col-5 m-2 form-group btn btn-sm btn-success text-white m-2">
                    <label class="text-white" for="<?php echo $table . '-' . $c ;?>-1">Choose file</label>
                    <input type="file" class="form-control-file" name="<?php echo  $c ;?>-1" id="<?php echo $table . '-' . $c ;?>-1">
                  </div>

                </div>


                <?php
              }
            }
            ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </form>
  <?php
  
}
?>