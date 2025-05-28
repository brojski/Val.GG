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

$page_id = 'waylay'; // Unique identifier for the page
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
            <a href="../agents.php">Agents</a> > Waylay</span>
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
            <img src="../assets/images/Waylay_Artwork_Full.webp" alt="Waylay Portrait" />
          </div>
        </div>

        <!-- Agent Name -->
        <div class="col-lg-6 col-md-12 align-self-start">
          <div class="agent-name text-left mt-3">
            <h2>Waylay</h2>
            <span>Duelist</span>
            <img
              src="../assets/images/duelist-symbol.webp"
              alt="Duelist Icon" />
          </div>

          <!-- Agent Description -->
          <div class="agent-desc">
            <p>
              Thailand's prismatic radiant Waylay transforms into light itself as she darts across the battlefield, striking down her targets through shards of light before flitting back to safety, all in the blink of an eye.
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
      <div class="col-md-12 col-lg-2 text-center">
        <div class="video-buttons">
          <!-- Ability Buttons -->
          <img
            src="../assets/images/agent-abilities/waylay1.webp"
            alt="Saturate"
            onclick="showVideo('video1', 'INSTANTLY throw a cluster of light that explodes upon contact with the ground, Hindering nearby players with a powerful movement and weapon slow.')" />
          <img
            src="../assets/images/agent-abilities/waylay2.webp"
            alt="Dash"
            onclick="showVideo('video2', 'EQUIP to prepare for a burst of speed. FIRE to dash forward twice. ALT FIRE to dash once. Only your first dash can send you upward.')" />
          <img
            src="../assets/images/agent-abilities/waylay3.webp"
            alt="Light Beacon"
            onclick="showVideo('video3', 'INSTANTLY create a beacon of light on the floor. REACTIVATE to speed back to your beacon as a mote of pure light. You are invulnerable as you travel.')" />
          <img
            src="../assets/images/agent-abilities/waylay4.webp"
            alt="Prismatic Focus"
            onclick="showVideo('video4', 'EQUIP to focus your prismatic power. FIRE to create an afterimage of yourself that projects a beam of light. After a brief delay, you gain a powerful speed boost and the beam expands, Hindering other players in the area.')" />
        </div>
      </div>
      <div class="col-lg-4">
        <div class="video-description" aria-live="polite">
          <h3 id="ability-name">Saturate</h3>
          <p>
            INSTANTLY throw a cluster of light that explodes upon contact with the ground, Hindering nearby players with a powerful movement and weapon slow.
          </p>
        </div>
      </div>
      <div class="col-lg-6 text-center col-sm-12">
        <div class="video-display">
          <video id="video-placeholder" autoplay muted loop class="w-100">
            <source
              src="https://cmsassets.rgpub.io/sanity/files/dsfx7636/news/705b3917c26e9e97c5343d57875cd3404537190b.mp4"
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
                <input type="hidden" name="page_id" value="waylay">
                <textarea name="comment" id="comment" placeholder="Write your comment here..." required></textarea>
                <button type="submit" id="add-comment">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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
          Copyright © <a rel="nofollow" href="https://www.facebook.com/justinedwight.acoba.9" target="_blank" style="color:rgb(248, 161, 161);">Acoba, Dwight</a> &amp;
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
    window.page_id = "waylay";
  </script>
  <script>
    window.agentAbilityData = {
      videos: {
        video1: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/news/705b3917c26e9e97c5343d57875cd3404537190b.mp4",
        video2: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/news/e06f520d0e844b3c136623c2568137ac47bc54ff.mp4",
        video3: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/news/189ff46acf7dd27b245631af9a6c51ef95013bb7.mp4",
        video4: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/news/b04a789382009e666cca021889586c6bc00bbaf5.mp4",
      },
      abilityNames: {
        video1: "Saturate",
        video2: "Lightspeed",
        video3: "Refract",
        video4: "ULTIMATE: Convergent Paths",
      }
    };
  </script>
  <script src="../assets/js/agent-abilities.js"></script>
</body>

</html>