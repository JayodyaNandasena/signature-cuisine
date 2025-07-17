<?php

namespace Core;

use PDO;
use PDOException;

class database
{
    private static $instance = null;
    private $connection;
    private $statement;
    private $config;

    // Private constructor to prevent direct instantiation
    private function __construct()
    {
        $this->config = require_once __DIR__ . '/../assets/config/config.php';

        try {
            $dbConfig = $this->config['database'];
            $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset={$dbConfig['charset']}";

            $this->connection = new PDO($dsn, $dbConfig['username'], $dbConfig['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            die("database connection failed: " . $e->getMessage());
        }
    }

    // Get the singleton instance
    public static function getInstance(): ?database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Get the PDO connection
    public function getConnection(): PDO
    {
        return $this->connection;
    }

    public function query($query, $params = []): database
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (!$result) {
            http_response_code(404);
            die("Record not found");
        }

        return $result;
    }

    public function prepare($query)
    {
        return $this->connection->prepare($query);
    }

    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }

    // Prevent cloning and unserialization
    private function __clone()
    {
    }

    public function __wakeup()
    {
    }
}