<?php
require_once(__DIR__ . "/config.php");

if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time > SESSION_TIMEOUT) {
        session_unset();
        session_destroy();
        header("Location: login.php?error=session_expired");
        exit;
    } else {
        $_SESSION['start_time'] = time();
    }
}
