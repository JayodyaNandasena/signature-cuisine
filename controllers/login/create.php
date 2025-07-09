<?php
require_once __DIR__ . '/../../Core/Database.php';
require_once __DIR__ . '/../../Core/Validator.php';

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
        header('Location: ../login.php');
        exit;
    }

    // DB lookup
    $db = Database::getInstance();
    $user = $db->query('SELECT * FROM account WHERE email = :email AND password = :password', [
        'email' => $email,
        'password' => $password
    ])->find(); // Assuming `find()` fetches one row as an associative array

    if ($user) {
        // Login successful
        header('Location: ../home.php');
        exit;
    } else {
        // Login failed
        header('Location: ../login.php?error=invalid_credentials');
        exit;
    }
} else {
    echo "<p style='color: red;'>Invalid request method.</p>";
}
