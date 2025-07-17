<?php
require_once __DIR__ . '/../Core/Database.php';

use Core\database;

try {
    // Get database instance
    $db = database::getInstance();

    // Fetch all reservations
    $reservations = $db->query(
        "SELECT id, guestCount, date, time, SUBSTR(notes, 1, 20) AS note
         FROM reservation
         WHERE STR_TO_DATE(CONCAT(date, ' ', time), '%Y-%m-%d %H:%i:%s') >= NOW()
         ORDER BY date ASC, time ASC"
    )->get();

} catch (Exception $e) {
    // Handle errors
    error_log("database error: " . $e->getMessage());
    $reservations = [];
    $error = "Unable to fetch reservations. Please try again later.";
}

// Include the view
require(__DIR__ . '/../views/staff/reservations.view.php') ?>
