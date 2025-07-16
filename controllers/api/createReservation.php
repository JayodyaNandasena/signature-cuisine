<?php
require_once __DIR__ . '/../../Core/Database.php';
require_once __DIR__ . '/../../Core/Validator.php';

use Core\Validator;
use Core\Database;

header('Content-Type: application/json');

$errors = [];
$date = $_POST['date'] ?? '';
$time = $_POST['time'] ?? '';
$guestCount = $_POST['guestCount'] ?? '';
$notes = isset($_POST['notes']) && trim($_POST['notes']) !== '' ? trim($_POST['notes']) : null;
$restaurant = $_POST['restaurant'] ?? '';
$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';

// Validate inputs
if (!Validator::date($date)) {
    $errors['date'] = 'Date is required and must not be in the past.';
}

if (!Validator::inArray($time, ['19:30','20:00', '20:30', '21:00', '21:30', '22:00'])) {
    $errors['time'] = 'Time is required and must be one of the available options.';
}

if (!Validator::digit($guestCount, 1, 8)) {
    $errors['guestCount'] = 'Guest count is required and must be between 1 and 8.';
}

if ($notes !== null) {
    if (!Validator::string($notes, 1, 100)) {
        $errors['notes'] = 'Notes must be no more than 100 characters.';
    }
}

if (!Validator::digit($restaurant, 1, 4)) {
    $errors['restaurant'] = 'Restaurant selection is required.';
}

if (!Validator::string($firstName, 1, 50)) {
    $errors['firstName'] = 'First name is required and must be no more than 50 characters.';
}

if (!Validator::string($lastName, 1, 50)) {
    $errors['lastName'] = 'Last name is required and must be no more than 50 characters.';
}

if (!Validator::email($email)) {
    $errors['email'] = 'A valid email address is required.';
}

if (!Validator::phone($phone)) {
    $errors['phone'] = 'A valid phone number is required (format: 07XXXXXXXX).';
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

        // Insert into customerdetails table
        $db->query(
            'INSERT INTO customerdetails (firstName, lastName, email, phone) VALUES (:firstName, :lastName, :email, :phone)',
            [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'phone' => $phone
            ]
        );

        // Get inserted staff ID
        $customerId = $db->lastInsertId();

        // Insert into reservation table using customerId
        $db->query(
            'INSERT INTO reservation (date, time, guestCount, notes, customerId, branchId) VALUES (:date, :time, :guestCount, :notes, :customerId, :branchId)',
            [
                'date' => $date,
                'time' => $time,
                'guestCount' => $guestCount,
                'notes' => $notes,
                'customerId' => (int)$customerId,
                'branchId' => (int)$restaurant
            ]
        );

        // Commit both operations
        $pdo->commit();

        // Success response only if commit succeeded
        echo json_encode(['success' => true, 'message' => 'Reservation added successfully.']);

    } catch (Exception $e) {
        // Rollback if anything inside transaction failed
        $pdo->rollBack();
        http_response_code(417); // Expectation Failed
        echo json_encode(['success' => false, 'error' => 'Database error.']);
    }

} catch (Exception $e) {
    // DB connection or unexpected issue
    http_response_code(500); // Internal Server Error
    echo json_encode(['success' => false, 'error' => 'An error occurred while processing your request.']);
}

exit;