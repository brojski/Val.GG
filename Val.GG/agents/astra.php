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

$page_id = 'astra'; // Unique identifier for the page
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
  <link rel="stylesheet" href="../assets/css/style.css" /> <!-- IKKATEM JAY NAKACOMMENT'n /> -->
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
            <a href="../agents.php">Agents</a> > Astra</span>
        </div>
      </div>
    </div>
  </div>

  <div class="single-product section">
    <div class="container-lg">
      <div class="row gy-5">
        <div class="col-lg-6 col-md-12">
          <div class="left-image">
            <!-- download image from https://valorant.fandom.com/wiki/'agent-name' -->
            <img src="../assets/images/Astra_Artwork_Full.webp" alt="" />
          </div>
        </div>

        <div class="col-lg-6 col-md-12 align-self-start">
          <div class="agent-name text-left mt-3">
            <h2>Astra</h2>
            <!-- change mo <span> nu anat role na. eg. Duelist OR Sentinel -->
            <span>Controller</span>
            <!-- ti lang ichange mo ditoy ket deta file name, indownload ko amin nga symbols'n.
               iResearch mo lattan nu anat role jay agent mo. --- eg. ( duelist-symbol.webp OR sentinel-symbol.webp )-->
            <img
              src="../assets/images/controller-symbol.webp"
              alt="Controller Icon" />
          </div>

          <div class="agent-desc">
            <!-- copy description from https://playvalorant.com/en-us/agents/'agentname' -->
            <p>
              Ghanaian Agent Astra harnesses the energies of the cosmos to
              reshape battlefields to her whim. With full command of her
              astral form and a talent for deep strategic foresight, she's
              always eons ahead of her enemy's next move.
            </p>
          </div>
        </div>
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
            src="../assets/images/agent-abilities/astra1.webp"
            alt="Video 1"
            onclick="showVideo('video1', 'Place Stars in Astral Form. ACTIVATE a Star to detonate a Nova Pulse. The Nova Pulse charges briefly then strikes, concussing all players in its area.')" />
          <img
            src="../assets/images/agent-abilities/astra2.webp"
            alt="Video 2"
            onclick="showVideo('video2', 'Place Stars in Astral Form. ACTIVATE a Star to transform it into a Nebula (smoke). USE a Star to Dissipate it, returning the Star to be placed in a new location after a delay. Dissipate briefly forms a fake Nebula at the Stars location before returning.')" />
          <img
            src="../assets/images/agent-abilities/astra3.webp"
            alt="Video 3"
            onclick="showVideo('video3', 'Place Stars in Astral Form (X) ACTIVATE a Star to form a Gravity Well. Players in the area are pulled toward the center before it explodes, making all players still trapped inside Vulnerable.')" />
          <img
            src="../assets/images/agent-abilities/astra4.webp"
            alt="Video 4"
            onclick="showVideo('video4', 'ACTIVATE to enter Astral Form where you can place Stars with FIRE. Stars can be reactivated later, transforming them into a Nova Pulse, Nebula, or Gravity Well. When Cosmic Divide is charged, use ALT FIRE in Astral Form to begin aiming it, then FIRE to select two locations. An infinite Cosmic Divide connects the two points you select. Cosmic Divide blocks bullets and heavily dampens audio.')" />
        </div>
      </div>

      <div class="col-lg-4">
        <div class="video-description" aria-live="polite">
          <!-- jay instance nga sumrek ka jay page, agscroll down ka,
              tapos ada naka pre-select nga ability'n which is the first ability. (check line 146, isu met inusar ko nga description in line 170)
              tapos change mo rin yung <h3> </h3> with the first ability name -->
          <h3 id="ability-name">Nova Pulse</h3>
          <p>
            Place Stars in Astral Form. ACTIVATE a Star to detonate a Nova Pulse.
            The Nova Pulse charges briefly then strikes, concussing all players in
            its area.
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
              src="https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/e54ed10355d571c15ef2ee5a0897cca06851fd56.mp4"
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
                <input type="hidden" name="page_id" value="astra">
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
          Copyright © <a rel="nofollow" href="https://www.facebook.com/justinedwight.acoba.9" target="_blank" style="color:rgb(248, 161, 161);">Acoba, Dwight</a> & <a rel="nofollow" href="https://www.facebook.com/andres.john.425565/" target="_blank" style="color:rgb(248, 161, 161);">Ruadap, Andres</a>. All rights reserved.
          &nbsp;&nbsp;
        </p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/js/custom.js"></script>
  <script>
    window.page_id = "astra";
  </script>
  <script>
    window.agentAbilityData = {
      videos: {
        video1: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/e54ed10355d571c15ef2ee5a0897cca06851fd56.mp4",
        video2: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/2aafadb8cef8c1ab2894a657c23988e921b006c8.mp4",
        video3: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/3439c939846214067561746668bfd96805efc225.mp4",
        video4: "https://cmsassets.rgpub.io/sanity/files/dsfx7636/game_data/6bed3444d432f27cdac08f3be1dad2760be7052f.mp4",
      },
      abilityNames: {
        video1: "Nova Pulse",
        video2: "Nebula",
        video3: "Gravity Well",
        video4: "ULTIMATE: ASTRAL FORM / COSMIC DIVIDE",
      }
    };
  </script>
  <script src="../assets/js/agent-abilities.js"></script>
</body>

</html>