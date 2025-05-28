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

$page_id = 'gekko'; // Unique identifier for the page
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
            <a href="../agents.php">Agents</a> > Gekko</span>
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
            <img src="../assets/images/Gekko_Artwork_Full.webp" alt="Gekko Portrait" />
          </div>
        </div>
        <!-- Agent Name & Description -->
        <div class="col-lg-6 col-md-12 align-self-start">
          <div class="agent-name text-left mt-3">
            <h2>Gekko</h2>
            <span>Initiator</span>
            <img src="../assets/images/initiator-symbol.webp" alt="Initiator Icon" />
          </div>
          <div class="agent-desc">
            <p>
              Gekko the Angeleno leads a tight-knit crew of calamitous creatures.
              His buddies bound forward, scattering enemies out of the way, with Gekko chasing them down to regroup and go again.
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
            src="../assets/images/agent-abilities/gekko1.webp"
            alt="Wingman"
            onclick="showVideo('video1', 'EQUIP Wingman. FIRE to send Wingman forward seeking enemies. Wingman unleashes a concussive blast toward the first enemy he sees. ALT FIRE when targeting a Spike site or planted Spike to have Wingman defuse or plant the Spike. To plant, Gekko must have the Spike in his inventory. When Wingman expires, he reverts into a dormant globule. INTERACT to reclaim the globule and gain another Wingman charge after a short cooldown.')" />
          <img
            src="../assets/images/agent-abilities/gekko2.webp"
            alt="Dizzy"
            onclick="showVideo('video2', 'EQUIP Dizzy. FIRE to send Dizzy soaring forward through the air. Dizzy charges then unleashes plasma blasts at enemies in line of sight. Enemies hit by her plasma are blinded. When Dizzy expires, she reverts into a dormant globule. INTERACT to reclaim the globule and gain another Dizzy charge after a short cooldown.')" />
          <img
            src="../assets/images/agent-abilities/gekko3.webp"
            alt="Mosh Pit"
            onclick="showVideo('video3', 'EQUIP Mosh. FIRE to throw Mosh like a grenade. ALT FIRE to throw underhand. Upon landing, Mosh duplicates across a large area, then after a short delay, explodes.')" />
          <img
            src="../assets/images/agent-abilities/gekko4.webp"
            alt="Thrash"
            onclick="showVideo('video4', 'EQUIP Thrash. FIRE to link with Thrash’s mind and steer her through enemy territory. ACTIVATE to lunge forward and explode, detaining any enemies in a small radius. When Thrash expires, she reverts into a dormant globule. INTERACT to reclaim the globule and gain another Thrash charge after a short cooldown. Thrash can be reclaimed once.')" />
        </div>
      </div>

      <!-- Ability Description -->
      <div class="col-lg-4">
        <div class="video-description" aria-live="polite">
          <h3 id="ability-name">Wingman</h3>
          <p>
            EQUIP Wingman. FIRE to send Wingman forward seeking enemies. Wingman unleashes a concussive blast toward the first enemy he sees.
            ALT FIRE when targeting a Spike site or planted Spike to have Wingman defuse or plant the Spike.
            To plant, Gekko must have the Spike in his inventory.
            When Wingman expires, he reverts into a dormant globule.
            INTERACT to reclaim the globule and gain another Wingman charge after a short cooldown.
          </p>
        </div>
      </div>

      <!-- Video Display -->
      <div class="col-lg-6 text-center col-sm-12">
        <div class="video-display">
          <video id="video-placeholder" autoplay muted loop class="w-100">
            <source
              src="https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/e9a92a506942c735f5a986ee9489fad34b192843.mp4"
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
                <input type="hidden" name="page_id" value="gekko">
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
    window.page_id = "gekko";
  </script>
  <script>
    window.agentAbilityData = {
      videos: {
        video1: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/e9a92a506942c735f5a986ee9489fad34b192843.mp4",
        video2: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/f3a565e0cde441f1754eeadda2427020a795d4a0.mp4",
        video3: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/85f2c3958091bf4b8fb475c8bda0dcb10a409fbc.mp4",
        video4: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/fe30846150b8f87f7f945a3f0c82e59d0522dbdc.mp4",
      },
      abilityNames: {
        video1: "Wingman",
        video2: "Dizzy",
        video3: "Mosh Pit",
        video4: "ULTIMATE: Thrash",
      }
    };
  </script>
  <script src="../assets/js/agent-abilities.js"></script>

</body>

</html>