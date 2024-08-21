<?php
include '../parts/connection.php';
if (isset($_POST['subject_id'])) {
    $subject_id = $_POST['subject_id'];
    $sql = "SELECT * FROM lectures WHERE subject_id = '$subject_id'";
    $state = $conn->query($sql);
    $lectures = [];
    if ($state) {
        while ($row = $state->fetch_assoc()) {
            $lectures[] = [
                'id' => $row['lecture_id'],
                'title' => $row['title']
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($lectures);
    }
}
