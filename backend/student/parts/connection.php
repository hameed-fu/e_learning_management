<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "lms_ak";

$base_url = "http://localhost/lms/backend/student";
$main_url = "http://localhost/lms/backend";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// else{
//     echo "Connection created successfully";
// }
