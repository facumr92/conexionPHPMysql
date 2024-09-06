<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("location:ingreso_login.php");
    exit();
} else {
    $email = $_SESSION["email"];
}