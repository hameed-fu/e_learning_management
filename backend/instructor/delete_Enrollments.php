<?php 
include('parts/connection.php');

if(isset($_GET['id'])){

    $lecture_id = $_GET['id'];
    $sqlDelet = "DELETE FROM Enrollments where enrollment_id= '$enrollment_id'";
    
    $deleted = $conn->query($sqlDelet);
    if($deleted){
        header('Location: Enrollments.php');
    }
}



?>