<?php 
include('parts/connection.php');

if(isset($_GET['id'])){

    $assignment_id = $_GET['id'];
    $lecture_id = $_GET['lecture_id'];
    $sqlDelet = "DELETE FROM assignments where assignment_id= '$assignment_id'";
    
    $deleted = $conn->query($sqlDelet);
    
    if($deleted){
        header('Location: assignments.php?id='.$lecture_id);
    }
}



?>