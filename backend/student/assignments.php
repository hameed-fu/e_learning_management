<?php
include 'session_check.php';
check_user_role("student");
?>
<!DOCTYPE html>
<html lang="en">

<?php include('parts/head.php') ?>


<?php
include('parts/connection.php');

?>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <?php

        include('parts/header.php')
        ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php
        include('parts/sidebar.php');
        ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Assignments</h4>
                                <table class="table table-hover table-striped">
                                    <tr>
                                        <th>Instructor</th>
                                        <th>Lecture</th>
                                        <th>Description</th>
                                        <th>Due Date</th>
                                        <th>Assignment</th>
                                    </tr>
                                    <?php
                                    $id = $_GET['id'];
                                    $sql = "SELECT assignments.*, instructors.first_name as InstructorFirstName,instructors.last_name as InstructorLastName, lectures.title as LectureTitle 
                                    FROM assignments
                                    join instructors on instructors.id = assignments.instructor_id
                                    join lectures on lectures.lecture_id = assignments.lecture_id
                                    WHERE assignments.lecture_id = '$id'";
                                    // runt the above query
                                    $result = $conn->query($sql);

                                    while ($row = $result->fetch_assoc()) {
                                    ?>

                                        <tr>
                                            <td><?php echo $row['InstructorFirstName'] ?>
                                                <?php echo $row['InstructorLastName'] ?></td>
                                            <td><?php echo $row['title'] ?></td>
                                            <td><?php echo $row['description'] ?></td>
                                            <td><?php echo $row['due_date'] ?></td>


                                            <td>
                                                <?php include 'models/view_assignment.php'; ?>
                                            </td>
                                        </tr>

                                    <?php } ?>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->

        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <?php include('parts/footer.php') ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('parts/script.php') ?>

</body>

</html>

<?php

if (isset($_POST['submit_assignment'])) {


    $assignment_id = $_POST['assignment_id'];
    $student_id = $_SESSION['id'];
    $solution = $_FILES['solution'];
    $submission_date = date('Y-m-d H:i:s');

    $fileTmpPath = $_FILES['solution']['tmp_name'];
    $fileName = $_FILES['solution']['name'];
    $dest_path = 'assignment_submissions/' . $fileName;

    if (move_uploaded_file($fileTmpPath, $dest_path)) {
        $solution = $dest_path;
    } else {
        echo "There was an error moving the uploaded file.";
        exit;
    }

    $sql = "INSERT INTO assignment_submission (assignment_id, student_id, solution, submission_date) 
        VALUES ('$assignment_id', '$student_id', '$solution', '$submission_date')";
    $state = $conn->query($sql);
    if ($state) {
        header("Location: assignments.php?id=" . $assignment_id);
    }
}

?>