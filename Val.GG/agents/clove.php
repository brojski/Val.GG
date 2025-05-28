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

$page_id = 'clove'; // Unique identifier for the page
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
            <a href="../agents.php">Agents</a> > Clove</span>
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
            <img src="../assets/images/clove-portrait.webp" alt="" />
          </div>
        </div>
        <!-- Agent Name -->
        <div class="col-lg-6 col-md-12 align-self-start">
          <div class="agent-name text-left mt-3">
            <h2>Clove</h2>
            <span>Controller</span>
            <img
              src="../assets/images/controller-symbol.webp"
              alt="Controller Icon" />
          </div>

          <!-- Agent Description -->
          <div class="agent-desc">
            <p>
              Scottish troublemaker Clove makes mischief for enemies in both the
              heat of combat and the cold of death. The young immortal keeps foes
              guessing, even from beyond the grave, their return to the living
              only ever a moment away.
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
        <div class="video-buttons" style="filter: invert(1)">
          <img
            src="../assets/images/agent-abilities/clove1.webp"
            alt="Video 1"
            onclick="showVideo('video1', 'EQUIP a fragment of immortality essence. FIRE to throw the fragment, which erupts after a short delay and temporarily decays all targets caught inside.')" />
          <img
            src="../assets/images/agent-abilities/clove2.webp"
            alt="Video 2"
            onclick="showVideo('video2', 'INSTANTLY absorb the life force of a fallen enemy that Clove damaged or killed, gaining haste and temporary health.')" />
          <img
            src="../assets/images/agent-abilities/clove3.webp"
            alt="Video 3"
            onclick="showVideo('video3', 'EQUIP to view the battlefield. FIRE to set the locations where Clove’s clouds will settle. ALT FIRE to confirm, launching clouds that block vision in the chosen areas. Clove can use this ability after death.')" />
          <img
            src="../assets/images/agent-abilities/clove4.webp"
            alt="Video 4"
            onclick="showVideo('video4', 'After dying, ACTIVATE to resurrect. Once resurrected, Clove must earn a kill or a damaging assist within a set time or they will die.')" />
        </div>
      </div>
      <div class="col-lg-4">
        <div class="video-description" aria-live="polite">
          <h3 id="ability-name">Pick-Me-Up</h3>
          <p>
            INSTANTLY absorb the life force of a fallen enemy that Clove damaged
            or killed, gaining haste and temporary health.
          </p>
        </div>
      </div>
      <div class="col-lg-6 text-center col-sm-12">
        <div class="video-display">
          <video id="video-placeholder" autoplay muted loop class="w-100">
            <source
              src="https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/71b28c3a8e3b6f29a2523f2cada52f2ea5a1eab0.mp4"
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
                <input type="hidden" name="page_id" value="clove">
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
    window.page_id = "clove";
  </script>
  <script>
    window.agentAbilityData = {
      videos: {
        video1: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/4adb022f083d3887f73d23f60de71cccb45e6d83.mp4",
        video2: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/71b28c3a8e3b6f29a2523f2cada52f2ea5a1eab0.mp4",
        video3: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/f74f0d7b96cae0bcf51e97ad99883a370508a381.mp4",
        video4: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/b9e4ee59e2e2a492ec5a76f71c2161faa6f03981.mp4",
      },
      abilityNames: {
        video1: "Meddle",
        video2: "Pick-Me-Up",
        video3: "Ruse",
        video4: "ULTIMATE: Not Dead Yet",
      }
    };
  </script>
  <script src="../assets/js/agent-abilities.js"></script>

</body>

</html>