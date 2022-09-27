<?php
include('processor/processor.php');
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Resume Maker</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
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
        <a href="login.php" class="btn  login-btn">Login</a>
      </div>
    </div>
  </nav>
  </div>
  <!-- NAVBAR END -->

  <!-- HEADER START -->
  <div class="container mt-5">
    <div class="row py-5">
      <div class="col-md-6 d-flex justify-content-center align-items-center">
        <div class="ps-5">
          <h1 class="mb-3">The Best Online <br> Resume Maker...</h1>
          <p class="mb-5">If a sheet of paper represents your entire work life,<br> personality, and skills, it better be a pretty amazing piece of paper.</p>
          <a class="header-btn" href="#">Create your Resume Now</a>
        </div>
      </div>
      <div class="col-md-6">
        <img style="width: 80%;" src="assets/images/Resum-Maker-UI-13.png" alt="">
      </div>
    </div>
  </div>
  <!-- HEADER END -->

  <!-- Content -->
<div class="container-fluid my-5 py-5 bg-light how-it-works">
  <h1 class="text-center mb-5" style="font-size: 4rem">How it Works</h1>
  <div class="row px-5">
    <div class="col-md-4 text-center d-flex justify-content-center">
      <span>2</span>
      <h4>choose a template that <br> embodies  your style.</h4>
    </div>
    <div class="col-md-4 d-flex justify-content-center">
      <span>2</span>
      <h4>Start by filling in your <br> resume Detail.</h4>
    </div>
    <div class="col-md-4 d-flex justify-content-center">
      <span>3</span>
      <h4>Download your <br> Resume instantly.</h4>
    </div>
  </div>
</div>

  <div class="container cards my-5">
    <div class="row p-5">
      <div class="col-md-4">
        <div class="card text-center" style="width: 18rem; border:none">
          <img src="assets/images/card.webp" class="card-img-top mx-auto" alt="...">
          <div class="card-body text-center">
            <h5 class="card-title">Choose a Template</h5>
            <p class="card-text">Select a sleek design and layout to get started.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="width: 18rem; border:none">
          <img src="assets/images/type.jpeg" class="card-img-top  mx-auto" alt="...">
          <div class="card-body text-center">
            <h5 class="card-title">Fill all the fields</h5>
            <p class="card-text">Type in a few affective words that match your level.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="width: 18rem; border:none">
          <img src="assets/images/resume-icon-png-2.png"  class="card-img-top  mx-auto" alt="...">
          <div class="card-body text-center">
            <h5 class="card-title">Customize and Download</h5>
            <p class="card-text">Make it truly yours. Uniqueness in a few clicks.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid bg-light my-5">
    <div class="row px-5">
      <div class="col-md-6 d-flex justify-content-between align-items-center">
        <div class="px-5">
          <h1>Proven Template</h1>
          <p>Field-tested resume templates, designed by a team of HR experts and typographers.</p>
        </div>
      </div>
      <div class="col-md-6">
        <img style="width: 100%" src="assets/images/Freshresume_2.gif" alt="">
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <div class="container-fluid text-center p-3 footer">
    <p>© 2022 ZEHRI | All Rights Reserved.</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>