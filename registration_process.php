<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"] ?? "";
    $address = $_POST["address"] ?? "";
    $phone = $_POST["phone"] ?? "";
    $email = $_POST["email"] ?? "";
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Registration Process</title>";
    echo "</head>";
    echo "<body>";

    echo "<h2>Registration Data Received</h2>";
    echo "<p>This is the Step 2 registration process skeleton.</p>";

    echo "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>";
    echo "<p><strong>Address:</strong> " . htmlspecialchars($address) . "</p>";
    echo "<p><strong>Phone:</strong> " . htmlspecialchars($phone) . "</p>";
    echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
    echo "<p><strong>Username:</strong> " . htmlspecialchars($username) . "</p>";

    echo "<p>Password received but not displayed for security.</p>";

    echo "<p><a href='registration.php'>Back to Registration</a></p>";

    echo "</body>";
    echo "</html>";

} else {
    header("Location: registration.php");
    exit();
}
?>