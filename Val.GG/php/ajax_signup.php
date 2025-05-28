<?php
include 'config.php';
header('Content-Type: application/json');

$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$age = $_POST['age'] ?? '';
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';

if (!is_numeric($age) || $age <= 0) {
    echo json_encode(['success' => false, 'message' => 'Age must be a positive number.']);
    exit;
}

// Validate email (must be a valid email format)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email address.']);
    exit;
}

if ($password !== $confirmPassword) {
    echo json_encode(['success' => false, 'message' => 'Passwords do not match.']);
    exit;
}

// Check if the username or email already exists
$verify_query = mysqli_query($con, "SELECT * FROM users WHERE Username='$username' OR Email='$email'");
if (mysqli_num_rows($verify_query) != 0) {
    echo json_encode(['success' => false, 'message' => 'Username or Email already exists.']);
    exit;
}

// Proceed with registration
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
$insert = mysqli_query($con, "INSERT INTO users (Username, Email, Age, Password) VALUES ('$username', '$email', '$age', '$hashedPassword')");
if ($insert) {
    echo json_encode(['success' => true, 'message' => 'Account Registered, Please Log in.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Registration failed.']);
}
