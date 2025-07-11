<?php
require_once __DIR__ . '/../../Core/Database.php';
require_once __DIR__ . '/../../Core/Validator.php';

use Core\Validator;
use Core\Database;

header('Content-Type: application/json');

$errors = [];
$itemName = $_POST['itemName'] ?? '';
$category = $_POST['category'] ?? '';
$price = $_POST['price'] ?? '';

// Validate inputs
if (!Validator::string($itemName, 1, 100)) {
    $errors['itemName'] = 'Name is required and must be less than 100 characters.';
}
if (!Validator::radioSelected($category, ['main', 'dessert', 'beverage'])) {
    $errors['email'] = 'Please select a valid category.';
}
if (!Validator::price($price)) {
    $errors['price'] = 'Price is required and must be a valid price.';
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
        'INSERT INTO food (name, price, category) VALUES (:itemName, :price, :category)',
        [
            'itemName' => $itemName,
            'price' => $price,
            'category' => $category,
        ]
    );

    echo json_encode(['success' => true, 'message' => 'New menu item added successfully.']);
} catch (Exception $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['success' => false, 'error' => 'An error occurred while processing your request.']);
}
exit;
