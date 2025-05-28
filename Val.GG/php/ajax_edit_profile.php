<?php
session_start();
include '../php/config.php';
include '../php/session_handler.php'; // Ensure session timeout handling is included

header('Content-Type: application/json');

if (!isset($_SESSION['id'])) { // Check if user is logged in
    echo json_encode(['success' => false, 'message' => 'Not logged in.']);
    exit;
}

$id = $_SESSION['id'];
$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$age = trim($_POST['age'] ?? '');

if ($username === '' || $email === '' || $age === '') {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email address.']);
    exit;
}

if (!is_numeric($age) || $age <= 0) {
    echo json_encode(['success' => false, 'message' => 'Age must be a positive number.']);
    exit;
}

$edit_query = mysqli_query($con, "UPDATE users SET username='$username', email='$email', age='$age' WHERE id='$id'");
if ($edit_query) {
    echo json_encode(['success' => true, 'message' => 'Profile updated successfully!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update profile.']);
}
