<?php
session_start();


include("php/config.php");
include 'php/session_handler.php'; // Ensure session timeout handling is included
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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
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
  <?php $base = '';
  include 'php/header.php'; ?>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Agents</h3>
          <span class="breadcrumb"><a href="index.php">Home</a> > Agents</span>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <ul class="trending-filter">
            <li>
              <a class="is_active" href="#!" data-filter="*">Show All</a>
            </li>
            <li>
              <a href="#!" data-filter=".controller">Controller</a>
            </li>
            <li>
              <a href="#!" data-filter=".sentinel">Sentinel</a>
            </li>
            <li>
              <a href="#!" data-filter=".duelist">Duelist</a>
            </li>
            <li>
              <a href="#!" data-filter=".initiator">Initiator</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="row trending-box">
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items controller">
          <div class="item">
            <div class="thumb">
              <a href="agents/brimstone.php"><img src="assets/images/agent.html-images/brim.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Controller</span>
              <h4>Brimstone</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items controller">
          <div class="item">
            <div class="thumb">
              <a href="agents/viper.php"><img src="assets/images/agent.html-images/viper.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Controller</span>
              <h4>Viper</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items controller">
          <div class="item">
            <div class="thumb">
              <a href="agents/omen.php"><img src="assets/images/agent.html-images/omen.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Controller</span>
              <h4>Omen</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items sentinel">
          <div class="item">
            <div class="thumb">
              <a href="agents/killjoy.php"><img src="assets/images/agent.html-images/kj.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Sentinel</span>
              <h4>Killjoy</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items sentinel">
          <div class="item">
            <div class="thumb">
              <a href="agents/cypher.php"><img
                  src="assets/images/agent.html-images/cypher.webp"
                  alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Sentinel</span>
              <h4>Cypher</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items initiator">
          <div class="item">
            <div class="thumb">
              <a href="agents/sova.php"><img src="assets/images/agent.html-images/sova.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Initiator</span>
              <h4>Sova</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items sentinel">
          <div class="item">
            <div class="thumb">
              <a href="agents/sage.php"><img src="assets/images/agent.html-images/sage.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Sentinel</span>
              <h4>Sage</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items duelist">
          <div class="item">
            <div class="thumb">
              <a href="agents/phoenix.php"><img src="assets/images/agent.html-images/phx.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Duelist</span>
              <h4>Phoenix</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items duelist">
          <div class="item">
            <div class="thumb">
              <a href="agents/jett.php"><img src="assets/images/agent.html-images/jett.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Duelist</span>
              <h4>Jett</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items duelist">
          <div class="item">
            <div class="thumb">
              <a href="agents/reyna.php"><img src="assets/images/agent.html-images/reyna.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Duelist</span>
              <h4>Reyna</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items duelist">
          <div class="item">
            <div class="thumb">
              <a href="agents/raze.php"><img src="assets/images/agent.html-images/raze.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Duelist</span>
              <h4>Raze</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items initiator">
          <div class="item">
            <div class="thumb">
              <a href="agents/breach.php"><img
                  src="assets/images/agent.html-images/breach.webp"
                  alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Initiator</span>
              <h4>Breach</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items initiator">
          <div class="item">
            <div class="thumb">
              <a href="agents/skye.php"><img src="assets/images/agent.html-images/skye.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Initiator</span>
              <h4>Skye</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items duelist">
          <div class="item">
            <div class="thumb">
              <a href="agents/yoru.php"><img src="assets/images/agent.html-images/yoru.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Duelist</span>
              <h4>Yoru</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items controller">
          <div class="item">
            <div class="thumb">
              <a href="agents/astra.php"><img src="assets/images/agent.html-images/astra.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Controller</span>
              <h4>Astra</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items initiator">
          <div class="item">
            <div class="thumb">
              <a href="agents/kay0.php"><img src="assets/images/agent.html-images/kayo.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Initiator</span>
              <h4>KAY/O</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items sentinel">
          <div class="item">
            <div class="thumb">
              <a href="agents/chamber.php"><img
                  src="assets/images/agent.html-images/chamber.webp"
                  alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Sentinel</span>
              <h4>Chamber</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items duelist">
          <div class="item">
            <div class="thumb">
              <a href="agents/neon.php"><img src="assets/images/agent.html-images/neon.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Duelist</span>
              <h4>Neon</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items initiator">
          <div class="item">
            <div class="thumb">
              <a href="agents/fade.php"><img src="assets/images/agent.html-images/fade.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Initiator</span>
              <h4>Fade</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items controller">
          <div class="item">
            <div class="thumb">
              <a href="agents/harbor.php"><img
                  src="assets/images/agent.html-images/harbor.webp"
                  alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Controller</span>
              <h4>Harbor</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items initiator">
          <div class="item">
            <div class="thumb">
              <a href="agents/gekko.php"><img src="assets/images/agent.html-images/gekko.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Initiator</span>
              <h4>Gekko</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items sentinel">
          <div class="item">
            <div class="thumb">
              <a href="agents/deadlock.php"><img
                  src="assets/images/agent.html-images/deadlock.webp"
                  alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Sentinel</span>
              <h4>Deadlock</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items duelist">
          <div class="item">
            <div class="thumb">
              <a href="agents/iso.php"><img src="assets/images/agent.html-images/iso.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Duelist</span>
              <h4>Iso</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items controller">
          <div class="item">
            <div class="thumb">
              <a href="agents/clove.php"><img src="assets/images/agent.html-images/clove.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Controller</span>
              <h4>Clove</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items sentinel">
          <div class="item">
            <div class="thumb">
              <a href="agents/vyse.php"><img src="assets/images/agent.html-images/vyse.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Sentinel</span>
              <h4>Vyse</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items initiator">
          <div class="item">
            <div class="thumb">
              <a href="agents/tejo.php"><img src="assets/images/agent.html-images/tejo.webp" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Initiator</span>
              <h4>Tejo</h4>
            </div>
          </div>
        </div>
        <div
          class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 trending-items duelist">
          <div class="item">
            <div class="thumb">
              <a href="agents/waylay.php"><img
                  src="assets/images/agent.html-images/waylay.webp"
                  alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Duelist</span>
              <h4>Waylay</h4>
            </div>
          </div>
        </div>
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

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const urlParams = new URLSearchParams(window.location.search);
      const filter = urlParams.get("filter");

      // Function to apply the filter
      function applyFilter(filter) {
        const items = document.querySelectorAll(".trending-items");

        // Reset all items to be visible
        items.forEach((item) => {
          item.style.display = "block";
        });

        // Apply the selected filter
        if (filter && filter !== "*") {
          items.forEach((item) => {
            if (!item.classList.contains(filter)) {
              item.style.display = "none";
            }
          });
        }
      }

      // Apply the filter on page load
      applyFilter(filter);

      // Highlight the active filter
      if (filter) {
        document.querySelectorAll(".trending-filter a").forEach((el) => {
          el.classList.remove("is_active");
        });

        const selectedFilter = document.querySelector(
          `.trending-filter a[data-filter=".${filter}"]`
        );
        if (selectedFilter) {
          selectedFilter.classList.add("is_active");
        }

        // Apply the filter on page load
        applyFilter(filter);
      }

      // Add click event listeners to filter links
      document.querySelectorAll(".trending-filter a").forEach((link) => {
        link.addEventListener("click", function(event) {
          event.preventDefault();

          // Remove active class from all filters
          document.querySelectorAll(".trending-filter a").forEach((el) => {
            el.classList.remove("is_active");
          });

          // Add active class to the clicked filter
          this.classList.add("is_active");

          // Get the filter from the clicked link
          const newFilter = this.getAttribute("data-filter").replace(".", "");

          // Apply the new filter
          applyFilter(newFilter);
        });
      });
    });
  </script>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/custom.js"></script>
</body>

</html>