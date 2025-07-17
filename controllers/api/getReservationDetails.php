<?php
require_once __DIR__ . '/../../Core/Database.php';

use Core\database;

header('Content-Type: application/json');

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Reservation ID required']);
    exit;
}

$id = $_GET['id'];

try {
    $pdo = database::getInstance()->getConnection();

    $stmt = $pdo->prepare(
        "SELECT r.id, r.date, r.time, r.guestCount, r.notes,
                c.firstName, c.lastName, c.email, c.phone, b.name AS branchName
         FROM reservation r
         INNER JOIN branch b ON r.branchId = b.id
         INNER JOIN customerDetails c ON r.customerId = c.id
         WHERE r.id = ?"
    );
    $stmt->execute([$id]);
    $reservation = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($reservation) {
        echo json_encode($reservation);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Reservation not found']);
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'database error']);
}
