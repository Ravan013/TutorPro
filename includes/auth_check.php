<?php
session_start();
if (!isset($_SESSION['user'])) {
    // Not logged in, redirect to login page
    header("Location: /TutorPro/auth/login.php");
    exit();
}
?>