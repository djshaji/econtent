<?php
include "header.php" ;
?>
<div class="section p-1">
  <div class="container">
    <div class="row"> 
      <blockquote class="blockquote">
        <p class="h4">
          <img src="assets/img/logo.png" width="50">
          
          <span class="lead small alert alert-info p-2">e कलव्य</span>
          <span class='category'>
          Mentorship Programme
          </span>
        </p>
      </blockquote>
    </div>
  </div>

  <div class="container">
    <table class="table table-hover shadow table-bordered border border-dark">
      <thead>
        <th>S. No</th>
        <th>Faculty</th>
        <th>Semester 1</th>
        <th>Semester 3</th>
        <th>Semester 5</th>
      </thead>
      <tbody>
      <?php
        $counter = 1 ;
        for ($k = 1 ; $k < 1960 ; $k = $k + 20) {
          printf ("
            <tr>
              <td>%s</td>
              <td></td>
              <td>%s - %s</td>
              <td>%s - %s</td>
              <td>%s - %s</td>
            </tr>
          ",
          $counter,
          $k, $k + 50,
          $k, $k + 50,
          $k, $k + 50

        );          
        $counter ++ ;
        }
      ?>
      </tbody>
    </table>
  </div>
</div>

<?php
include "footer.php" ;
?>