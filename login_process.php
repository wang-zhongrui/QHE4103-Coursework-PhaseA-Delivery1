<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        header("Location: login.php?error=empty");
        exit();
    }

    $sql = "SELECT seller_id, username, password FROM sellers WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row["password"])) {
                $_SESSION["seller_id"] = $row["seller_id"];
                $_SESSION["username"] = $row["username"];

                header("Location: addcar.php");
                exit();
            } else {
                header("Location: login.php?error=invalid");
                exit();
            }
        } else {
            header("Location: login.php?error=invalid");
            exit();
        }

        mysqli_stmt_close($stmt);
    } else {
        header("Location: login.php?error=server");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}

mysqli_close($conn);
?>