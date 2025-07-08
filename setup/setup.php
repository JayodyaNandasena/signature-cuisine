<?php
$config = require_once '../assets/config/config.php';

if (file_exists($config['paths']['setup_flag'])) {
    echo "Setup has already been completed.<br>";
    echo '<a href="../controllers/home.php">Go to Application</a>';
    exit;
}

$mysqli = new mysqli(
    $config['database']['host'],
    $config['database']['username'],
    $config['database']['password']);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (!$mysqli->query("CREATE DATABASE IF NOT EXISTS " . $config['database']['dbname'])) {
    die("Error creating DB: " . $mysqli->error);
}
$mysqli->select_db($config['database']['dbname']);

function executeSQLFile(string $filename, mysqli $link, string $flagPath): void
{
    if (!file_exists($filename)) {
        die("Missing SQL file: $filename");
    }

    $sql = file_get_contents($filename);
    if ($link->multi_query($sql)) {
        do {
            if ($result = $link->store_result()) {
                $result->free();
            }
        } while ($link->more_results() && $link->next_result());

        file_put_contents($flagPath, 'Setup done: ' . date('Y-m-d H:i:s'));
        echo "Database setup complete.";
    } else {
        die("SQL Error: " . $link->error);
    }
}

executeSQLFile(
    $config['paths']['sql_file'],
    $mysqli,
    $config['paths']['setup_flag']
);
$mysqli->close();

echo '<a href="../controllers/home.php">Go to Application</a>';
