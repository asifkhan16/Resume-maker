<?php

session_name('resume_maker');
session_start();
error_reporting(0);
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true) {
} else
    header("location:login.php");
include('Processor/Processor.php');
$data = $user->getData();

if (isset($_POST['submit'])) {
    $response = $user->updateData();
    // echo "<pre>". var_export($response,true)."</pre>";
    if ($response == 'success')
        header("location:dashboard.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resume Maker | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <style>
        :root {
            --primary-color: #1E4A47;
        }

        .form-wrapper {
            box-shadow: 0px 0px 50px -30px var(--primary-color) !important;
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <div class="navbar-wrapper">
        <nav class="navbar px-5 py-4 navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Resume Maker</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                    <a href="dashboard.php" class="btn  btn-primary me-4">back</a>
                    <?php if (!isset($_SESSION['id'])) { ?>
                        <a href="login.php" class="btn  login-btn">Login</a>
                    <?php } else { ?>
                        <a href="logout.php" class="btn  login-btn">Logout</a>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </div>
    <!-- NAVBAR END -->
    <!-- Content -->
    <main class="bg-ligh p-5">
        <div class="container form-wrapper">
            <h2 class="px-3 pt-3">Enter your inforamation</h2>
            <hr>
            <form action="updateInfo.php" method="POST" class="pb-1" enctype="multipart/form-data">
                <div class="row px-4 pb-3">
                    <div class="col-md-6 mb-4 px-lg-5">
                        <div class="form-group">
                            <label class="mb-1" for="">Title</label>
                            <input required type="text" class="form-control" name="title" placeholder="eg Web Developer" value="<?php echo $data['basic_info'][0]->title ?>">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 px-lg-5">
                        <div class="form-group">
                            <label class="mb-1" for="">Summary</label>
                            <textarea name="summary" id="" class="form-control" placeholder="Summary" rows="2"><?php echo $data['basic_info'][0]->summary ?></textarea>
                        </div>
                    </div>
                    <!-- Skills and Languages  -->
                    <hr>
                    <h4 class="mb-4">Skills and Languages</h4>
                    <div class="col-md-6 mb-4 px-lg-5">
                        <div class="form-group">
                            <div class="mb-1 d-flex justify-content-between align-items-center">
                                <label class="" for="">Professional Skills</label>
                                <span id="add_skill" class="btn btn-sm btn-success"> Add Skill</span>
                            </div>
                            <div id="skills_wrapper">
                                <?php
                                foreach ($data['skills'] as $key => $value) { ?>
                                    <input required type="text" class="form-control w-75 mb-3" name="skills[<?php echo $key ?>]" value="<?php echo $value->name ?>" placeholder="eg Coding">
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 px-lg-5">
                        <div class="form-group">
                            <div class="mb-1 d-flex justify-content-between align-items-center">
                                <label class="" for="">Languages</label>
                                <span id="add_language" class="btn btn-sm btn-success"> Add Language</span>
                            </div>
                            <div id="language_wrapper">
                                <?php
                                foreach ($data['languages'] as $key => $value) { ?>
                                    <input required type="text" class="form-control w-75 mb-3" value="<?php echo $value->name ?>" name="languages[<?php echo $key ?>]" placeholder="eg English">
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Experience -->
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-4">Experience</h4>
                        <span id="add_experience" class="btn btn-sm btn-info">Add Experience</span>
                    </div>
                    <div id="experience_wrapper" class="row">
                        <?php

                        foreach ($data['experiences'] as $key => $value) { ?>

                            <div class="col-md-6 mb-4 px-lg-5">
                                <div class="form-group">
                                    <label class="mb-1" for="">Title</label>
                                    <input required type="text" value="<?php echo $value->job_title ?>" class="form-control" name="job_title[<?php echo $key ?>]" placeholder="title">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 px-lg-5">
                                <div class="form-group">
                                    <label class="mb-1" for="">Company name</label>
                                    <input required type="text" value=" <?php echo $value->company_name ?>" class="form-control" name="company_name[<?php echo $key ?>]" placeholder="Company name">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 px-lg-5">
                                <div class="form-group">
                                    <label class="mb-1" for="">Session</label>
                                    <input required type="text" value="<?php echo $value->session ?>" class="form-control" name="exp_session[<?php echo $key ?>]" placeholder="2018 - 2022">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 px-lg-5">
                                <div class="form-group">
                                    <label class="mb-1" for="">Description</label>
                                    <textarea name="exp_description[<?php echo $key ?>]" class="form-control"><?php echo $value->description ?></textarea>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- Education -->
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-4">Education</h4>
                        <span id="add_eduction" class="btn btn-sm btn-info">Add Education</span>
                    </div>
                    <div id="education_wrapper" class="row">
                        <?php
                        foreach ($data['educations'] as $key => $value) { ?>

                            <div class="col-md-6 mb-4 px-lg-5">
                                <div class="form-group">
                                    <label class="mb-1" for="">Institute</label>
                                    <input required type="text" value=" <?php echo $value->institue ?>" class="form-control" name="institute[<?php echo $key ?>]" placeholder="Agriculture University">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 px-lg-5">
                                <div class="form-group">
                                    <label class="mb-1" for="">Degree</label>
                                    <input required type="text" value="<?php echo $value->degree ?>" class="form-control" name="degree[<?php echo $key ?>]" placeholder="Computer Science">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 px-lg-5">
                                <div class="form-group">
                                    <label class="mb-1" for="">Session</label>
                                    <input required type="text" value="<?php echo $value->session ?>" class="form-control" name="edu_session[<?php echo $key ?>]" placeholder="2018 - 2022">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 px-lg-5">
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <p class="text-danger text-center"><strong><?php echo $response ?></strong></p>
                <input type="submit" name="submit" class="btn btn-primary d-block w-100 mb-5" value="Update Information">
            </form>

        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(this).on('click', '#add_skill', function() {
                $('#skills_wrapper').append('\
                <input required type="text" class="form-control w-75 mb-3" name="skills[]" placeholder="eg Coding">\
                ')
            })


            $(this).on('click', '#add_language', function() {
                $('#language_wrapper').append('\
                <input required type="text" class="form-control w-75 mb-3" name="languages[]" placeholder="eg English">\
                ')
            })

            $(this).on('click', '#add_experience', function() {
                $('#experience_wrapper').append('\
                         <div class="col-md-6 mb-4 px-lg-5">\
                            <div class="form-group">\
                                <label class="mb-1" for="">Title</label>\
                                <input required type="text" class="form-control" name="job_title[]" placeholder="title">\
                            </div>\
                        </div>\
                        <div class="col-md-6 mb-4 px-lg-5">\
                            <div class="form-group">\
                                <label class="mb-1" for="">Company name</label>\
                                <input required type="text" class="form-control" name="company_name[]" placeholder="Company name">\
                            </div>\
                        </div>\
                        <div class="col-md-6 mb-4 px-lg-5">\
                            <div class="form-group">\
                                <label class="mb-1" for="">Session</label>\
                                <input required type="text" class="form-control" name="exp_session[]" placeholder="2018 - 2022">\
                            </div>\
                        </div>\
                        <div class="col-md-6 mb-4 px-lg-5">\
                            <div class="form-group">\
                                <label class="mb-1" for="">Description</label>\
                                <textarea name="exp_description[]" class="form-control"></textarea>\
                            </div>\
                        </div>\
                ')
            })

            $(this).on('click', '#add_eduction', function() {
                $('#education_wrapper').append('\
                <div class="col-md-6 mb-4 px-lg-5">\
                            <div class="form-group">\
                                <label class="mb-1" for="">Institute</label>\
                                <input required type="text" class="form-control" name="institute[]" placeholder="Agriculture University">\
                            </div>\
                        </div>\
                        <div class="col-md-6 mb-4 px-lg-5">\
                            <div class="form-group">\
                                <label class="mb-1" for="">Degree</label>\
                                <input required type="text" class="form-control" name="degree[]" placeholder="Computer Science">\
                            </div>\
                        </div>\
                        <div class="col-md-6 mb-4 px-lg-5">\
                            <div class="form-group">\
                                <label class="mb-1" for="">Session</label>\
                                <input required type="text" class="form-control" name="edu_session[]"  placeholder="2018 - 2022">\
                            </div>\
                        </div>\
                        <div class="col-md-6 mb-4 px-lg-5">\
                        </div>\
                ')
            })

        }) //end of ready
    </script>
</body>

</html>