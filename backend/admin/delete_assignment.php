<?php 
include('parts/connection.php');

if(isset($_GET['id'])){

    $assignment_id = $_GET['id'];
    $sqlDelet = "DELETE FROM assignments where assignment_id= '$assignment_id'";
    
    $deleted = $conn->query($sqlDelet);
    if($deleted){
        header('Location: assignments.php');
    }
}



?>