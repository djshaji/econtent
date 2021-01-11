<?php
include "header.php" ;

?>
<div class="main" style="margin-top:0">
  <div class="section" style="padding:0">
    <div class="alert alert-info mb-0" role="alert">
      <div class="container">
          <i style="vertical-align:-3" class="fa fa-info-circle"></i>
          &nbsp;<strong>Designed by</strong> <br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prof. Shaji Khan
          <a href="https://wa.me/917006351732" type="button" class="btn btn-sm btn-success bmd-btn-fab">
              <span style="font-size: 14;" class="fab fab-whatsapp" data-icon="logos:whatsapp" data-inline="false"></span>
          </a>
          <a href="tel://+917006351732" type="button" class="btn btn-sm btn-danger bmd-btn-fab">
              <i class="fa fa-phone"  style="font-size: 14;" id='fab-phone'></i>
          </a>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">
          <i class="now-ui-icons ui-1_simple-remove"></i>
          </span>
        </button>
        <br>
      </div>
    </div>

    <div class="section p-2">
      <div class="card  p-4">
        <?php var_dump ($_COOKIE) ;?>
      </div>
    </div>
  </div>
</div>
<?php
include "footer.php" ;

?>