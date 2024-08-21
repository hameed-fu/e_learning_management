<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "lms_ak";

$conn = mysqli_connect($server, $username, $password, $database);

$base_url = "http://localhost/lms/backend/admin";
$main_url = "http://localhost/lms/backend";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// else{
//     echo "Connection created successfully";
// }
