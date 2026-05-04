<?php

function showMessagePage($title, $messages, $linkText, $linkUrl) {
    if (!is_array($messages)) {
        $messages = array($messages);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="login_and_registration_style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
</head>
<body>
    <section class="register-section">
        <div class="container">
            <div class="register-box">
                <h2><?php echo htmlspecialchars($title); ?></h2>

                <?php
                foreach ($messages as $message) {
                    echo "<p>" . htmlspecialchars($message) . "</p>";
                }
                ?>

                <p class="login-link">
                    <a href="<?php echo htmlspecialchars($linkUrl); ?>">
                        <?php echo htmlspecialchars($linkText); ?>
                    </a>
                </p>
            </div>
        </div>
    </section>
</body>
</html>
<?php
    exit();
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: registration.php");
    exit();
}

$name = isset($_POST["name"]) ? trim($_POST["name"]) : "";
$address = isset($_POST["address"]) ? trim($_POST["address"]) : "";
$phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : "";
$email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
$username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
$password = isset($_POST["password"]) ? trim($_POST["password"]) : "";

$errors = array();

if ($name == "") {
    $errors[] = "Name cannot be empty.";
} elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
    $errors[] = "Name must only contain letters and spaces.";
}

if ($address == "") {
    $errors[] = "Address cannot be empty.";
} elseif (!preg_match("/^[a-zA-Z0-9 ]+$/", $address)) {
    $errors[] = "Address must only contain letters, numbers and spaces.";
}

if ($phone == "") {
    $errors[] = "Phone number cannot be empty.";
} elseif (!preg_match("/^1[0-9]{10}$/", $phone)) {
    $errors[] = "Please enter a valid Chinese phone number.";
}

if ($email == "") {
    $errors[] = "Email cannot be empty.";
} elseif (!preg_match("/^[0-9a-zA-Z]+@[0-9a-zA-Z]+\.(cn|com)$/", $email)) {
    $errors[] = "Please enter a valid email address.";
}

if ($username == "") {
    $errors[] = "Username cannot be empty.";
} elseif (!preg_match("/^[a-zA-Z0-9]{6,}$/", $username)) {
    $errors[] = "Username must be at least 6 characters and contain only letters and numbers.";
}

if ($password == "") {
    $errors[] = "Password cannot be empty.";
} elseif (!preg_match("/^[a-zA-Z0-9]{6,}$/", $password)) {
    $errors[] = "Password must be at least 6 characters and contain only letters and numbers.";
}

if (!empty($errors)) {
    showMessagePage(
        "Registration Failed",
        $errors,
        "Back to Registration",
        "registration.php"
    );
}

showMessagePage(
    "Registration Data Validated",
    "The form data has been received and passed backend validation.",
    "Back to Registration",
    "registration.php"
);
?>