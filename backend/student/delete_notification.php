<?php 
include('parts/connection.php');

if(isset($_GET['id'])){

    $notification_id = $_GET['id'];
    $sqlDelet = "DELETE FROM notifications where notification_id= '$notification_id'";
    
    $deleted = $conn->query($sqlDelet);
    if($deleted){
        header('Location: notifications.php');
    }
}



?>