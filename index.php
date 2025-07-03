<?php

// Load config
require_once 'assets/config/config.php';

// Check if setup already done
if (file_exists(SETUP_FLAG_FILE)) {
    echo "Setup has already been completed. The SQL setup won't run again.<br>";
    echo '<a href="home.php">Home page</a>';
    exit;
}

// Connect to MySQL
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create database
if ($mysqli->query("CREATE DATABASE IF NOT EXISTS " . DB_NAME)) {
    echo "Database '" . DB_NAME . "' created or already exists.<br>";
} else {
    die("Error creating database: " . $mysqli->error);
}
$mysqli->select_db(DB_NAME);

// Function to run SQL
function executeSQLFile(string $filename, mysqli $link): void
{
    if (!file_exists($filename)) {
        die("SQL file not found: $filename");
    }

    $sql = file_get_contents($filename);

    if ($link->multi_query($sql)) {
        do {
            if ($result = $link->store_result()) {
                $result->free();
            }
        } while ($link->more_results() && $link->next_result());

        echo "SQL setup executed successfully.<br>";
        file_put_contents(SETUP_FLAG_FILE, 'Database setup complete on ' . date('Y-m-d H:i:s'));
    } else {
        die("SQL execution error: " . $link->error);
    }
}

executeSQLFile(SQL_FILE_PATH, $mysqli);
$mysqli->close();

echo '<a href="home.php">Home page</a>';
