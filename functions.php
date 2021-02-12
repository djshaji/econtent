<?php
function input ($name, $label = null, $attribs = '', $help = null) {
  if ($label == null)
    $label = ucwords ($name);
  if ($help == null)
    $show_help = 'd-none';
  printf ('
  <div class="col-md-6">
    <div class="form-group">
      <label>%s 
        <button type="button" class="btn btn-sm btn-success %s" data-container="body" data-original-title="%s" data-toggle="popover" data-placement="top" data-content="%s" >
          <i class="now-ui-icons business_bulb-63"></i>
        </button>
      </label>
      <input name="%s" type="text" value="" placeholder="%s" class="form-control" %s>
    </div>
  </div>',
  $label, $show_help, $label,  $help, $name, $label, $attribs);
}

$slabs  = array (
  "old" => [
    [0, 250000, 0],
    [250001, 500000, 5],
    [500001, 1000000, 20],
    [1000001, 99999999999, 30] # hack!
  ],
  "new" => [
    [0,250000, 0],
    [250001, 500000, 5],
    [500001, 750000, 10],
    [750001, 1000000, 15],
    [1000001, 1250000, 20],
    [1250001, 1500000, 25],
    [1500001, 100000000, 30] # 10 crores!
  ]
);

function get_tax_for_slab ($amount, $regime, $slab) {
  global $regime, $slab ;
  if ($amount > $slab [$regime] [1]) {
    return ($slab [$regime] [3] * $slab [$regime] [2] / 100);
  }

  return ($slab [$regime] [3] * $amount / 100);

}
?>