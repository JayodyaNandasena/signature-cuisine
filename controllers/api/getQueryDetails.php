<?php
require_once __DIR__ . '/../../Core/Database.php';
use Core\database;

header('Content-Type: application/json');

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Query ID required']);
    exit;
}

$id = $_GET['id'];

try {
    $pdo = database::getInstance()->getConnection();

    $stmt = $pdo->prepare(
        "SELECT id, senderName, email, subject, message, DATE(date) AS date
         FROM queries
         WHERE id = ?"
    );
    $stmt->execute([$id]);
    $query = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($query) {
        echo json_encode($query);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Query not found']);
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'database error']);
}
