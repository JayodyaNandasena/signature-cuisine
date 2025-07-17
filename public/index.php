<?php

$config = require_once '../assets/config/config.php';

// Check if setup is needed
if (!file_exists($config['paths']['setup_flag'])) {
    // Direct to set up page
    header('Location: ../setup/setup.php');
    exit;
}

// Normal application flow
header('Location: ../controllers/home.php');
exit;
