<?php 
include('parts/connection.php');

if(isset($_GET['id'])){

    $lecture_id = $_GET['id'];
    $sqlDelet = "DELETE FROM lectures where lecture_id= '$lecture_id'";
    
    $deleted = $conn->query($sqlDelet);
    if($deleted){
        header('Location: lectures.php');
    }
}



?>