<?php
session_start();

function check_user_role($required_role) {
    include 'parts/connection.php';
    if (!isset($_SESSION['email']) || !isset($_SESSION['role'])) {
        header("Location: $main_url/login.php");
        exit();
    }

    $user_role = $_SESSION['role'];

    if ($user_role !== $required_role) {
        header("Location: $main_url/login.php");
        exit();
    }
}