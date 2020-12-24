<?php
include "header.php";
include "vendor_ui.php";

?>

<!-- <script src="/assets/js/galleria.min.js"></script> -->
<script src="vendor.js"></script>

<div class="main main-raised mt-3">
  <div class="section section-basic">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-icon card-header-primary" >
            <h4 class="card-title">
              <i style='vertical-align:middle' class="material-icons"></i>
              &nbsp;Global Sales by Top Locations</h4>
              <!-- <i class="material-icons"></i> -->
            </div>
            <div class="card-content">
              <div class="row">
                <div class="col-md-5">
                  <div class="table-responsive table-sales">
                                      <table class="table">
                                          <tbody>
                                              <tr>
                                                  <td>
                                                      <div class="flag">
                                                        <i class='material-icons'>attach_money<i>

                                                    </div></td>
                                                  <td>USA</td>
                                                  <td class="text-right">
                                                      2.920
                                                  </td>
                                                  <td class="text-right">
                                                      53.23%
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td>
                                                      <div class="flag">
                                                      <i class='material-icons'>attach_money<i>
                                                  </div></td>
                                                  <td>Germany</td>
                                                  <td class="text-right">
                                                      1.300
                                                  </td>
                                                  <td class="text-right">
                                                      20.43%
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td>
                                                      <div class="flag">
                                                      <i class='material-icons'>attach_money<i>
                                                  </div></td>
                                                  <td>Australia</td>
                                                  <td class="text-right">
                                                      760
                                                  </td>
                                                  <td class="text-right">
                                                      10.35%
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td>
                                                      <div class="flag">
                                                      <i class='material-icons'>attach_money<i>
                                                  </div></td>
                                                  <td>United Kingdom</td>
                                                  <td class="text-right">
                                                      690
                                                  </td>
                                                  <td class="text-right">
                                                      7.87%
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td>
                                                      <div class="flag">
                                                      <i class='material-icons'>attach_money<i>
                                                  </div></td>
                                                  <td>Romania</td>
                                                  <td class="text-right">
                                                      600
                                                  </td>
                                                  <td class="text-right">
                                                      5.94%
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td>
                                                      <div class="flag">
                                                      <i class='material-icons'>attach_money<i>
                                                  </div></td>
                                                  <td>Brasil</td>
                                                  <td class="text-right">
                                                      550
                                                  </td>
                                                  <td class="text-right">
                                                      4.34%
                                                  </td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                </div>
                <div class="col-md-6 col-md-offset-1">
                  <?php include 'world-map.php' ;?>
                </div>

              </div>
            </div>
          </div>
    
  <!-- website views -->

  
        </div>        
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-primary" data-background-color="orange">
              <p class="lead">
              <i style='vertical-align:middle' class="material-icons">weekend</i>
                
              Bookings</p>
            </div>
            <div class="card-content">
              <h3 class="card-title ml-5">184</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
              <i class="material-icons text-success">info</i> <a href="#pablo"> Updated Now</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info" data-background-color="orange">
              <p class="lead">
              <i style='vertical-align:middle' class="material-icons">store</i>
                
              Revenue</p>
            </div>
            <div class="card-content">
              <h3 class="card-title ml-5">₹ 10,002</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-success">info</i> <a href="#pablo"> Updated Now</a>
              </div>
            </div>
          </div>
          
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning" data-background-color="orange">
              <p class="lead">
              <i style='vertical-align:middle' class="material-icons">equalizer</i>
                
              Incoming Orders</p>
            </div>
            <div class="card-content">
              <h3 class="card-title ml-5">12</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-success">info</i> <a href="#pablo"> Updated 2 min ago</a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success" data-background-color="orange">
              <p class="lead">
              <i style='vertical-align:middle' class="material-icons">equalizer</i>
                
              Profile Views</p>
            </div>
            <div class="card-content">
              <h3 class="card-title ml-5">9928</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">warning</i> <a href="#pablo">Get More Space...</a>
              </div>
            </div>
          </div>

        </div>

      </div>

      <!-- My products start -->
      <div class="card card-nav-tabs card-plain">
        <div class="card-header card-header-primary">
            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#home" data-toggle="tab">
                              <i class="material-icons">miscellaneous_services</i>
                              My Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#updates" data-toggle="tab">
                             <i class="material-icons">color_lens</i>
                              My Themes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#messages" data-toggle="tab">
                             <i class="material-icons">chat</i>
                              Messages
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><div class="card-body ">
            <div class="tab-content text-center">
                <div class="tab-pane active" id="home">
                  <?php print_service ("services", $services) ;?>

                </div>
                <div class="tab-pane" id="updates">
                  <?php print_service ("themes", $themes) ;?>

                </div>
                <div class="tab-pane" id="messages">
                  <?php print_service ("messages", $messages, true) ;?>

                </div>
            </div>
        </div>
      </div>

      <!-- My products end -->

    </div>
  </div>

</div>
<?php
include 'footer.php';
?>

<form enctype="multipart/form-data" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
  method="post" action="post.php">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="token">
        <b>Select Category</b>
        <div class="row">
          <div class="col">
            <select id='product-category' name="category" class='btn btn-primary'>
              <?php
                foreach ($categories as $cat => $bool) {
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
        <br>

        <b class='mt-4'>Enter Product Details</b>
        <div class="row">
          <div class="col-5">
            <div class="form-group">
              <label for="inputAddress">Service</label>
              <input name="service" type="text" class="form-control" id="product-service" placeholder="Flowers" required>
            </div>
          </div>
          <div class="col-5">
            <div class="form-group">
              <label for="inputAddress">Price per item</label>
              <input name="price" required type="text" class="form-control" id="product-price" placeholder="200">
            </div>
          </div>
          <div class="col-2">
            <div class="form-group">
              <label for="inputAddress">Quantity Fulfillable</label>
              <input name="quantity" required type="text" class="form-control" id="product-quantity" placeholder="Any">
            </div>
          </div>
        </div>

        <div class="row">
          <b class="col-7">Add photos</b>
          <button onclick="add_files ()" class="btn btn-sm btn-outline-primary">
              <i class="material-icons">add_circle</i>
              Add more files
          </button>

        </div>
        
        <div class="row" id="photo-files">
          <div class="col-5 m-2 form-group btn btn-sm btn-success text-white">
            <label class="text-white" for="photos-1">Choose file</label>
            <input type="file" class="form-control-file" name="photos-1" id="photos-1">
          </div>

        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</form>

<script>
    // (function() {
    //     Galleria.loadTheme('https://cdnjs.cloudflare.com/ajax/libs/galleria/1.6.1/themes/classic/galleria.classic.min.js');
    //     Galleria.run('.galleria');
    // }());
</script>

<div class="modal fade" id="modal-gallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div  class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" id="galleria-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Gallery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="height:250%" class="modal-body galleria col-10" id="galleria">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<?php
  print_service_add ("services", $services);
  print_service_add ("themes", $themes);
  // print_service_add ("messages", $messages);
?>

<style>
.galleria-theme-classic{
  background-color:lightgray;
  color: black ;
}
</style>

<script>
Galleria.loadTheme('https://cdnjs.cloudflare.com/ajax/libs/galleria/1.6.1/themes/miniml/galleria.miniml.min.js');
Galleria.configure({
    // imageCrop: true,
    thumbCrop: false,
    imageCrop: false,
    carousel: true,
    imagePan: false,
    transition: 'pulse',
    overlayBackground: "#ffffff"
});
Galleria.run (".galleria")

</script>