<?php 
include('parts/connection.php');

if(isset($_GET['id'])){

    $course_id = $_GET['id'];
    $sqlDelet = "DELETE FROM courses where course_id= '$course_id'";
    
    $deleted = $conn->query($sqlDelet);
    if($deleted){
        header('Location: courses.php');
    }
}



?>