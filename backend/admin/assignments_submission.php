<!DOCTYPE html>
<html lang="en">

<?php include ('parts/head.php') ?>

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
                                <h4 class="card-title"> </h4>
                                <table class="table table-hover table-striped">
                                    <tr>
                                        <th>#</th>
                                        <th>Student</th>
                                        <th>Submission Date</th>
                                        <th>Solution</th>
                                    </tr>
                                    <?php
                                    include 'parts/connection.php';
                                    $assignment_id = $_GET['assignment_id'];
                                    $sql = "SELECT assignment_submission.*, students.first_name AS s_fname, students.last_name AS s_lname 
                                    FROM assignment_submission
                                    JOIN students ON students.id = assignment_submission.student_id
                                    WHERE assignment_submission.assignment_id = '$assignment_id'";
                                    $result = $conn->query($sql);

                                    while ($row = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['s_fname'] . " " . $row['s_lname'] ?></td>
                                            <td><?php echo $row['submission_date'] ?></td>
                                            <td>
                                                
                                                <a class="badge bg-secondary text-white" href="<?php echo $main_url."/student/".$row['solution'] ?>" target="_blank">Solution</a>
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

</html>t