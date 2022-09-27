<?php
include('Processor/Processor.php')
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Resume Maker | Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/auth.css">
</head>

<body>
<a class="back-btn" href="index.php">Back to Home page</a>
  <main class="p-5 pt-4 rounded text-white signup-wrapper">
    <h1 class="mb-" style="letter-spacing: 2px">Register</h1>
    <hr class="mb-5">
    <form action="#" method="POST" enctype="multipart/form-data">
      <div class="d-flex justify-content-between align-items-center d-flex mb-3">
        <div class="w-50">
          <label class="m" for="">Name</label>
        </div>
        <input type="text" class="form-control" name="name" placeholder="Enter your name">
      </div>
      <div class=" d-flex justify-content-between align-items-center d-flex mb-3">
        <div class="w-50">
          <label class="mb-2" for="">Email</label>
        </div>
        <input type="email" class="form-control" name="email" placeholder="Enter your email">
      </div>
      <div class=" d-flex justify-content-between align-items-center d-flex mb-3">
        <div class="w-50">
          <label class="mb-2" for="">Contact</label>
        </div>
        <input type="text" class="form-control" name="contact" placeholder="Enter your contact">
      </div>
      <div class=" d-flex justify-content-between align-items-center d-flex mb-3">
        <div class="w-50">
          <label class="mb-2" for="">Password</label>
        </div>
        <input type="password" class="form-control" name="password" placeholder="Enter your password">
      </div>
      <div class="d-flex justify-content-between align-items-center d-flex mb-3">
        <div class="w-50">
          <label class="mb-2" for="">Confirm Password</label>
        </div>
        <input type="password" class="form-control" name="confirm_password" placeholder="confirm password">
      </div>
      <div class=" d-flex justify-content-between align-items-center d-flex mb-3">
        <div class="w-50">
          <label class="mb-2" for="">Profile Image</label></label>
        </div>
        <input type="file" class="form-control" name="image">
      </div>
      <div class="text-end">
        <a href="login.php" class="signup-link">Already have an Account</a>
      </div>
      <span class="">the response message</span>
      <button type="submit" class="login-btn">Sign Up</button>
    </form>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>