<?php
session_start();

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to home page
header('Location: ../controllers/home.php');
exit;
