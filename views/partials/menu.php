<?php

require_once __DIR__ . '/../../Core/Database.php';

use Core\database;

try {
    // Get database instance
    $db = database::getInstance();

    // Fetch main menu items
    $mainsMenu = $db->query("SELECT name, price FROM food WHERE category = 'main' ORDER BY id ASC LIMIT 5")->get();

    // Fetch dessert menu items
    $dessertsMenu = $db->query("SELECT name, price FROM food WHERE category = 'dessert' ORDER BY id ASC LIMIT 5")->get();

    // Fetch beverage menu items
    $beveragesMenu = $db->query("SELECT name, price FROM food WHERE category = 'beverage' ORDER BY id ASC LIMIT 5")->get();

} catch (Exception $e) {
    // Handle errors
    error_log("database error: " . $e->getMessage());
    $mainsMenu = [];
    $dessertsMenu = [];
    $beveragesMenu = [];
    $error = "Unable to fetch menu items. Please try again later.";
}
?>

<section id="menu" class="ourPackage slider_overlay">
    <div class="container">
        <div class="main_package_content">
            <div class="row">
                <div class="head_title text-center">
                    <h4 class="mb-2">Our Menu</h4>
                    <h3>Savor the Art of Flavor</h3>
                </div>

                <div class="single_package_one text-left wow rotateInDownRight">
                    <div class="col-md-6 col-sm-8">
                        <div class="single_package_text">
                            <div class="package_title">
                                <h4>Main Courses</h4>
                            </div>

                            <ul>
                                <?php foreach ($mainsMenu as $mainItem): ?>
                                    <li class="menu-item">
                                        <span><?= htmlspecialchars($mainItem['name']) ?></span>
                                        <span class="dots"></span>
                                        <span>Rs.<?= number_format($mainItem['price'], 2) ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="single_package_two text-left wow rotateInDownLeft">
                    <div class="col-md-6 col-sm-8">
                        <div class="single_package_text">
                            <div class="package_title">
                                <h4>Desserts</h4>
                            </div>

                            <ul>
                                <?php foreach ($dessertsMenu as $dessertItem): ?>
                                    <li class="menu-item">
                                        <span><?= htmlspecialchars($dessertItem['name']) ?></span>
                                        <span class="dots"></span>
                                        <span>Rs.<?= number_format($dessertItem['price'], 2) ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="single_package_three text-right wow rotateInDownRight">
                    <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4">
                        <div class="single_package_text">
                            <div class="package_title">
                                <h4>Beverages</h4>
                            </div>

                            <ul>
                                <?php foreach ($beveragesMenu as $beverageItem): ?>
                                    <li class="menu-item">
                                        <span><?= htmlspecialchars($beverageItem['name']) ?></span>
                                        <span class="dots"></span>
                                        <span>Rs.<?= number_format($beverageItem['price'], 2) ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
