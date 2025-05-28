<?php
session_start();

include("../php/config.php");
include '../php/session_handler.php'; // Ensure session timeout handling is included
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

$page_id = 'jett'; // Unique identifier for the page
include("../php/submit_comment.php");
// Ensure the user is logged in
$activePage = 'agents';
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
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../assets/css/fontawesome.css" />
  <link rel="stylesheet" href="../assets/css/style.css" />

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
  <?php $base = '../';
  include '../php/header.php'; ?>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Agents</h3>
          <span class="breadcrumb"><a href="../index.php">Home</a> >
            <a href="../agents.php">Agents</a> > Jett</span>
        </div>
      </div>
    </div>
  </div>

  <div class="single-product section">
    <div class="container-lg">
      <div class="row gy-5">
        <!-- Left Image -->
        <div class="col-lg-6 col-md-12">
          <div class="left-image">
            <img src="../assets/images/Jett_Artwork_Full.webp" alt="Jett Portrait" />
          </div>
        </div>

        <!-- Agent Name & Description -->
        <div class="col-lg-6 col-md-12 align-self-start">
          <div class="agent-name text-left mt-3">
            <h2>Jett</h2>
            <span>Duelist</span>
            <img src="../assets/images/duelist-symbol.webp" alt="Duelist Icon" />
          </div>
          <div class="agent-desc">
            <p>
              Representing her home country of South Korea, Jett's agile and
              evasive fighting style lets her take risks no one else can. She
              runs circles around every skirmish, cutting enemies before they
              even know what hit them.
            </p>
          </div>
        </div>

        <!-- Separator -->
        <div class="col-lg-12">
          <div class="sep"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-lg">
    <div class="row gx-5 align-items-center">
      <!-- Ability Buttons -->
      <div class="col-md-12 col-lg-2 text-center">
        <div class="video-buttons">
          <img
            src="../assets/images/agent-abilities/jett1.webp"
            alt="Cloudburst"
            onclick="showVideo('video1', 'INSTANTLY throw a projectile that expands into a brief vision-blocking cloud on impact with a surface. HOLD the ability key to curve the smoke in the direction of your crosshair.')" />
          <img
            src="../assets/images/agent-abilities/jett2.webp"
            alt="Updraft"
            onclick="showVideo('video2', 'INSTANTLY propel Jett high into the air.')" />
          <img
            src="../assets/images/agent-abilities/jett3.webp"
            alt="Tailwind"
            onclick="showVideo('video3', 'ACTIVATE to prepare a gust of wind for a limited time. RE-USE the wind to propel Jett in the direction she is moving. If Jett is standing still, she propels forward. Tailwind charge resets every two kills.')" />
          <img
            src="../assets/images/agent-abilities/jett4.webp"
            alt="Blade Storm"
            onclick="showVideo('video4', 'EQUIP a set of highly accurate throwing knives. FIRE to throw a single knife and recharge knives on a kill. ALT FIRE to throw all remaining daggers but does not recharge on a kill.')" />
        </div>
      </div>

      <!-- Ability Description -->
      <div class="col-lg-4">
        <div class="video-description" aria-live="polite">
          <h3 id="ability-name">Cloudburst</h3>
          <p>
            INSTANTLY throw a projectile that expands into a brief vision-blocking
            cloud on impact with a surface. HOLD the ability key to curve the
            smoke in the direction of your crosshair.
          </p>
        </div>
      </div>

      <!-- Video Display -->
      <div class="col-lg-6 text-center col-sm-12">
        <div class="video-display">
          <video id="video-placeholder" autoplay muted loop class="w-100">
            <source
              src="https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/3353597819f0c032d56ff947d9762368b4ee6c6b.mp4"
              type="video/mp4" />
            Your browser does not support the video tag.
          </video>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="sep"></div>
    </div>
  </div>


  <div class="container comment-form-section">
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-10">
              <div id="errorcomment" class="message"></div>
              <form class="comment-form" id="add-comment-form">
                <input type="hidden" name="page_id" value="jett">
                <textarea name="comment" id="comment" placeholder="Write your comment here..." required></textarea>
                <button type="submit" id="add-comment">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Comments List Section -->
  <div class="container" id="comments-container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Comments</h3>
        <div id="comments-list"></div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>
          Copyright ©
          <a rel="nofollow" href="https://www.facebook.com/justinedwight.acoba.9" target="_blank" style="color:rgb(248, 161, 161);">Acoba, Dwight</a> &amp;
          <a rel="nofollow" href="https://www.facebook.com/andres.john.425565/" target="_blank" style="color:rgb(248, 161, 161);">Ruadap, Andres</a>. All rights reserved.
          &nbsp;&nbsp;
        </p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/js/custom.js"></script>

  <script>
    window.page_id = "jett";
  </script>
  <script>
    window.agentAbilityData = {
      videos: {
        video1: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/3353597819f0c032d56ff947d9762368b4ee6c6b.mp4",
        video2: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/4cbc968f05713579aae9464c5a16dc3f6863f943.mp4",
        video3: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/ec6b3cf1f8ac09d597b0193de1d7bb81335b40e4.mp4",
        video4: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/667770571300e065b332617e5c8f2e009ed88928.mp4",
      },
      abilityNames: {
        video1: "CLOUDBURST",
        video2: "UPDRAFT",
        video3: "TAILWIND",
        video4: "ULTIMATE: BLADE STORM",
      }
    };
  </script>
  <script src="../assets/js/agent-abilities.js"></script>
</body>

</html>