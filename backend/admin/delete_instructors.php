<?php 
include('parts/connection.php');

if(isset($_GET['id'])){
    $instructor_id = $_GET['id'];
    $sqlDelet = "DELETE FROM Instructors where id= '$instructor_id'";
    
    $deleted = $conn->query($sqlDelet);
    if($deleted){
        header('Location: instructors.php');
    }
}

?>