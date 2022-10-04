<?php

session_name('resume_maker');
session_start();
error_reporting(0);
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true) {
} else
    header("location:login.php");
include('Processor/Processor.php')
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
                    <a href="login.php" class="btn  login-btn">Login</a>
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
            <form action="#" method="POST" class="pb-1" enctype="multipart/form-data">
                <div class="row px-4 pb-3">
                    <div class="col-md-6 mb-4 px-lg-5">
                        <div class="form-group">
                            <label class="mb-1" for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your name">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 px-lg-5">
                        <div class="form-group">
                            <label class="mb-1" for="">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 px-lg-5">
                        <div class="form-group">
                            <label class="mb-1" for="">Contact</label>
                            <input type="text" class="form-control" name="contact" placeholder="Enter your Contact">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 px-lg-5">
                        <div class="form-group">
                            <label class="mb-1" for="">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter your address">
                        </div>
                    </div>

                    <div class="col-md-6 mb-4 px-lg-5">
                        <div class="form-group">
                            <label class="mb-1" for="">Job Title</label>
                            <input type="text" class="form-control" name="job_title" placeholder="eg Web Developer">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 px-lg-5">
                        <div class="form-group">
                            <label class="mb-1" for="">Job Description</label>
                            <input type="text" class="form-control" name="job_discription" placeholder="discription">
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
                                <input type="text" class="form-control w-75 mb-3" name="skills[]" placeholder="eg Coding">
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
                                <input type="text" class="form-control w-75 mb-3" name="language[]" placeholder="eg English">
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
                        <div class="col-md-6 mb-4 px-lg-5">
                            <div class="form-group">
                                <label class="mb-1" for="">Title</label>
                                <input type="text" class="form-control" name="exp_title[]" placeholder="title">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 px-lg-5">
                            <div class="form-group">
                                <label class="mb-1" for="">Company name</label>
                                <input type="text" class="form-control" name="exp_company_name[]" placeholder="Company name">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 px-lg-5">
                            <div class="form-group">
                                <label class="mb-1" for="">Session</label>
                                <input type="date" class="form-control" name="exp_session[]" placeholder="2018 - 2022">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 px-lg-5">
                            <div class="form-group">
                                <label class="mb-1" for="">Description</label>
                                <textarea name="exp_description[]" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Education -->
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-4">Education</h4>
                        <span id="add_eduction" class="btn btn-sm btn-info">Add Education</span>
                    </div>
                    <div id="education_wrapper" class="row">
                        <div class="col-md-6 mb-4 px-lg-5">
                            <div class="form-group">
                                <label class="mb-1" for="">Institute</label>
                                <input type="text" class="form-control" name="institute[]" placeholder="Agriculture University">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 px-lg-5">
                            <div class="form-group">
                                <label class="mb-1" for="">Degree</label>
                                <input type="text" class="form-control" name="degree[]" placeholder="Computer Science">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 px-lg-5">
                            <div class="form-group">
                                <label class="mb-1" for="">Session</label>
                                <input type="date" class="form-control" name="edu_session[]">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 px-lg-5">
                        </div>
                      
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-block w-100 mb-5">Save Information</button>
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
                <input type="text" class="form-control w-75 mb-3" name="skills[]" placeholder="eg Coding">\
                ')
            })


            $(this).on('click', '#add_language', function() {
                $('#language_wrapper').append('\
                <input type="text" class="form-control w-75 mb-3" name="language[]" placeholder="eg English">\
                ')
            })

            $(this).on('click', '#add_experience', function() {
               $('#experience_wrapper').append('\
                         <div class="col-md-6 mb-4 px-lg-5">\
                            <div class="form-group">\
                                <label class="mb-1" for="">Title</label>\
                                <input type="text" class="form-control" name="exp_title[]" placeholder="title">\
                            </div>\
                        </div>\
                        <div class="col-md-6 mb-4 px-lg-5">\
                            <div class="form-group">\
                                <label class="mb-1" for="">Company name</label>\
                                <input type="text" class="form-control" name="exp_company_name[]" placeholder="Company name">\
                            </div>\
                        </div>\
                        <div class="col-md-6 mb-4 px-lg-5">\
                            <div class="form-group">\
                                <label class="mb-1" for="">Session</label>\
                                <input type="date" class="form-control" name="exp_session[]" placeholder="2018 - 2022">\
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
                                <input type="text" class="form-control" name="institute[]" placeholder="Agriculture University">\
                            </div>\
                        </div>\
                        <div class="col-md-6 mb-4 px-lg-5">\
                            <div class="form-group">\
                                <label class="mb-1" for="">Degree</label>\
                                <input type="text" class="form-control" name="degree[]" placeholder="Computer Science">\
                            </div>\
                        </div>\
                        <div class="col-md-6 mb-4 px-lg-5">\
                            <div class="form-group">\
                                <label class="mb-1" for="">Session</label>\
                                <input type="date" class="form-control" name="edu_session[]">\
                            </div>\
                        </div>\
                        <div class="col-md-6 mb-4 px-lg-5">\
                        </div>\
                ')
            })

        })//end of ready
    </script>
</body>

</html>