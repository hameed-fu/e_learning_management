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
                        <a href=".php" class="btn btn-primary mb-1"> Assignement Submission</a>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> </h4>
                                 <table class="table table-hover table-striped">
                                    <tr>
                                        <th>1</th>
                                        <th>Student id</th>
                                        <th>Assignements Id</th>
                                        <th> submission Date</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        
                                        <td>
                                            <a class="btn btn-warning text-white">Edit</a>
                                            <a class="btn btn-danger text-white">Submitt</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Assignemnts Description</td>
                                        <td>Assignements Marks</td>
                                        <td>Assignemts Last Date</td>
                                        
                                        <td>
                                            <a class="btn btn-warning text-white">Edit</a>
                                            <a class="btn btn-danger text-white">Submit</a>
                                        </td>
                                    </tr>
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