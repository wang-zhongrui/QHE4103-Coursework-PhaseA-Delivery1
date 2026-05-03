<?php

require_once 'db_connect.php';

header('Content-Type: application/json; charset=utf-8');

$model = isset($_GET['model']) ? trim($_GET['model']) : '';
$year  = isset($_GET['year'])  ? trim($_GET['year'])  : '';

$sql = "SELECT colour, model, year, location, price, image FROM cars WHERE 1=1";
$params = [];

if ($model !== '') {
    $sql .= " AND model LIKE :model";
    $params[':model'] = '%' . $model . '%';
}
if ($year !== '') {
    $sql .= " AND year = :year";
    $params[':year'] = $year;
}

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($cars);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Query failed']);
}
?>