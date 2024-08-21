<?php
include '../parts/connection.php';
if (isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];
    $sql = "SELECT * FROM subjects WHERE course_id = '$course_id'";
    $state = $conn->query($sql);
    $subjects = [];
    if ($state) {
        while ($row = $state->fetch_assoc()) {
            $subjects[] = [
                'id' => $row['subject_id'],
                'title' => $row['title']
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($subjects);
    }
}
