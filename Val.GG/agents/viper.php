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

$page_id = 'viper'; // Unique identifier for the page
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
            <a href="../agents.php">Agents</a> > Viper</span>
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
            <!-- Image -->
            <img src="../assets/images/Viper_Artwork_Full.webp" alt="Viper Portrait" />
          </div>
        </div>
        <!-- Agent Name -->
        <div class="col-lg-6 col-md-12 align-self-start">
          <div class="agent-name text-left mt-3">
            <h2>Viper</h2>
            <span>Controller</span>
            <img src="../assets/images/controller-symbol.webp" alt="Controller Icon" />
          </div>

          <!-- Agent Description -->
          <div class="agent-desc">
            <p>
              The American Chemist, Viper deploys an array of poisonous chemical devices to control the battlefield and choke the enemy's vision. If the toxins don't kill her prey, her mindgames surely will.
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
          <!-- download image from https://valorant.fandom.com/wiki/'agent-name' tapos ilagay sa src="" -->
          <!-- onclick="showVideo('videonum', 'ABILITY DESCRIPTION') change ABILITY DESCRIPTION. can be found in https://playvalorant.com/en-us/agents/'agentname' -->
          <img
            src="../assets/images/agent-abilities/viper1.webp"
            alt="Video 1"
            onclick="showVideo('video1', 'EQUIP a gas emitter. FIRE to throw the emitter that perpetually remains throughout the round. RE-USE the ability to create a toxic gas cloud at the cost of fuel. This ability can be picked up to be REDEPLOYED before the round starts and can be RE-USED more than once throughout the round.')" />
          <img
            src="../assets/images/agent-abilities/viper2.webp"
            alt="Video 2"
            onclick="showVideo('video2', 'EQUIP a gas emitter launcher. FIRE to deploy a long line of gas emitters. RE-USE the ability to create a tall wall of toxic gas at the cost of fuel. This ability can be RE-USED more than once.')" />
          <img
            src="../assets/images/agent-abilities/viper3.webp"
            alt="Video 3"
            onclick="showVideo('video3', 'EQUIP a chemical launcher. FIRE to launch a canister that shatters upon hitting the floor, creating a lingering chemical zone that damages and slows enemies.')" />
          <img
            src="../assets/images/agent-abilities/viper4.webp"
            alt="Video 4"
            onclick="showVideo('video4', 'EQUIP a chemical sprayer. FIRE to spray a chemical cloud in all directions around Viper, creating a large cloud that reduces the vision range and maximum health of players inside of it.')" />
        </div>
      </div>
      <div class="col-lg-4">
        <div class="video-description" aria-live="polite">
          <!-- jay instance nga sumrek ka jay page, agscroll down ka,
            tapos ada naka pre-select nga ability'n which is the first ability. (check line 146, isu met inusar ko nga description in line 170)
            tapos change mo rin yung <h3> </h3> with the first ability name -->
          <h3 id="ability-name">Poison Cloud</h3>
          <p>
            EQUIP a gas emitter. FIRE to throw the emitter that perpetually remains throughout the round. RE-USE the ability to create a toxic gas cloud at the cost of fuel. This ability can be picked up to be REDEPLOYED before the round starts and can be RE-USED more than once throughout the round.
          </p>
        </div>
      </div>
      <div class="col-lg-6 text-center col-sm-12">
        <div class="video-display">
          <video id="video-placeholder" autoplay muted loop class="w-100">
            <!-- etoy met ket jay video ti first ability. go to https://playvalorant.com/en-us/agents/,
          click on the first ability, then right click on the video, tapos copy video address.
          tapos ipaste mo sa src="" seen below -->
            <source
              src="https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/49ff8efd75b76941da3018362061275d3a1d43d6.mp4"
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
                <input type="hidden" name="page_id" value="viper">
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
    window.page_id = "viper";
  </script>
  <script>
    window.agentAbilityData = {
      videos: {
        video1: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/49ff8efd75b76941da3018362061275d3a1d43d6.mp4",
        video2: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/36db8f44946850c2a20aba43d8ad3ecd977c7d7e.mp4",
        video3: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/9eeb3090efed080792e6ea2f264fd60ebb12694e.mp4",
        video4: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/4601fd972c588a79cdd910b2497546f156886c40.mp4",
      },
      abilityNames: {
        video1: "Poison Cloud",
        video2: "Toxic Screen",
        video3: "Snake Bite",
        video4: "ULTIMATE: Viper's PIT",
      }
    };
  </script>
  <script src="../assets/js/agent-abilities.js"></script>
</body>

</html>