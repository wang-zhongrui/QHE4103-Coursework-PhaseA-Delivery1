<?php
require_once 'auth_check.php';
require_once 'db_connect.php';

$seller_id = $_SESSION['seller_id'];

$colour = isset($_POST['colour']) ? trim($_POST['colour']) : '';
$model = isset($_POST['model']) ? trim($_POST['model']) : '';
$year = isset($_POST['year']) ? trim($_POST['year']) : '';
$location = isset($_POST['location']) ? trim($_POST['location']) : '';
$price = isset($_POST['price']) ? trim($_POST['price']) : '';

$image_path = '';

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image_name = basename($_FILES['image']['name']);
    $tmp_name = $_FILES['image']['tmp_name'];
    $target_path = 'uploads/' . $image_name;

    if (move_uploaded_file($tmp_name, $target_path)) {
        $image_path = $target_path;
    }
}

$sql = "INSERT INTO cars (seller_id, colour, model, year, location, price, image)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("SQL prepare failed: " . mysqli_error($conn));
}

mysqli_stmt_bind_param(
    $stmt,
    "issssss",
    $seller_id,
    $colour,
    $model,
    $year,
    $location,
    $price,
    $image_path
);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("Location: addcar.php?success=1");
    exit();
} else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>