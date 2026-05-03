<?php
$servername = "localhost";
$username = "root";
$password = "inori520";
$dbname = "AAAA_car_sale";

$conn = mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error);
}
?>