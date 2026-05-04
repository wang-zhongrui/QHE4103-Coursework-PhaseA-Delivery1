<?php
require_once 'auth_check.php';

$host = "localhost";
$username = "root";
$password = "";
$database = "AAAA_car_sale";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// For testing purposes, we will use a hardcoded seller_id. In a real application, this would come from the session after the user logs in.
$seller_id = 1;

// $seller_id = $_SESSION['seller_id'];

$colour = $_POST['colour'];
$model = $_POST['model'];
$year = $_POST['year'];
$location = $_POST['location'];
$price = $_POST['price'];

$image_name = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];

$target_path = "uploads/" . $image_name;

move_uploaded_file($tmp_name, $target_path);

$sql = "INSERT INTO cars (seller_id, colour, model, year, location, price, image)
        VALUES ('$seller_id', '$colour', '$model', '$year', '$location', '$price', '$target_path')";

if ($conn->query($sql) === TRUE) {
    header("Location: addcar.php?success=1");
    exit();
} else {
    echo "Error: " . $conn->error;
}
?>