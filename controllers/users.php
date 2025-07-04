<?php
require_once __DIR__ . '/../Core/Database.php';

use Core\Database;

try {
    // Get database instance
    $db = Database::getInstance();

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
    error_log("Database error: " . $e->getMessage());
    $users = [];
    $error = "Unable to fetch users. Please try again later.";
}

// Include the view
require(__DIR__ . '/../views/admin/users.view.php');
?>
