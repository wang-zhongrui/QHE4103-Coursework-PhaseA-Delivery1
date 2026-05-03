<?php
session_start();

$colour = $_POST['colour'];
$model = $_POST['model'];
$year = $_POST['year'];
$location = $_POST['location'];
$price = $_POST['price'];

$image = $_FILES['image']['name'];

echo $colour;
echo "<br>";
echo $model;
echo "<br>";
echo $image;
?>