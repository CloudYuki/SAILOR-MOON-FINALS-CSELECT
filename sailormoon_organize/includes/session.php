<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: ../public/login.php");
    exit();
}
?>
