<?php
$servername = "localhost";
$username = "root";
$password = "1612151320aA";
$dbname = "AAAA_car_sale";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>