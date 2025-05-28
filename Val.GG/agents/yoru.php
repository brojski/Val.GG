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

$page_id = 'yoru'; // Unique identifier for the page
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
            <a href="../agents.php">Agents</a> > Yoru</span>
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
            <img src="../assets/images/Yoru_Artwork_Full.webp" alt="Yoru Portrait" />
          </div>
        </div>

        <!-- Agent Name -->
        <div class="col-lg-6 col-md-12 align-self-start">
          <div class="agent-name text-left mt-3">
            <h2>Yoru</h2>
            <span>Duelist</span>
            <img src="../assets/images/duelist-symbol.webp" alt="Duelist Icon" />
          </div>

          <!-- Agent Description -->
          <div class="agent-desc">
            <p>
              Japanese native, Yoru, rips holes straight through reality to infiltrate enemy lines unseen. Using deception and aggression in equal measure, he gets the drop on each target before they know where to look.
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
            src="../assets/images/agent-abilities/yoru1.webp"
            alt="Blindside"
            onclick="showVideo('video1', 'EQUIP to rip an unstable dimensional fragment from reality. FIRE to throw the fragment, activating a flash that winds up once it collides with a hard surface in world.')" />
          <img
            src="../assets/images/agent-abilities/yoru2.webp"
            alt="Gatecrash"
            onclick="showVideo('video2', 'EQUIP a rift tether. FIRE to send the tether forward. ALT FIRE to place a stationary tether. ACTIVATE to teleport to the tether\'s location. USE to trigger a fake teleport.')" />
          <img
            src="../assets/images/agent-abilities/yoru3.webp"
            alt="Fakeout"
            onclick="showVideo('video3', 'EQUIP an echo that transforms into a mirror image of Yoru when activated. FIRE to instantly activate the mirror image and send it forward. ALT FIRE to place an inactive echo. USE to transform an inactive echo into a mirror image and send it forward. Mirror images explode in a blinding flash when destroyed by enemies.')" />
          <img
            src="../assets/images/agent-abilities/yoru4.webp"
            alt="Dimensional Drift"
            onclick="showVideo('video4', 'EQUIP a mask that can see between dimensions. FIRE to drift into Yoru\'s dimension, unable to be affected or seen by enemies from the outside. REACTIVATE to exit Yoru\'s dimension early.')" />
        </div>
      </div>

      <div class="col-lg-4">
        <div class="video-description" aria-live="polite">
          <h3 id="ability-name">Blindside</h3>
          <p>
            EQUIP to rip an unstable dimensional fragment from reality. FIRE to throw the fragment, activating a flash that winds up once it collides with a hard surface in world.
          </p>
        </div>
      </div>

      <div class="col-lg-6 text-center col-sm-12">
        <div class="video-display">
          <video id="video-placeholder" autoplay muted loop class="w-100">
            <source
              src="https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/295ab26ef6097d28da0bef9c9b4c6185a80071c8.mp4"
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
                <input type="hidden" name="page_id" value="yoru">
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
    window.page_id = "yoru";
  </script>
  <script>
    window.agentAbilityData = {
      videos: {
        video1: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/295ab26ef6097d28da0bef9c9b4c6185a80071c8.mp4",
        video2: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/be352287c5704d82d1acbff5ecdee5187755d235.mp4",
        video3: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/ef008c8e848a054f88e88f173c03279a45a1c796.mp4",
        video4: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/9ca7fac6ec9514fa06b9785aad2ead0c3fba0eec.mp4",
      },
      abilityNames: {
        video1: "Blindside",
        video2: "Gatecrash",
        video3: "Fakeout",
        video4: "ULTIMATE: Dimensional Drift",
      }
    };
  </script>
  <script src="../assets/js/agent-abilities.js"></script>
</body>

</html>