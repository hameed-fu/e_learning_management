<?php
include 'session_check.php';
check_user_role("admin");
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
        include('parts/connection.php');
        include('parts/connection.php');
        include('parts/connection.php');
        include('parts/connection.php');
        include('parts/connection.php');
        $sql = "SELECT COUNT(*) AS instructor_count FROM instructors";
        $result = $conn->query($sql);
        $instructor = $result->fetch_assoc();

        $sql = "SELECT COUNT(*) AS student_count FROM students";
        $result = $conn->query($sql);
        $student = $result->fetch_assoc();

        $sql = "SELECT COUNT(*) AS courses_count FROM courses";
        $result = $conn->query($sql);
        $courses = $result->fetch_assoc();

        $sql = "SELECT COUNT(*) AS enrollments_count FROM enrollments";
        $result = $conn->query($sql);
        $enrollments = $result->fetch_assoc();

        $sql = "SELECT COUNT(*) AS subjects_count FROM subjects";
        $result = $conn->query($sql);
        $subjects = $result->fetch_assoc();

        $sql = "SELECT COUNT(*) AS lectures_count FROM lectures";
        $result = $conn->query($sql);
        $lectures = $result->fetch_assoc();


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
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Instructors</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $instructor['instructor_count'] ?></h2>
                                    <p class="text-white mb-0">-</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Students</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $student['student_count'] ?></h2>
                                    <p class="text-white mb-0">-</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    
                    

                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-7">
                            <div class="card-body">
                                <h3 class="card-title text-white">Courses</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $courses['courses_count'] ?></h2>
                                    <p class="text-white mb-0">-</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-8">
                            <div class="card-body">
                                <h3 class="card-title text-white">Enrollments</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $enrollments['enrollments_count'] ?></h2>
                                    <p class="text-white mb-0">-</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-9">
                            <div class="card-body">
                                <h3 class="card-title text-white">Subjects</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $subjects['subjects_count'] ?></h2>
                                    <p class="text-white mb-0">-</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-7">
                            <div class="card-body">
                                <h3 class="card-title text-white">Lectures</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $lectures['lectures_count'] ?></h2>
                                    <p class="text-white mb-0">-</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
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