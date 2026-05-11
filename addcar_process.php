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
$upload_warning = false;

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $upload_dir = __DIR__ . '/uploads/';

    if (is_writable($upload_dir)) {
        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $image_name = 'car_' . time() . '.' . $extension;

        $target_file = $upload_dir . $image_name;
        $target_path = 'uploads/' . $image_name;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image_path = $target_path;
        } else {
            $upload_warning = true;
        }
    } else {
        $upload_warning = true;
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

    if ($image_path !== '') {
        header("Location: addcar.php?success=1&upload=success");
    } elseif ($upload_warning) {
        header("Location: addcar.php?success=1&upload=warning");
    } else {
        header("Location: addcar.php?success=1&upload=none");
    }

    exit();
} else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>