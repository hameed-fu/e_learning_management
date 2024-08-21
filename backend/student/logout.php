<?php
include 'parts/connection.php';
session_start();
session_unset();
session_destroy();
header("Location: $main_url/login.php");
exit();
?>
