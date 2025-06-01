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
        <div class="row trending-box" id="agentsContainer"></div>
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

        // Show all items first
        items.forEach((item) => {
          item.classList.remove("d-none");
        });

        // Hide items that don't match the filter
        if (filter && filter !== "*") {
          items.forEach((item) => {
            if (!item.classList.contains(filter)) {
              item.classList.add("d-none");
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
  <script src="assets/js/agentsAPI.js"></script>
</body>

</html>