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

$page_id = 'split'; // Unique identifier for the page
include("../php/submit_comment.php");
// Ensure the user is logged in
$activePage = 'maps';
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
                    <h3>Maps</h3>
                    <span class="breadcrumb"><a href="../index.php">Home</a> >
                        <a href="../maps.php">Maps</a> > Split</span>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-image">
                        <div class="image-container">
                            <!-- download image from https://valorant.fandom.com/wiki/'agent-name' -->
                            <img id="main-image" src="../assets/images/split.webp" alt="" />
                        </div>
                    </div>
                    <div class="thumbnail-container">
                        <img src="../assets/images/split.webp" alt="Thumbnail 1" onclick="changeImage('../assets/images/split.webp')" />
                        <img src="../assets/images/mapslideshow/split2.webp" alt="Thumbnail 2" onclick="changeImage('../assets/images/mapslideshow/split2.webp')" />
                        <img src="../assets/images/mapslideshow/split3.webp" alt="Thumbnail 3" onclick="changeImage('../assets/images/mapslideshow/split3.webp')" />
                        <img src="../assets/images/mapslideshow/split4.webp" alt="Thumbnail 4" onclick="changeImage('../assets/images/mapslideshow/split4.webp')" />
                        <img src="../assets/images/mapslideshow/split5.webp" alt="Thumbnail 5" onclick="changeImage('../assets/images/mapslideshow/split5.webp')" />
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="agent-name">
                        <h2>Split</h2>
                    </div>
                    <div class="agent-desc">
                        <!-- copy description from https://playvalorant.com/en-us/agents/'agentname' -->
                        <p>
                            If you want to go far, you’ll have to go up. A pair of sites split by
                            an elevated center allows for rapid movement using two rope ascenders.
                            Each site is built with a looming tower vital for control. Remember to watch above before it all blows sky-high.
                        </p>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="sep"></div>
                </div>
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
                            <form class="comment-form" id=add-comment-form>
                                <input type="hidden" name="page_id" value="split">
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
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>\
    <script>
        window.page_id = "split";
    </script>
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/maps-slideshow.js"></script>
</body>

</html>