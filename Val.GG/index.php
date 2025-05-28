<?php
session_start();

include("php/config.php");
include 'php/session_handler.php'; // Ensure session timeout handling is included
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
$activePage = 'home';
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

  <div class="main-banner">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 align-self-center">
          <div class="caption header-text">
            <h6>Welcome to VAL.gg</h6>
            <h2>Road to Radiant</h2>
            <p>
              VAL.gg is the #1 game wiki for Valorant.<br />
              Find out everything you need to know about the game, from agents to maps, and more!
            </p>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6">
          <div class="right-image">
            <img src="assets/images/sova.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Maps -->

  <div class="section trending">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <div class="trending">
              <div class="col-xl-1 col-md-12 text-center">
                <h6>Maps</h6>
              </div>
              <div class="col-xl-6 col-md-12 text-center">
                <h2>Current Rotation</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <div class="main-button">
            <a href="maps.php">View All</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
          <div class="item">
            <div class="thumb">
              <a href="maps/ascent.php"><img
                  src="assets/images/maps.html-images/ascent.webp"
                  alt="" /></a>
            </div>
            <div class="down-content">
              <h4>Ascent</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
          <div class="item">
            <div class="thumb">
              <a href="maps/haven.php"><img
                  src="assets/images/maps.html-images/haven.webp"
                  alt="" /></a>
            </div>
            <div class="down-content">
              <h4>Haven</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
          <div class="item">
            <div class="thumb">
              <a href="maps/fracture.php"><img
                  src="assets/images/maps.html-images/split.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <h4>Split</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
          <div class="item">
            <div class="thumb">
              <a href="maps/icebox.php"><img
                  src="assets/images/maps.html-images/icebox.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <h4>Icebox</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- AGENTS -->
  <div class="container">
    <div class="section most-played">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>Agents</h6>
            <h2>Most Played</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="agents.php">View All</a>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">
          <div class="item">
            <div class="thumb">
              <a href="agents/reyna.php"><img src="assets/images/most-played-char01.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Duelist</span>
              <h4>Reyna</h4>
              <a href="agents/reyna.php">View</a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">
          <div class="item">
            <div class="thumb">
              <a href="agents/jett.php"><img src="assets/images/most-played-char02.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Duelist</span>
              <h4>Jett</h4>
              <a href="agents/jett.php">View</a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">
          <div class="item">
            <div class="thumb">
              <a href="agents/clove.php"><img src="assets/images/most-played-char03.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Controller</span>
              <h4>Clove</h4>
              <a href="agents/clove.php">View</a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">
          <div class="item">
            <div class="thumb">
              <a href="agents/sage.php"><img src="assets/images/most-played-char04.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Sentinel</span>
              <h4>Sage</h4>
              <a href="agents/sage.php">View</a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">
          <div class="item">
            <div class="thumb">
              <a href="agents/omen.php"><img src="assets/images/most-played-char05.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Controller</span>
              <h4>Omen</h4>
              <a href="agents/omen.php">View</a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">
          <div class="item">
            <div class="thumb">
              <a href="agents/cypher.php"><img src="assets/images/most-played-char06.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Sentinel</span>
              <h4>Cypher</h4>
              <a href="agents/cypher.php"> View </a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">
          <div class="item">
            <div class="thumb">
              <a href="agents/raze.php"><img src="assets/images/most-played-char07.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Duelist</span>
              <h4>Raze</h4>
              <a href="agents/raze.php"> View </a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">
          <div class="item">
            <div class="thumb">
              <a href="agents/sova.php"><img src="assets/images/most-played-char08.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Initiator</span>
              <h4>Sova</h4>
              <a href="agents/sova.php"> View </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Footer Start ***** -->
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