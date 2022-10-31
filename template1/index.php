<?php
session_name('resume_maker');
session_start();
error_reporting(0);
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true) {
} else
  header("location:../login.php");

include('../Processor/Processor.php');
$data = $user->getData();
// echo "<pre>" . var_export($data, true) . "</pre>";

if (empty($data['basic_info'][0]))
  header("location:../info.php");

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Resume Maker</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin" />
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" media="print" onload="this.media='all'" />
  <noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" />
  </noscript>
  <link href="css/font-awesome/css/all.min.css?ver=1.2.0" rel="stylesheet" />
  <link href="css/bootstrap.min.css?ver=1.2.0" rel="stylesheet" />
  <link href="css/aos.css?ver=1.2.0" rel="stylesheet" />
  <link href="css/main.css?ver=1.2.0" rel="stylesheet" />
  <noscript>
    <style type="text/css">
      [data-aos] {
        opacity: 1 !important;
        transform: translate(0) scale(1) !important;
      }
    </style>
  </noscript>
</head>

<body id="top">
  <div class="page-content py-5">
    <div class="container html-content" id="resume">
      <div class="cover shadow-lg bg-white">
        <div class="cover-bg p-3 p-lg-4 text-white">
          <div class="row">
            <div class="col-lg-4 col-md-5">
              <div class="avatar hover-effect bg-white shadow-sm p-1">
                <img src="../assets/images/profile<?php echo $data['users'][0]->image ?>" width="200" height="200" />
              </div>
            </div>
            <div class="col-lg-8 col-md-7 text-center text-md-start">
              <h2 class="h1 mt-2 text-capitalize" data-aos="fade-left" data-aos-delay="0"><?php echo $data['users'][0]->name ?></h2>
              <p data-aos="fade-left" data-aos-delay="100"><?php echo $data['basic_info'][0]->title ?></p>
              <div class="d-print-none" data-aos="fade-left" ata-aos-delay="200">
                <button class="btn btn-light text-dark shadow-sm mt-1 me-1" id="download_btn" onclick="CreatePDFfromHTML()">Download CV</button>
              </div>
            </div>
          </div>
        </div>

        <!-- bio and Basic info -->
        <div class="about-section pt-4 px-3 px-lg-4 mt-1">
          <div class="row">
            <div class="col-md-6">
              <h2 class="h3 mb-3">About Me</h2>
              <p>
                <?php echo $data['basic_info'][0]->summary ?>
              </p>
            </div>
            <!-- Basic info -->
            <div class="col-md-5 offset-md-1">
              <div class="row mt-2">
                <div class="col-sm-4">
                  <div class="pb-1">Email</div>
                </div>
                <div class="col-sm-8">
                  <div class="pb-1 text-secondary"> <?php echo $data['users'][0]->email ?></div>
                </div>
                <div class="col-sm-4">
                  <div class="pb-1">Phone</div>
                </div>
                <div class="col-sm-8">
                  <div class="pb-1 text-secondary"><?php echo $data['users'][0]->contact ?></div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- skills and languages -->
        <hr class="d-print-none">
        <div class="skills-section px-3 px-lg-4">
          <div class="row">
            <div class="col-md-6">
              <h2 class="h3 mb-3">Professional Skills</h2>
              <ul>
                <?php
                foreach ($data['skills'] as $value) { ?>
                  <li><?php echo $value->name ?></li>
                <?php
                }
                ?>
              </ul>
            </div>
            <div class="col-md-6">
              <h2 class="h3 mb-3">Languages</h2>
              <ul>
                <?php
                foreach ($data['languages'] as $value) { ?>
                  <li><?php echo $value->name ?></li>
                <?php
                }
                ?>
              </ul>
            </div>
          </div>
        </div>

        <!-- Work Experience -->
        <hr class="d-print-none" />
        <div class="work-experience-section px-3 px-lg-4">
          <h2 class="h3 mb-4">Work Experience</h2>
          <?php
          foreach ($data['experiences'] as $value) { ?>
            <div class="timeline">
              <div class="timeline-card timeline-card-primary card shadow-sm">
                <div class="card-body">

                  <div class="h5 mb-1">
                    <?php echo $value->job_title ?>
                    <span class="text-muted h6">at <?php echo $value->company_name ?></span>
                  </div>
                  <div class="text-muted text-small mb-2">
                    <?php echo $value->session ?>
                  </div>
                  <div>
                    <?php echo $value->description ?>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>

        <!-- Education -->
        <hr class="d-print-none" />
        <div class="page-break"></div>
        <div class="education-section px-3 px-lg-4 pb-4">
          <h2 class="h3 mb-4">Education</h2>
          <?php
          foreach ($data['educations'] as $value) { ?>
            <div class="timeline">
              <div class="timeline-card timeline-card-success card shadow-sm">
                <div class="card-body">
                  <div class="h5 mb-1">
                    <?php echo $value->institue ?>
                  </div>
                  <span class="text-muted h6"><?php echo $value->degree ?></span>
                  <div class="text-muted text-small mt-2"><?php echo $value->session ?></div>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>

      </div>
    </div>
  </div>
  <script src="scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
  <script src="scripts/aos.js?ver=1.2.0"></script>
  <script src="scripts/main.js?ver=1.2.0"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="/scripts/pdf/src/tableHTMLExport.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
  <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>


  <script>
    function CreatePDFfromHTML() {
      $('#download_btn').hide()
      var HTML_Width = $(".html-content").width();
      var HTML_Height = $(".html-content").height();
      var top_left_margin = 15;
      var PDF_Width = HTML_Width + (top_left_margin * 2);
      var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
      var canvas_image_width = HTML_Width;
      var canvas_image_height = HTML_Height;

      var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

      html2canvas($(".html-content")[0]).then(function(canvas) {
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) {
          pdf.addPage(PDF_Width, PDF_Height);
          pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4), canvas_image_width, canvas_image_height);
        }
        pdf.save("Your_PDF_Name.pdf");
        // $(".html-content").hide();
        $('#download_btn').show()

      });
    }
  </script>
</body>

</html>