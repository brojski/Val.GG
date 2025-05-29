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

$page_id = 'arsenal'; // Unique identifier for the page
include("../php/submit_comment.php");
// Ensure the user is logged in
$activePage = 'arsenal';
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
                    <h3>Maps</h3>
                    <span class="breadcrumb"><a href="../index.php">Home</a> > Maps</span>
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
                            <a href="#!" data-filter=".sidearm">Sidearms</a>
                        </li>
                        <li>
                            <a href="#!" data-filter=".smg">SMGS</a>
                        </li>
                        <li>
                            <a href="#!" data-filter=".shotgun">Shotguns</a>
                        </li>
                        <li>
                            <a href="#!" data-filter=".rifle">Rifles</a>
                        </li>
                        <li>
                            <a href="#!" data-filter=".sniper">Snipers</a>
                        </li>
                        <li>
                            <a href="#!" data-filter=".heavy">Heavies</a>
                        </li>
                        <li>
                            <a href="#!" data-filter=".melee">Melee</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row trending-box">
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items sidearm">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/classic.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Classic</h4>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items sidearm">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/shorty.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Shorty</h4>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items sidearm">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/frenzy.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Frenzy</h4>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items sidearm">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/ghost.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Ghost</h4>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items sidearm">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/sheriff.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Sheriff</h4>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items smg">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/Stinger.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Stinger</h4>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items smg">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/Spectre.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Spectre</h4>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items shotgun">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/Bucky.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Bucky</h4>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items shotgun">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/Judge.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Judge</h4>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items rifle">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/Bulldog.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Bulldog</h4>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items rifle">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/Guardian.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Guardian</h4>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items rifle">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/Phantom.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Phantom</h4>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items rifle">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/Vandal.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Vandal</h4>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items sniper">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/Marshal.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Marshal</h4>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items sniper">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/Outlaw.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Outlaw</h4>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items sniper">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/Operator.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Operator</h4>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items heavy">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/Ares.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Ares</h4>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items heavy">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/Odin.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Odin</h4>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-4 col-sm-4 col-6 trending-items melee">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img
                                    src="../assets/images/arsenal/Melee.webp"
                                    alt="" /></a>
                        </div>
                        <div class="down-content">
                            <h4>Tactical Knife</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sep"></div>
            </div>
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
                                <input type="hidden" name="page_id" value="arsenal">
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script>
        window.page_id = "arsenal";
    </script>
</body>

</html>