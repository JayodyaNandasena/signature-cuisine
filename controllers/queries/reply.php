<?php
session_start();
require_once __DIR__ . '/../../Core/Database.php';
require_once __DIR__ . '/../../Core/Validator.php';

use Core\Validator;
use Core\database;

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Validator::string($_POST['reply'], 1, 1000)) {
        $errors['reply'] = 'A reply of no more than 1,000 characters is required.';
    }

    if (!empty($errors)) {
        header('Location: ../queries.php');
    }

    $db = database::getInstance();
    $db->query('UPDATE queries SET reply = :reply, staffId = :staffId WHERE id = :id', [
        'reply' => $_POST['reply'],
        'staffId' => $_SESSION['user_id'],
        'id' => $_POST['id']
    ]);

    header('location: ../queries.php');
    die();
} else {
    echo "<p style='color: red;'>Invalid request method.</p>";
}
