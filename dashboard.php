<?php


session_name('resume_maker');
session_start();
error_reporting(0);
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true) {
} else
  header("location:login.php");
include('Processor/Processor.php')

    session_name('resume_maker');
    session_start();
    error_reporting(0);
    if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true) {
    } else
        header("location:login.php");
    include('Processor/Processor.php');

    $user->getData();

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
          <a href="info.php" class="btn  btn-primary me-4">Add Information</a>
          <a href="login.php" class="btn  login-btn">Login</a>
        </div>
      </div>
    </nav>
  </div>
  <!-- NAVBAR END -->

  <h1 class="pt-5 h1 text-center">Choose Template</h1>
  <!-- TEMPLATES -->
  <div class="container  p-5 template-wrapper my-5">
    <a href="template1/index.php">
    <div class="row">
      <div class="col-md-6">
          <img src="assets/images/resume1.PNG" style="width: 80%;" alt="">
        </div>
      <div class="col-md-6 text-center">
          <img src="assets/images/resumeX1.PNG" style="width: 50%;" alt="">
        </div>
      </div>
    </a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>