<?php

return [
    'database' => [
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'signature_cuisine',
        'charset' => 'utf8mb4',
        'username' => 'root',
        'password' => '1234'
    ],
    'paths' => [
        'sql_file' => __DIR__ . '/../sql/restaurantdb.txt',
        'setup_flag' => __DIR__ . '/../../setup/setup_completed.flag'
    ]
];
