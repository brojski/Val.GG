<?php
session_start();
include("config.php");

header('Content-Type: application/json');

if (isset($_POST['username'], $_POST['password'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $result = mysqli_query($con, "SELECT * FROM users WHERE Username='$username'") or die(json_encode(['success' => false, 'message' => 'Select Error']));
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($password, $row['password'])) {
        $_SESSION['valid'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['start_time'] = time();
        $_SESSION['timeout_duration'] = SESSION_TIMEOUT; // store timeout duration in session
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid Credentials']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Missing data']);
}
