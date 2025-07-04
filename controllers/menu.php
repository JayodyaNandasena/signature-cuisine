<?php

require_once __DIR__ . '/../Core/Database.php';

use Core\Database;

try {
    // Get database instance
    $db = Database::getInstance();

    // Fetch all menu items
    $all = $db->query("SELECT id, name, price, category FROM food ORDER BY id ASC")->get();

    // Fetch main menu items
    $mains = $db->query("SELECT id, name, price FROM food WHERE category = 'main' ORDER BY id ASC")->get();

    // Fetch dessert menu items
    $desserts = $db->query("SELECT id, name, price FROM food WHERE category = 'dessert' ORDER BY id ASC")->get();

    // Fetch beverage menu items
    $beverages = $db->query("SELECT id, name, price FROM food WHERE category = 'beverage' ORDER BY id ASC")->get();

} catch (Exception $e) {
    // Handle errors
    error_log("Database error: " . $e->getMessage());
    $all = [];
    $mains = [];
    $desserts = [];
    $beverages = [];
    $error = "Unable to fetch menu items. Please try again later.";
}

// Include the view
require(__DIR__ . '/../views/admin/menu.view.php');
?>
