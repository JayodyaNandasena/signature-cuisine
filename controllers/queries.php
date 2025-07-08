<?php
require_once __DIR__ . '/../Core/Database.php';

use Core\database;

try {
    // Get database instance
    $db = database::getInstance();

    // Fetch all queries
    $queries = $db->query(
        "SELECT id, DATE(date) AS date, senderName, SUBSTR(subject, 1, 20) AS subject
         FROM queries
         WHERE reply IS NULL
         ORDER BY id ASC"
     )->get();

} catch (Exception $e) {
    // Handle errors
    error_log("database error: " . $e->getMessage());
    $queries = [];
    $error = "Unable to fetch queries. Please try again later.";
}

// Include the view
require(__DIR__ . '/../views/staff/queries.view.php') ?>
