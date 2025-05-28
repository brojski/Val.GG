<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("config.php");

$is_ajax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

if (isset($_POST['submit_comment'])) {
    if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
        if ($is_ajax) {
            http_response_code(401);
            echo "You must be logged in to comment.";
            exit;
        } else {
            $current_url = $_SERVER['HTTP_REFERER'];
            if (strpos($current_url, 'error=login_required') === false) {
                header("Location: " . $current_url . "?error=login_required");
            } else {
                header("Location: " . $current_url);
            }
            exit;
        }
    }

    $user_id = $_SESSION['id'];
    $page_id = mysqli_real_escape_string($con, $_POST['page_id']);
    $comment = mysqli_real_escape_string($con, $_POST['comment']);

    $query = "INSERT INTO comments (user_id, page_id, comment) VALUES ('$user_id', '$page_id', '$comment')";
    if (mysqli_query($con, $query)) {
        if ($is_ajax) {
            echo "success";
            exit;
        } else {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    } else {
        if ($is_ajax) {
            http_response_code(500);
            echo "Error: " . mysqli_error($con);
            exit;
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
