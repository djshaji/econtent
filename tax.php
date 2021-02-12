<?php
include "header.php" ;
include "functions.php";
if (sizeof ($_POST) == 0)
  $calculate = false ;
else {
  $calculate = true ;
  
}
?>
<ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
  <li class="nav-item">
  <a class="nav-link active" data-toggle="tab" href="#old" role="tab">Old Tax Regime</a>
  </li>
  <li class="nav-item">
  <a class="nav-link" data-toggle="tab" href="#new" role="tab">New Tax Regime</a>
  </li>
</ul>
<div class="tab-content text-center">
<div class="section p-0 tab-pane active" id="old">
  <div class="container">
    <div class="row">
    <!-- <p class="category">Income Tax Calculator</p> -->
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
            <b> <i style="vertical-align: -2" class="now-ui-icons users_single-02" aria-hidden="true"></i>
              Old Regime Tax Calculator</b>
          </ul>
        </div>

        <div class="card-body">
          <form class="card card-plain" method="post" action="post.php?mode=set&prop=reviewer" enctype="multipart/form-data">
            <h5 class="alert alert-info">Income</h5>
            <div class="row m-2">
              <?php
              input ("gross", "Gross Salary", "required");
              input ("other", "Income from other sources");
              ?>
            </div>
            <h5 class="alert alert-info">Exemptions</h5>
            <div class="row m-2">
              <?php
                input ("mediclaim", "Mediclaim Policy u/s 80D (Max 20,000 + 5,000)");
                input ("housing", "Interest on Housing Loan u/s 24 (Max upto 2,00,000)" );
                input ("hra", "HRA u/s 10 (13A)", "", "1. Actual HRA Recieved   2. Rent paid less 10% of salary (Basic pay in academic level)    3. 40% of total income (Conditions apply)  Least of 1,2,3 is exempted");
                input ("donations", "Donations u/s 80G" );
              ?>
              <div class="row col-12">
                <h5 class="btn-danger p-2 m-2">Total Salary: </h5>              
              </div>
            </div>
            <h5 class="alert alert-info">Deductions u/s 80C, 80CCC, 80CCD etc.</h5>
            <div class="row m-2">
              <?php
                input ("gpf", "GPF");
                input ("ppf", "PPF");
                input ("lic", "LIC/ULIP/PLI/SLIP/Gr. Ins./Insurance Premium");
                input ("nsc", "NSC");
                input ("housing-principal", "Housing Loan (Principal Amount)");
                input ("term", "Term Deposit");
                input ("tuition", "Tuition Fee");
              ?>
              <div class="col-6">
                <!-- u20b9 -->
                <p class="bold btn-outline-success">Total (Max. ₹ 1.50 Lakh)</p>            
              </div>            
              <div class="col-6">
                <p class="bold btn-outline-info">
                  <i class="fa fa-check" aria-hidden="true"></i>
                
                Standard Deduction: ₹ 50, 000</p>            
              </div>            
              <div class="row col-12">
                <h5 class="btn-danger p-2 m-2">Total Deduction: </h5>              
              </div>
              <div class="row col-12">
                <h5 class="btn-success p-2 m-2">Taxable Income: </h5>              
              </div>
            </div>
            <h5 class="alert alert-info">Tax Paid till now</h5>
            <div class="row m-2">
              <?php
                input ("paid", "Tax Paid");
              ?>
            </div>
            <h5 class="alert alert-info col-12">Income Tax to be Paid</h5>
            <div class="row m-2">
              <table class="table table-hover table-bordered border border-dark">
                <tbody>
                  <tr>
                    <td>Income Tax upto ₹ 2,50,000</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Tax from ₹ 2,50,001 to ₹ 5,00,000</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Tax from ₹ 5,00,001 to ₹ 10,00,000</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Tax above ₹ 10,00,000</td>
                    <td></td>
                  </tr>
                  <tr class="alert alert-warning">
                    <td>Total Income Tax</td>
                    <td ><b >₹</b></td>
                  </tr>
                  <tr>
                    <td>Rebate under section 87/A</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Health and Education Cess on total tax @ 4%</td>
                    <td></td>
                  </tr>
                  <tr class="alert alert-success">
                    <td>
                      <!-- <i style="vertical-align:-3" class="now-ui-icons travel_info"></i> -->
                      Total Tax Payable</td>
                    <td ><b >₹</b></td>
                  </tr>
                  <tr>
                    <td>Tax Paid till now</td>
                    <td></td>
                  </tr>
                  <tr class="alert alert-danger h5">
                    <td>
                      <i style="vertical-align:-3" class="now-ui-icons travel_info"></i>
                      Total Tax Payable</td>
                    <td ><h5 >₹</h5></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <button type="submit" class="btn btn-primary m-2">Calculate Tax</button>
          </form>
        </div>

      </div>

    </div>

  </div>
</div>

<div class="section p-0 tab-pane active" id="new">
  <div class="container">
    <div class="row">
    <!-- <p class="category">Income Tax Calculator</p> -->
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
            <b> <i style="vertical-align: -2" class="now-ui-icons users_single-02" aria-hidden="true"></i>
              New Regime Tax Calculator</b>
          </ul>
        </div>

        <div class="card-body">
          <form class="card card-plain" method="post" action="post.php?mode=set&prop=reviewer" enctype="multipart/form-data">
            <h5 class="alert alert-info">Income</h5>
            <div class="row m-2">
              <?php
              input ("gross", "Gross Salary", "required");
              input ("other", "Income from other sources");
              ?>
            </div>
            <h5 class="alert alert-info">Exemptions</h5>
            <div class="row m-2">
              <?php
                input ("deduct-80ccd", "Less Deduction under Sec 80CCD NPS (Max ₹ 50,000)");
                input ("children-education-allowance", "Exemption for Children Education Allowance @ ₹ 100 / child / month" );
                input ("children-hostel-allowance", "Exemption for Hostel Expenditure Allowance @ ₹ 300 / child / month" );
                input ("deduct-other", "Any other deduction" );
              ?>
              <div class="row col-12">
                <h5 class="btn-danger p-2 m-2">Total Taxable Income: </h5>              
              </div>
            </div>
            <h5 class="alert alert-info">Tax Paid till now</h5>
            <div class="row m-2">
              <?php
                input ("paid", "Tax Paid");
              ?>
            </div>
            <h5 class="alert alert-info col-12">Income Tax to be Paid</h5>
            <div class="row m-2">
              <table class="table table-hover table-bordered border border-dark">
                <tbody>
                  <tr>
                    <td>Income Tax upto ₹ 2,50,000</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Tax from ₹ 2,50,001 to ₹ 5,00,000</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Tax from ₹ 5,00,001 to ₹ 7,50,000</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Tax from ₹ 7,50,001 to ₹ 10,00,000</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Tax from ₹ 10,00,001 to ₹ 12,50,000</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Tax from ₹ 12,50,001 to ₹ 15,00,000</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Tax above ₹ 15,00,000</td>
                    <td></td>
                  </tr>
                  <tr class="alert alert-warning">
                    <td>Total Income Tax</td>
                    <td ><b >₹</b></td>
                  </tr>
                  <tr>
                    <td>Rebate under section 87/A</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Health and Education Cess on total tax @ 4%</td>
                    <td></td>
                  </tr>
                  <tr class="alert alert-success">
                    <td>
                      <!-- <i style="vertical-align:-3" class="now-ui-icons travel_info"></i> -->
                      Total Tax Payable</td>
                    <td ><b >₹</b></td>
                  </tr>
                  <tr>
                    <td>Tax Paid till now</td>
                    <td></td>
                  </tr>
                  <tr class="alert alert-danger h5">
                    <td>
                      <i style="vertical-align:-3" class="now-ui-icons travel_info"></i>
                      Total Tax Payable</td>
                    <td ><h5 >₹</h5></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <button type="submit" class="btn btn-primary m-2">Calculate Tax</button>
            
          </form>
        </div>
      </div>
    </div>
  </div>


</div>

<!-- tabs -->
</div>
<?php 
if (!$calculate) {
  ?>
  <script>
  for (i of document.getElementsByClassName ("col-12")) i.classList.add ("d-none");  
  for (i of document.getElementsByTagName ("table")) i.classList.add ("d-none")

  </script>
  <?php
}

include "footer.php" ;
?>
<script>
document.getElementsByClassName ("navbar-nav")[0].classList.add ("d-none");
</script>