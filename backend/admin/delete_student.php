<?php 
include('parts/connection.php');

if(isset($_GET['id'])){

    $student_id = $_GET['id'];
    $sqlDelet = "DELETE FROM students where id= '$student_id'";
    
    $deleted = $conn->query($sqlDelet);
    if($deleted){
        header('Location: students.php');
    }
}



?>