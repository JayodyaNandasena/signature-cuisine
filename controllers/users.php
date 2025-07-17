<?php
require_once __DIR__ . '/../Core/Database.php';

use Core\database;

try {
    // Get database instance
    $db = database::getInstance();

    // Fetch all users
    $users = $db->query(
        "SELECT staff.id, staff.firstName, staff.lastName, staff.mobile, branch.name as branchName
     FROM staff
     INNER JOIN branch
     ON staff.branchId=branch.id
     ORDER BY id ASC"
    )->get();

} catch (Exception $e) {
    // Handle errors
    error_log("database error: " . $e->getMessage());
    $users = [];
    $error = "Unable to fetch users. Please try again later.";
}

// Include the view
require(__DIR__ . '/../views/admin/users.view.php');
?>
