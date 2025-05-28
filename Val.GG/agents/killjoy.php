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

$page_id = 'killjoy'; // Unique identifier for the page
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
            <a href="../agents.php">Agents</a> > Killjoy</span>
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
            <img src="../assets/images/Killjoy_Artwork_Full.webp" alt="Killjoy Portrait" />
          </div>
        </div>

        <!-- Agent Name & Description -->
        <div class="col-lg-6 col-md-12 align-self-start">
          <div class="agent-name text-left mt-3">
            <h2>Killjoy</h2>
            <span>Sentinel</span>
            <img src="../assets/images/sentinel-symbol.webp" alt="Sentinel Icon" />
          </div>
          <div class="agent-desc">
            <p>
              The genius of Germany. Killjoy secures the battlefield with ease
              using her arsenal of inventions. If the damage from her gear
              doesn't stop her enemies, her robots' debuff will help make
              short work of them.
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
            src="../assets/images/agent-abilities/kj1.webp"
            alt="Alarmbot"
            onclick="showVideo('video1', 'EQUIP a covert Alarmbot. FIRE to deploy a bot that hunts down enemies that get in range. After reaching its target, the bot explodes, applying Vulernable. HOLD EQUIP to recall a deployed bot.')" />
          <img
            src="../assets/images/agent-abilities/kj2.webp"
            alt="Turret"
            onclick="showVideo('video2', 'EQUIP a Turret. FIRE to deploy a turret that fires at enemies in a 180 degree cone. HOLD EQUIP to recall the deployed turret.')" />
          <img
            src="../assets/images/agent-abilities/kj3.webp"
            alt="Nanoswarm"
            onclick="showVideo('video3', 'EQUIP a Nanoswarm grenade. FIRE to throw the grenade. Upon landing, the Nanoswarm goes covert. ACTIVATE the Nanoswarm to deploy a damaging swarm of nanobots.')" />
          <img
            src="../assets/images/agent-abilities/kj4.webp"
            alt="Lockdown"
            onclick="showVideo('video4', 'EQUIP the Lockdown device. FIRE to deploy the device. After a long windup, the device Detains all enemies caught in the radius. The device can be destroyed by enemies.')" />
        </div>
      </div>

      <!-- Ability Description -->
      <div class="col-lg-4">
        <div class="video-description" aria-live="polite">
          <h3 id="ability-name">Alarmbot</h3>
          <p>
            EQUIP a covert Alarmbot. FIRE to deploy a bot that hunts down enemies
            that get in range. After reaching its target, the bot explodes,
            applying Vulnerable. HOLD EQUIP to recall a deployed bot.
          </p>
        </div>
      </div>

      <!-- Video Display -->
      <div class="col-lg-6 text-center col-sm-12">
        <div class="video-display">
          <video id="video-placeholder" autoplay muted loop class="w-100">
            <source
              src="https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/0582e7e1a0733667614492129abef67e17cfc92c.mp4"
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
                <input type="hidden" name="page_id" value="killjoy">
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
    window.page_id = "killjoy";
  </script>
  <script>
    window.agentAbilityData = {
      videos: {
        video1: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/0582e7e1a0733667614492129abef67e17cfc92c.mp4",
        video2: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/007e5042385d6f7315f4b4cb3fbd3b2c71b530c1.mp4",
        video3: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/b47a0b24d2499935d28f845a067984a52dbc2542.mp4",
        video4: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/9485f7bbf04841f4c37e031f07dad03e9cbc1bf9.mp4",
      },
      abilityNames: {
        video1: "Alarmbot",
        video2: "Turret",
        video3: "Nanoswarm",
        video4: "ULTIMATE: Lockdown",
      }
    };
  </script>
  <script src="../assets/js/agent-abilities.js"></script>
</body>

</html>