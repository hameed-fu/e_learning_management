<?php 
include('parts/connection.php');

if(isset($_GET['id'])){

    $category_id = $_GET['id'];
    $sqlDelet = "DELETE FROM categories where category_id= '$category_id'";
    
    $deleted = $conn->query($sqlDelet);
    if($deleted){
        header('Location: categories.php');
    }
}



?>