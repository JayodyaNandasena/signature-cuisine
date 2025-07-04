<?php
require_once __DIR__ . '/../Core/Database.php';

use Core\Database;

try {
    // Get database instance
    $db = Database::getInstance();

    // Fetch all queries
    $queries = $db->query(
        "SELECT id, DATE(date) AS date, senderName, SUBSTR(subject, 1, 20) AS subject
         FROM queries
         WHERE reply IS NULL
         ORDER BY id ASC"
     )->get();

} catch (Exception $e) {
    // Handle errors
    error_log("Database error: " . $e->getMessage());
    $queries = [];
    $error = "Unable to fetch queries. Please try again later.";
}

// Include the view
require(__DIR__ . '/../views/staff/queries.view.php') ?>
