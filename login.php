<?php
session_name("resume_maker");
session_start();

if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true) {
    header("location: dashboard.php");
}
include('Processor/Processor.php');

$resp = "";
if(isset($_POST['login'])){
  $resp = $auth->login();
}
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
  <main class="p-5 rounded text-white login-wrapper">
    <h1 class="mb-5" style="letter-spacing: 2px">Login</h1>
    <hr class="mb-5">
      <form action="#" method="POST">
        <div class="form-group mb-3">
          <label class="mb-2" for="">Username</label>
          <input type="email" class="form-control" name="email" placeholder="Enter your User Name">
        </div>
        <div class="form-group mb-3">
          <label class="mb-2" for="">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter your User Name">
        </div>
        <div class="text-end">
          <a href="signup.php" class="signup-link">Dont have an Account</a>
        </div>
        <span class=""><?php echo $resp?></span>
        <button type="submit" class="login-btn" name="login">Login</button>
      </form>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>