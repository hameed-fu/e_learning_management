<?php
include 'parts/connection.php';
include 'session_check.php';
check_user_role("instructor");
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
                    <?php
                    $id = $_SESSION['id'];

                    $sql = "SELECT DISTINCT lectures.instructor_id,
                            courses.course_id AS course_id,
                            courses.course_name AS c_name,
                            courses.start_date AS start_date, 
                            courses.end_date AS end_date,
                            categories.category_name as cat_name
                            FROM
                            lectures
                            JOIN subjects ON subjects.subject_id = lectures.subject_id 
                            JOIN courses ON subjects.course_id = courses.course_id
                            JOIN categories ON courses.category_id = categories.category_id
                            WHERE
                            lectures.instructor_id = '$id'";

                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) { ?>

                        <div class="col-lg-6 col-sm-6">
                            <div class="card gradient-1">
                                <a href="subjects.php?id=<?php echo $row['course_id'] ?>">
                                    <div class="card-body">
                                        <h3 class="card-title text-white"><?php echo $row['cat_name'] ?></h3>
                                        <div class="d-inline-block">
                                            <h2 class="text-white"><?php echo $row['c_name'] ?></h2>
                                            <p class="text-white mb-0"><?php echo date('F j, Y', strtotime($row['start_date'])) . " - " . date('F j, Y', strtotime($row['end_date'])) ?></p>
                                        </div>
                                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
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