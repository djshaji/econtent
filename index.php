<?php
include "header.php";

// legacy code
include 'csv.php' ;
$f = parse_csv_file ("https://docs.google.com/spreadsheets/d/1NHxaB5D0FP_NvNpOAJDS4J58R2BTzMjh9slUWAFmE90/export?format=csv", 0, ",", "\n1", " \line ");
$j = json_encode ($f);
$files = array ();
$units = array ();
if (isset ($_GET ['semester']) && isset ($_GET ['university']) && isset ($_GET ['course'])) {
  $sql =  sprintf ("SELECT * FROM content where semester = '%s' and university = '%s' and course = '%s';",
    $_GET ['semester'], $_GET ['university'], $_GET ['course']);
  $ret = $db -> prepare ($sql) ;
  $ret -> execute () ;
  $ret = $ret -> fetchAll ();

  foreach ($ret as $r) {
    for ($i = 1 ; $i <  6; $i ++) {
      $unita = sprintf ("unit_%s", $i);
      $json = json_decode ($r [$unita], true);

      foreach ($json as $topic => $faculty) {
        if (! isset ($units [$i]))
          $units [$i] = array () ;
        $units [$i][$faculty ['faculty']] = $topic ;
      }

      $unit = sprintf ("unit_%s_files", $i);
      $json = json_decode ($r [$unit], true);
      foreach ($json as $type => $array) {
        if (!isset ($files [$type]))
          $files [$type] = array ();
        $array ['unit'] = $i ;
        $files [$type][$i] = $array ;
      }
    }
  }

  // foreach ($units as $u => $a) {
  //   foreach ($a as $faculty => $topic) {
  //     printf ("%s -> %s: %s <br>", $u, $faculty, $topic);
  //   }
  // }

  // var_dump ($units [5]["Shalini Rana"]);
  // foreach ($files as $f => $v)
  //   foreach ($v as $a)
  //     foreach ($a as $s => $g)
  //       var_dump ($s);
}

// end legacy code
?>
<div class="wrapper">
  <div class="page-header clear-filter" filter-color="orange">
    <div class="page-header-image" data-parallax="true" style="background-image:url('./assets/img/header.jpg');">
    </div>
    <div class="container">
      <div class="content-center brand">
        <img class="n-logo" src="./assets/img/now-logo.png" alt="">
        <h1 class="h1-seo"><?php echo $codename ;?></h1>
        <h3><?php echo $description ;?></h3>
      </div>
      <h6 class="category category-absolute">Designed and
        <!-- <a href="http://invisionapp.com/" target="_blank">
          <img src="./assets/img/invision-white-slim.png" class="invision-logo" /> -->
        </a>
          Coded by 
        <strong><span><img width="40px" class="invision-logo" src="assets/img/logo.png"> GDC Udhampur</span></strong>
        </h6>
    </div>
  </div>
</div>
<div class="main">
  <div class="section">

    <div class="container" style="margin-top:-70">
			<div class="row">
				<div class="card card-signup" data-background-color="orange">
					<form class="form" method="" action="">
						<div class="card-header text-center">
							<h3 class="card-title title-up">Faculty Members</h3>
              <h5>Login to upload e-Content</h5>
						</div>
						<!-- <div class="card-body">
						</div> -->
						<div class="card-footer text-center" style="margin-top:-60">
							<a id="upload-btn" href="/login.php" class="btn btn-neutral btn-round btn-lg">Upload e-Content</a>
							<a id="review-btn" href="/review.php" class="btn btn-info btn-round btn-lg">Review e-Content</a>
						</div>
					</form>
				</div>
			</div>
			<!-- <div class="col text-center">
				<a href="examples/login-page.html" class="btn btn-outline-default btn-round btn-white btn-lg" target="_blank">View Login Page</a>
			</div> -->
		</div>  

    <!-- Start hackathon -->
    <!-- <section _ngcontent-iuo-c7="" class="card"><div _ngcontent-iuo-c7="" class="container"><div _ngcontent-iuo-c7="" class="row"><div _ngcontent-iuo-c7="" class="col-md-12"><div _ngcontent-iuo-c7="" class="titleheadertop"><h1 _ngcontent-iuo-c7="" class="h4 alert alert-info" ><b class="">Notification | </b> Smart India Hackathon</h1></div></div></div><div _ngcontent-iuo-c7="" class="row rowmar"><div _ngcontent-iuo-c7="" class="col-md-6"><div _ngcontent-iuo-c7="" class="imagesbox rankingimg iRankingInnovation"><img _ngcontent-iuo-c7="" src="https://www.mic.gov.in/assets/wp_images/images_modi.png"></div></div><div _ngcontent-iuo-c7="" class="col-md-6"><div _ngcontent-iuo-c7="" class="textboxsih"><p _ngcontent-iuo-c7=""><img _ngcontent-iuo-c7="" src="https://www.mic.gov.in/assets/wp_images/quat1.png"></p><div _ngcontent-iuo-c7="" class="grediyant m-2"><h4 _ngcontent-iuo-c7="">I am happy to see young minds thinking about ways to take our nation forward. It is a delight to be among smart innovators of smart India. <span _ngcontent-iuo-c7=""><img _ngcontent-iuo-c7="" src="https://www.mic.gov.in/assets/wp_images/qaut2.png"></span></h4></div></div></div></div></div><div _ngcontent-iuo-c7="" class="container"><div _ngcontent-iuo-c7="" class="row"><div _ngcontent-iuo-c7="" class="col-md-6"><div _ngcontent-iuo-c7="" class="imagestext m-2"><p _ngcontent-iuo-c7="">Smart India Hackathon 2020 is a nationwide initiative to provide students a platform to solve some of the pressing problems we face in our daily lives, and thus inculcate a culture of product innovation and a mindset of problem solving.The last edition of the hackathon saw over 5 million+ students from various colleges compete for the top prize at 65+ locations.In SIH 2020, the students would have the opportunity to work on challenges faced within various Ministries, Departments, Industries, PSUs and NGOs to create world class solutions for some of the top organizations including industries in the world, thus helping the Private sector hire the best minds from across the nation. It can help to:</p><ul _ngcontent-iuo-c7="" class="listpack"><li _ngcontent-iuo-c7=""> Harness creativity &amp; expertise of students</li><li _ngcontent-iuo-c7=""> Spark institute-level hackathons</li><li _ngcontent-iuo-c7=""> Build funnel for ‘Startup India’ campaign</li><li _ngcontent-iuo-c7=""> Crowdsource solutions for improving governance and quality of life</li><li _ngcontent-iuo-c7=""> Provide opportunity to citizens to provide innovative solutions to India’s daunting problems</li></ul><p _ngcontent-iuo-c7="">The first three editions SIH2017, SIH2018 and SIH2019 proved to be extremely successful in promoting innovation, out-of-the-box thinking in young minds, especially engineering students from across India.</p><div _ngcontent-iuo-c7="" class="pracewiner"></div><div _ngcontent-iuo-c7="" class="pracepack"></div></div></div><div _ngcontent-iuo-c7="" class="col-md-6"><div _ngcontent-iuo-c7="" class="video"><iframe _ngcontent-iuo-c7="" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" frameborder="0" height="315" src="https://www.youtube.com/embed/aaycaWJdBTg" width="100%"></iframe></div><div _ngcontent-iuo-c7="" class="boxtext4"><h2 _ngcontent-iuo-c7="" class='m-2'>ANNOUNCMENTS</h2><div _ngcontent-iuo-c7="" class="boxp"><p _ngcontent-iuo-c7=""><a _ngcontent-iuo-c7="" href="https://www.sih.gov.in/SoftwarefinalResult">Software finale results with nodal center</a></p><p _ngcontent-iuo-c7="">Software Hackathon is now rescheduled along with Hardware Hackathon in the month of June or July, 2020.</p></div></div></div></div></div></section>     -->
    <!-- End hackathon -->

    <div class="section">
      <div class="row">
        <!-- Start legacy code -->
        <div class="container">
          <div class="row card shadow border p-2 bg-success text-white">
            <div class="col-12 p-3">
              <h4>
                <?php echo $description;  ?>
              </h4>
              <h6>Courses Uploaded: <?php echo sizeof ($f) ;?></h6>

              <b>Select University</b>
              <div class="col-12 mt-2 mb-3">
                <select class="btn btn-primary" id='university'>
                  <option value="University of Jammu">University of Jammu</option>
                  <option value="GCW Parade (Autonomous)">GCW Parade (Autonomous)</option>
                  <option value="Cluster University Jammu">Cluster University Jammu</option>
                </select>
              </div>
              <b>Select Subject</b>
              <div class="col-12 mt-2 mb-3">
                <select class="btn btn-primary" id='course'>
                  <option>Functional English</option>
                  <option>English Literature</option>
                  <option>General English</option>
                  <option>Communicative English</option>
                  <option>Honours Course 1</option>
                  <option>Honours Course 2</option>
                  <option>Honours Course 3</option>
                </select>
              </div>
              <b>Select Semester</b>
              <div class="col-12 mt-2 mb-3">
                <select class="btn btn-primary" id='semester'>
                  <option value="1">Semester 1</option>
                  <option value="3">Semester 3</option>
                  <option value="5">Semester 5</option>
                </select>
                <a href="javascript: review_open ('/index.php?')" class="btn btn-danger text-white">
                  <i class="fa fa-search"></i>
                  Go
                </a>
              </div>
            </div>
            <!-- <div class="col-2">
              <img src="eContent.png">
            </div> -->
          </div>

          <div class="card row card card-nav-tabs card-plain">
            <div class="card-header card-header-danger col-12">
                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <!-- <ul class="nav nav-tabs" data-tabs="tabs"> -->
                        <?php if (isset ($_GET ['university'])) {?>
                        <ul style="padding:10" class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                        <?php }?>
                        <?php 
                        $active = " active " ;
                        $ac = true;
                        foreach ($files as $type => $array) { 
                          printf (
                            '<li class="nav-item">
                                <a class="nav-link %s" href="#%s" data-toggle="tab">%s</a>
                            </li>', $active, $type, $type);
                            if ($active != '') $active = '';
                         }
                         $active = ' active ';
                         ?>
                        </ul>
                    </div>
                </div>
            </div><div class="card-body ">
                <div class="tab-content text-center">
                <?php foreach ($files as $type => $array) { 
                    printf ('<div class="tab-pane %s" id="%s">
                      <div class="row m-1">',$active, $type);
                      if ($active != '') $active = '';
                    foreach ($array as $unit => $file) {
                        foreach ($file as $filename => $f) {
                      // var_dump ($un);
                      if (sizeof ($f) == 0 || $f ['file'] == '')
                          continue;
                        printf ('
                          <div class="col-md-5 m-3 card">
                            <div class="card-body">
                              <h4 class="card-title">Unit %s: %s</h4>
                              <p class="card-text">%s</p>
                              <a href="uploads/%s/%s/%s/%s/%s" class="btn btn-primary">Open file</a>
                            </div>                      
                          </div>',
                        // $f ['unit'],
                        $unit,
                        // $f ['file'],
                        $units [$unit][$f ['faculty']],
                        $f ['faculty'],
                        $_GET ['university'],
                        $_GET ['semester'],
                        $_GET ['course'],
                        // $f ['unit'],
                        $type,
                        $f ['file']
                      );

                      } 
                    }
                      ?>
                      </div>

                    </div>
                    <?php }?>
            </div>
          </div>

          <a class="btn btn-danger text-white" href="PDF.zip">
            <i class='bx bxs-save'></i>
            Download All</a>
        </div>

        <!-- End legacy code -->
      </div>
    </div>
  </div>
</div>



<script>
ui ("semester").value = '<?php echo $_GET ['semester'] ;?>';
ui ("university").value = '<?php echo $_GET ['university'] ;?>';
ui ("course").value = '<?php echo $_GET ['course'] ;?>';
</script>

<?php
include "footer.php" ;
?>