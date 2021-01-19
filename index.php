<?php
include "header.php";

// legacy code
include 'csv.php' ;
$f = parse_csv_file ("https://docs.google.com/spreadsheets/d/1NHxaB5D0FP_NvNpOAJDS4J58R2BTzMjh9slUWAFmE90/export?format=csv", 0, ",", "\n1", " \line ");
$j = json_encode ($f);

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

    <div class="container">
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
                <select class="btn btn-primary" id='subject'>
                  <option>English</option>
                </select>
              </div>
              <b>Select Semester</b>
              <div class="col-12 mt-2 mb-3">
                <select class="btn btn-primary" id='semester'>
                  <option value="1">Semester 1</option>
                  <option value="3">Semester 3</option>
                  <option value="5">Semester 5</option>
                </select>
                <a href="javascript: set ()" class="btn btn-danger text-white">Go</a>
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
                        <ul style="padding:10" class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                            <li class="nav-item">
                                <a class="nav-link active" href="#home" data-toggle="tab">eContent</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#updates" data-toggle="tab">Video Lectures</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#history" data-toggle="tab">Audio Lectures</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#powerpoint" data-toggle="tab">PPTs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#assessment" data-toggle="tab">Assessments</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#history" data-toggle="tab">Mock Tests</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#history" data-toggle="tab">Ask a Question</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div><div class="card-body ">
                <div class="tab-content text-center">
                    <div class="tab-pane active" id="home">
                      <div class="row m-1">
                        <table class="table table-hover shadow table-bordered border border-dark">
                          <thead>
                            <th>Course</th>
                            <th>Download</th>
                          </thead>
                          <tbody id="tb">
                          </tbody>
                        </table>
                      </div>

                    </div>
                    <div class="tab-pane" id="updates">
                      <div class="row m-1">
                        <!-- <table class="table table-hover shadow table-bordered border border-dark">
                          <thead>
                            <th>Course</th>
                            <th>Download</th>
                          </thead> -->
                          <div class="row" id="tb-video">
                          </div>
                        <!-- </table> -->
                      </div>

                    </div>

                    <div class="tab-pane" id="history">
                    <div class="row m-1">
                        <!-- <table class="table table-hover shadow table-bordered border border-dark">
                          <thead>
                            <th>Course</th>
                            <th>Download</th>
                          </thead> -->
                          <div class="row col-12" id="tb-audio">
                          </div>
                        <!-- </table> -->
                      </div>

                    </div>

                    <div class="tab-pane" id="powerpoint">
                    <div class="row m-1">
                      <div class="row col-12" id="tb-powerpoint">
                      </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="assessment">
                    <div class="row m-1">
                      <div class="row col-12" id="tb-assessment">
                      </div>
                      </div>
                    </div>

                </div>
            </div>
          </div>

          <a class="btn btn-danger text-white" href="PDF.zip">
            <i class='bx bxs-save'></i>
            Download All</a>
        </div>

        <script>
          json = <?php echo $j;?>;
          units = [
            "Unit 1",
            "Unit 2",
            "Unit 3",
            "Unit 4",
            "Unit 5"
          ]

          media = {
            "Upload Assessment (Google Form Link)": "assessment",
            "Upload Video Lecture (Youtube Link)": "video",
            "Upload Audio Lecture ": "audio",
            "Upload Powerpoint Presentation": "powerpoint"
          }
          function set () {
            t = document.getElementById ("tb") ;
            t.innerHTML = ""
            tv = document.getElementById ("tb-video") ;
            tv.innerHTML = ""
            ta = document.getElementById ("tb-audio") ;
            ta.innerHTML = ""
            ts = document.getElementById ("tb-assessment") ;
            ts.innerHTML = ""
            sem = document.getElementById ("semester").value
            uni = document.getElementById ("university").value

            for (j in json) {
              // console.log (j)
              if (json [j] ['Semester'] == sem && json [j]["Name of University"] == uni) {
                tr = document.createElement ("tr")
                tr.innerHTML = 
                  "<td><b>" + json [j] ['Course'] + "</b><br>Convener: " + json [j]["Name of Faculty Member"] + "</td>"  
                if ( json [j] ["Unit 1"].length > 2) {
                  td = document.createElement ("td")
                  td.innerHTML = "<a class='btn btn-danger m-1' href='PDF/" + json [j]["Name of University"] + '/' + json [j]["Semester"] + '/'+ json [j]["Course"] +".pdf'>PDF</a>"
                  for (u of units) {
                    td.innerHTML += "<a href='" + json [j] [u] + '\' class="btn m-1 btn-primary">' + u +'</a>'
                    console.log (td.innerHTML)
                  }
                  tr.appendChild (td)
                  t.appendChild (tr)

                } for ( l in media) {
                  if (json [j][l].length < 2)
                    continue
                  div = document.createElement ("div")
                  div.classList.add ("col-md-6")
                  html = '' ;
                  document.getElementById ("tb-" + media [l]).appendChild (div)
                  switch (media [l]) {
                    default:
                      html = "<a class='btn btn-success m-1' href='" + json [j][l] +"'>Download</a>"
                      break ;
                    case 'video':
                      code = json [j][l].split ("?")[1].split ("&")[0].split ("=")[1]
                      html = '<iframe width="100%" height="80%" src="https://www.youtube.com/embed/' + code + '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
                      break ;
                    case 'audio':
                      html = '<audio style="width:100%" controls src="' + json [j][l] + '" </audio>'
                      break ;
                  }

                  div.innerHTML = 
                      '<div class="card shadow">' +
                        '<div class="card-body">' +
                          '<h5 class="card-title alert alert-success">' + json [j]["Course"] + '</h5>' +
                          '<p class="card-text">' + html +'</p>' +
                          '<a href="javascript: window.open (\'' + json [j][l] +'\')" class="btn btn-primary">Open in App</a>' +
                        '</div>'
                }

              }
            }
          }
          </script>

        <!-- End legacy code -->
      </div>
    </div>
  </div>
</div>

<?php
include "footer.php" ;
?>