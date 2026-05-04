<?php
session_start();

if (!isset($_SESSION['seller_id'])) {
    header("Location: login.php");
    exit();
}
?>