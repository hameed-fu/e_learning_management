<?php
include 'parts/connection.php';
include 'session_check.php';
check_user_role("student");
?>

<!DOCTYPE html>
<html lang="en">

<?php include('parts/head.php') ?>

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
        // include('parts/sidebar.php');
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
                    <?php
                    $c_sql = "select * from courses";
                    $c_result = $conn->query($c_sql);
                    while ($row = $c_result->fetch_assoc()) {
                    ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card gradient-<?php echo rand(1, 3) ?>">
                                <div class="card-body">
                                    <h3 class="card-title text-white"><?php echo $row['course_name'] ?></h3>
                                    <div class="d-inline-block">
                                        <h2 class="text-white"><?php echo $row['number_of_students'] ?></h2>
                                        <p class="text-white mb-0"><?php echo $row['start_date'] . " - " . $row['end_date'] ?></p>
                                    </div>
                                    <span class="float-right display-5 opacity-5"><i class="fa fa-book"></i></span>
                                </div>
                                <?php
                                $id = $_SESSION['id'];
                                $e_course_id = $row['course_id'];
                                $e_sql = "SELECT * FROM enrollments WHERE student_id = '$id' AND course_id = '$e_course_id'";
                                $e_result = $conn->query($e_sql);
                                if ($e_result->num_rows > 0) {
                                } else {
                                ?>
                                    <form action="" method="post">
                                        <input type="hidden" name="student_id" value="<?php echo $_SESSION['id'] ?>">
                                        <input type="hidden" name="course_id" value="<?php echo $row['course_id'] ?>">
                                        <button style="width: 100%;" type="submit" name="submit" class="btn btn-secondary">Enroll</button>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
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
if (isset($_POST['submit'])) {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $enrollment_date = date('Y-m-d');

    $sql = "INSERT INTO enrollments (student_id, course_id, enrollment_date) 
    VALUES ('$student_id', '$course_id', '$enrollment_date')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>window.location.replace("index.php");</script>';
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>