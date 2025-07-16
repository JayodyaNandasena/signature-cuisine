<?php
require_once __DIR__ . '/../../Core/Database.php';
require_once __DIR__ . '/../../Core/Validator.php';

use Core\Validator;
use Core\Database;

header('Content-Type: application/json');

$errors = [];
$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$mobile = $_POST['mobile'] ?? '';
$branch = $_POST['branch'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Validate inputs
if (!Validator::string($firstName, 1, 50)) {
    $errors['firstName'] = 'First name is required and must be less than 50 characters.';
}
if (!Validator::string($lastName, 1, 50)) {
    $errors['lastName'] = 'Last name is required and must be less than 50 characters.';
}
if (!Validator::phone($mobile)) {
    $errors['mobile'] = 'Mobile number is required and must be a valid phone number.';
}
if (!Validator::digit($branch, 1, 4)) {
    $errors['branch'] = 'Please select a valid branch.';
}
if (!Validator::email($email)) {
    $errors['email'] = 'Email is required and must be a valid email.';
}
if (!Validator::password($password)) {
    $errors['password'] = 'Password must be minimum 8 characters with at least 1 uppercase, 1 lowercase, 1 digit, and 1 special character.';
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
    $pdo = $db->getConnection();

    try {
        // Begin transaction
        $pdo->beginTransaction();

        // Insert into staff table
        $db->query(
            'INSERT INTO staff (firstName, lastName, mobile, branchId) VALUES (:firstName, :lastName, :mobile, :branchId)',
            [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'mobile' => $mobile,
                'branchId' => (int)$branch
            ]
        );

        // Get inserted staff ID
        $staffId = $db->lastInsertId();

        // Insert into account table using staffId
        $db->query(
            'INSERT INTO account (email, password, staffId) VALUES (:email, :password, :staffId)',
            [
                'email' => $email,
                'password' => $password,
                'staffId' => (int)$staffId,
            ]
        );

        // Commit both operations
        $pdo->commit();

        // Success response only if commit succeeded
        echo json_encode(['success' => true, 'message' => 'Staff and account created successfully.']);

    } catch (Exception $e) {
        // Rollback if anything inside transaction failed
        $pdo->rollBack();
        http_response_code(409); // Conflict
        echo json_encode(['success' => false, 'conflict' => 'Email is already used.']);
    }

} catch (Exception $e) {
    // DB connection or unexpected issue
    http_response_code(500); // Internal Server Error
    echo json_encode(['success' => false, 'error' => 'An error occurred while processing your request.']);
}

exit;