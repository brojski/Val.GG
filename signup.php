<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
  $res_Uname = "Sign In";
} else {
  $id = $_SESSION['id'];
  $query = mysqli_query($con, "SELECT*FROM users WHERE Id=$id ");

  while ($result = mysqli_fetch_assoc($query)) {
    $res_Uname = $result['username'];
    $res_Email = $result['email'];
    $res_Age = $result['age'];
    $res_Id = $result['id'];
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />

  <title>VAL.gg</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css" />
  <link rel="stylesheet" href="assets/css/style.css" />

</head>

<body>
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <?php $base = '';
  include 'php/header.php'; ?>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Sign in</h3>
          <span class="breadcrumb"><a href="index.php">Home</a> > Sign in</span>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12 mx-auto text-center">
          <div id="img">
            <img src="assets/images/loginimg.jpg" alt="" />
          </div>
        </div>
        <div class="col-lg-12 mx-auto text-center me-4">
          <div class="right-content">
            <div id="signup-message"></div>
            <form id="signup-form" action="" method="post">
              <p>Username</p>
              <input
                type="text"
                name="username"
                id="username">
              <p>Email</p>
              <input
                type="text"
                name="email"
                id="email"
                required><br>
              <p>Age</p>
              <input
                type="text"
                name="age"
                id="age"
                required><br>
              <p>Password</p>
              <input
                type="password"
                name="password"
                id="password"
                required><br>
              <p>Confirm Password</p>
              <input
                type="password"
                name="confirm_password"
                id="password"
                required><br>
              <button
                type="submit"
                id="form-submit"
                name="submit"
                class="orange-button"
                value="Register"
                required>
                Sign Up
              </button>
              <fieldset>
                <div class="noaccount">
                  <p style="margin-top: 15;">Already have an account?</p>
                  <a href="login.php" style="color:rgb(163, 26, 36)" class="orange-button">Sign In</a>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>
          Copyright © <a rel="nofollow" href="https://www.facebook.com/justinedwight.acoba.9" target="_blank" style="color:rgb(248, 161, 161);">Acoba, Dwight</a> & <a rel="nofollow" href="https://www.facebook.com/andres.john.425565/" target="_blank" style="color:rgb(248, 161, 161);">Ruadap, Andres</a>. All rights reserved.
          &nbsp;&nbsp;
        </p>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/custom.js"></script>
</body>


</html>