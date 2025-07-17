<?php
session_start();
require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Core/Validator.php';

use Core\Validator;
use Core\Database;

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validation
    if (!Validator::email($email)) {
        $errors['email'] = 'A valid email address is required.';
    }

    if (!Validator::string($password)) {
        $errors['password'] = 'A password is required.';
    }

    if (!empty($errors)) {
        // Render form with errors
        require(__DIR__ . '/../views/login.view.php');
        exit;
    }

    // DB lookup
    $db = Database::getInstance();
    $user = $db->query('SELECT * FROM account WHERE email = :email AND password = :password', [
        'email' => $email,
        'password' => $password
    ])->find();

    if ($user) {
        // Login successful
        $_SESSION['user_id'] = $user['staffId'];    // store user ID

        if ($user['isAdmin']) {
            $_SESSION['role'] = 'admin';
        } else {
            $_SESSION['role'] = 'staff';
        }

        header('Location: ../controllers/home.php');
    } else {
        // Login failed
        $errors['failed'] = 'Invalid email or password.';
        require(__DIR__ . '/../views/login.view.php');
    }
    exit;
} else {
    // First time visit (GET request)
    require(__DIR__ . '/../views/login.view.php');
}
