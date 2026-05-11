<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "AAAA_car_sale";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8mb4");
?>