<?php
include 'session_check.php';
check_user_role("admin");
?>

<!DOCTYPE html>
<html lang="en">

<?php include ('parts/head.php') ?>


<?php
include ('parts/connection.php');
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

        include ('parts/header.php')
            ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php
        include ('parts/sidebar.php');
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
                                <h4 class="card-title">Certificates</h4>
                                <table class="table table-hover table-striped">
                                    <tr>
                                        <th>#</th>
                                        <th>Student</th>
                                        <th>Course</th>
                                        <th>Enrollment Date</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    // select data from categories table
                                    $sql = "SELECT enrollments.*, students.id as s_id, students.first_name as student_first_name, students.last_name as student_last_name, courses.course_id as c_id, courses.course_name AS course_title
                                    FROM enrollments
                                    JOIN students ON students.id = enrollments.student_id
                                    JOIN courses ON courses.course_id = enrollments.course_id";

                                    // runt the above query
                                    $result = $conn->query($sql);

                                    while ($row = $result->fetch_assoc()) { ?>

                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['student_first_name'] . " " . $row['student_last_name'] ?>
                                            </td>
                                            <td><?php echo $row['course_title'] ?></td>
                                            <td><?php echo $row['enrollment_date'] ?></td>
                                            <td>
                                                <a href="certificate.php?student_id=<?php echo $row['s_id'] ?>&course_id=<?php echo $row['c_id'] ?>"
                                                    class="btn btn-warning text-white">Generate Certificate</a>
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
    <?php include ('parts/footer.php') ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include ('parts/script.php') ?>

</body>

</html>
