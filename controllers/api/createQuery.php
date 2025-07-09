<?php
require_once __DIR__ . '/../../Core/Database.php';
require_once __DIR__ . '/../../Core/Validator.php';

use Core\Validator;
use Core\Database;

header('Content-Type: application/json');

$errors = [];
$senderName = $_POST['senderName'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

// Validate inputs
if (!Validator::string($senderName, 1, 50)) {
    $errors['senderName'] = 'Name is required and must be less than 50 characters.';
}
if (!Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address.';
}
if (!Validator::string($subject, 1, 100)) {
    $errors['subject'] = 'Subject is required and must be less than 100 characters.';
}
if (!Validator::string($message, 1, 500)) {
    $errors['message'] = 'Message is required and must be less than 500 characters.';
}

// Return validation errors
if (!empty($errors)) {
    http_response_code(422); // Unprocessable Entity
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

// Save to database
try {
    $db = Database::getInstance();
    $db->query(
        'INSERT INTO queries (senderName, email, subject, message) VALUES (:senderName, :email, :subject, :message)',
        [
            'senderName' => $senderName,
            'email' => $email,
            'subject' => $subject,
            'message' => $message
        ]
    );

    echo json_encode(['success' => true, 'message' => 'Your message has been received.']);
} catch (Exception $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['success' => false, 'error' => 'An error occurred while processing your request.']);
}
exit;
