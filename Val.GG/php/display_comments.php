<?php
session_start();
include("config.php");

$page_id = isset($_GET['page_id']) ? $_GET['page_id'] : (isset($_POST['page_id']) ? $_POST['page_id'] : '');

if (empty($page_id)) {
    echo "<p>No comments found (missing page ID).</p>";
    exit;
}

$query = "SELECT c.id, c.comment, c.created_at, c.user_id, u.username 
          FROM comments c 
          JOIN users u ON c.user_id = u.id 
          WHERE c.page_id = '" . mysqli_real_escape_string($con, $page_id) . "' 
          ORDER BY c.created_at DESC";

$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='comment' data-id='" . $row['id'] . "'>";
        echo "<p><strong>" . htmlspecialchars($row['username']) . ":</strong> <span class='comment-text'>" . htmlspecialchars($row['comment']) . "</span></p>";
        echo "<p><small>Posted on " . $row['created_at'] . "</small></p>";


        // Show edit/delete only if user owns the comment
        if (isset($_SESSION['id']) && $_SESSION['id'] == $row['user_id']) {
            echo "<img src='../assets/images/edit.png' class='edit-icon edit-comment-btn' data-id='" . $row['id'] . "alt='Edit'>";
            echo "<img src='../assets/images/delete.png' class='delete-icon delete-comment-btn' data-id='" . $row['id'] . "alt='Delete'>";
        }

        echo "</div>";
        echo "<div class='col-lg-12'> <div class='sepcomm'></div> </div>";
    }
} else {
    echo "<p>No comments yet. Be the first to comment!</p>";
}
