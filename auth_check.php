<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["seller_id"]) || !isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>