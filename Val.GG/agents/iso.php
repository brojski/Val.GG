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

$page_id = 'iso'; // Unique identifier for the page
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
            <a href="../agents.php">Agents</a> > Iso</span>
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
            <img src="../assets/images/Iso_Artwork_Full.webp" alt="Iso Portrait" />
          </div>
        </div>

        <!-- Agent Name & Description -->
        <div class="col-lg-6 col-md-12 align-self-start">
          <div class="agent-name text-left mt-3">
            <h2>Iso</h2>
            <span>Duelist</span>
            <img src="../assets/images/duelist-symbol.webp" alt="Duelist Icon" />
          </div>
          <div class="agent-desc">
            <p>
              Chinese fixer for hire, Iso falls into a flow state to dismantle the opposition.
              Reconfiguring ambient energy into bulletproof protection, he advances with focus
              towards his next duel to the death.
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
            src="../assets/images/agent-abilities/iso1.webp"
            alt="Undercut"
            onclick="showVideo('video1', 'EQUIP a molecular bolt. Fire to throw it forward, applying a brief FRAGILE to all players it touches. The bolt can pass through solid objects, including walls.')" />
          <img
            src="../assets/images/agent-abilities/iso2.webp"
            alt="Double Tap"
            onclick="showVideo('video2', 'START a focus timer. Once completed, enter a flow state during which downed enemies you kill or damage generate an energy orb. Shooting this orb grants you a shield which absorbs one instance of damage from any source.')" />
          <img
            src="../assets/images/agent-abilities/iso3.webp"
            alt="Contingency"
            onclick="showVideo('video3', 'EQUIP to assemble prismatic energy. FIRE to push an indestructible wall of energy forward that blocks bullets.')" />
          <img
            src="../assets/images/agent-abilities/iso4.webp"
            alt="Kill Contract"
            onclick="showVideo('video4', 'EQUIP an interdimensional arena. FIRE to hurl a column of energy through the battlefield, pulling you and the first enemy hit into the arena. You and your opponent duel to the death.')" />
        </div>
      </div>

      <!-- Ability Description -->
      <div class="col-lg-4">
        <div class="video-description" aria-live="polite">
          <h3 id="ability-name">Undercut</h3>
          <p>
            EQUIP a molecular bolt. Fire to throw it forward, applying a brief
            FRAGILE to all players it touches. The bolt can pass through solid
            objects, including walls.
          </p>
        </div>
      </div>

      <!-- Video Display -->
      <div class="col-lg-6 text-center col-sm-12">
        <div class="video-display">
          <video id="video-placeholder" autoplay muted loop class="w-100">
            <source
              src="https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/17503f71b58f654d583a66e29dab75460677576f.mp4"
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
                <input type="hidden" name="page_id" value="iso">
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
    window.page_id = "iso";
  </script>
  <script>
    window.agentAbilityData = {
      videos: {
        video1: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/17503f71b58f654d583a66e29dab75460677576f.mp4",
        video2: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/11ad2731215ec978c89fdb675aaf3b591c3c3c55.mp4",
        video3: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/5e331c774ffde4e8e0c45a8844b0237b7d75ba3b.mp4",
        video4: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/6fbd2b0e16ac3bda095094770ce6b1d403fc3832.mp4",
      },
      abilityNames: {
        video1: "Undercut",
        video2: "Double Tap",
        video3: "Contingency",
        video4: "ULTIMATE: Kill Contract",
      }
    };
  </script>
  <script src="../assets/js/agent-abilities.js"></script>

</body>

</html>