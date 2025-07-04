<?php
namespace Core;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;
    private $connection;
    private $statement;

    private $host = 'localhost';
    private $username = 'root';
    private $password = '1234';
    private $database = 'signature_cuisine';

    // Private constructor to prevent direct instantiation
    private function __construct() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->database};charset=utf8mb4";
            $this->connection = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    // Get the singleton instance
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Get the PDO connection
    public function getConnection() {
        return $this->connection;
    }

    public function query($query, $params = [])
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

    public function prepare($query) {
        return $this->connection->prepare($query);
    }

    // Prevent cloning and unserialization
    private function __clone() {}
    public function __wakeup() {}
}
