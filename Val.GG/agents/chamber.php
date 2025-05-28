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

$page_id = 'chamber'; // Unique identifier for the page
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
            <a href="../agents.php">Agents</a> > Chamber</span>
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
            <img src="../assets/images/Chamber_Artwork_Full.webp" alt="" />
          </div>
        </div>
        <!-- Agent Name -->
        <div class="col-lg-6 col-md-12 align-self-start">
          <div class="agent-name text-left mt-3">
            <h2>Chamber</h2>
            <span>Sentinel</span>
            <img
              src="../assets/images/sentinel-symbol.webp"
              alt="Sentinel Icon" />
          </div>

          <!-- Agent Description -->
          <div class="agent-desc">
            <p>
              Well-dressed and well-armed, French weapons designer Chamber expels
              aggressors with deadly precision. He leverages his custom arsenal
              to hold the line and pick off enemies from afar, with a contingency
              built for every plan.
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
          <img
            src="../assets/images/agent-abilities/chamber1.webp"
            alt="Video 1"
            onclick="showVideo('video1', 'ACTIVATE to equip a heavy pistol. ALT FIRE with the pistol equipped to aim down sights.')" />
          <img
            src="../assets/images/agent-abilities/chamber2.webp"
            alt="Video 2"
            onclick="showVideo('video2', 'EQUIP a teleport anchor. FIRE to place it on the ground. While on the ground and in range of the anchor, REACTIVATE to quickly teleport to the anchor. The anchor can be picked up to be REDEPLOYED.')" />
          <img
            src="../assets/images/agent-abilities/chamber3.webp"
            alt="Video 3"
            onclick="showVideo('video3', 'EQUIP a trap that scans for enemies. FIRE to place it on the ground. When a visible enemy comes in range, the trap counts down and then destabilizes the terrain around them, creating a lingering field that Slows players caught inside of it. The trap can be picked up to be REDEPLOYED.')" />
          <img
            src="../assets/images/agent-abilities/chamber4.webp"
            alt="Video 4"
            onclick="showVideo('video4', 'ACTIVATE to summon a powerful, custom sniper rifle that will kill an enemy with any direct hit to the upper body. ALT FIRE to aim down sights. Killing an enemy creates a lingering field that Slows players caught inside of it.')" />
        </div>
      </div>
      <div class="col-lg-4">
        <div class="video-description" aria-live="polite">
          <h3 id="ability-name">Headhunter</h3>
          <p>
            ACTIVATE to equip a heavy pistol. ALT FIRE with the pistol equipped
            to aim down sights.
          </p>
        </div>
      </div>
      <div class="col-lg-6 text-center col-sm-12">
        <div class="video-display">
          <video id="video-placeholder" autoplay muted loop class="w-100">
            <source
              src="https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/745571f61d83d880c42278a35a072cdd8b7bfa12.mp4"
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
              <form class="comment-form" id=add-comment-form>
                <input type="hidden" name="page_id" value="chamber">
                <p>
                  <textarea name="comment" id="comment" placeholder="Write your comment here..." required></textarea>
                </p>
                <button type="submit" id="add-comment">Comment</button>
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
          Copyright © <a rel="nofollow" href="https://www.facebook.com/justinedwight.acoba.9" target="_blank" style="color:rgb(248, 161, 161);">Acoba, Dwight</a> &
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
    window.page_id = "chamber";
  </script>
  <script>
    window.agentAbilityData = {
      videos: {
        video1: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/745571f61d83d880c42278a35a072cdd8b7bfa12.mp4",
        video2: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/6d191f3734a8170d99f66642041da9f33240d319.mp4",
        video3: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/245fa173c5d3677e3838d52fb155b6366d19c91b.mp4",
        video4: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/49f14376a65d54586c350e7fe863ba30911032a0.mp4",
      },
      abilityNames: {
        video1: "Headhunter",
        video2: "Rendezvous",
        video3: "Trademark",
        video4: "ULTIMATE: TOUR DE FORCE",
      }
    };
  </script>
  <script src="../assets/js/agent-abilities.js"></script>

</body>

</html>