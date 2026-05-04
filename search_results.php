<?php
require_once 'db_connect.php';
header('Content-Type: application/json; charset=utf-8');

$model = isset($_GET['model']) ? trim($_GET['model']) : '';
$year  = isset($_GET['year'])  ? trim($_GET['year'])  : '';

$sql = "SELECT colour, model, year, location, price, image FROM cars WHERE 1=1";
$params = [];
$types = '';

if ($model !== '') {
    $sql .= " AND model LIKE ?";
    $params[] = '%' . $model . '%';
    $types .= 's';
}
if ($year !== '') {
    $sql .= " AND year = ?";
    $params[] = $year;
    $types .= 's';
}

$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['error' => 'SQL prepare failed: ' . mysqli_error($conn)]);
    exit;
}

if (!empty($params)) {
    mysqli_stmt_bind_param($stmt, $types, ...$params);
}

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$cars = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($cars);

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>