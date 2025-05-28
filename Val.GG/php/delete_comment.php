<?php
session_start();
include("config.php");

if (!isset($_SESSION['id'])) {
    http_response_code(401);
    echo "Unauthorized";
    exit;
}

$comment_id = intval($_POST['comment_id']);

// Check ownership
$res = mysqli_query($con, "SELECT user_id FROM comments WHERE id=$comment_id");
$row = mysqli_fetch_assoc($res);
if (!$row || $row['user_id'] != $_SESSION['id']) {
    http_response_code(403);
    echo "Forbidden";
    exit;
}

if (mysqli_query($con, "DELETE FROM comments WHERE id=$comment_id")) {
    echo "success";
} else {
    http_response_code(500);
    echo "Error deleting comment.";
}
