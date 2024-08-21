<?php 

session_start();

if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include ('parts/head.php') ?>


<?php 
include('parts/connection.php');

// select data from categories table
$sql = "SELECT * FROM courses";

// runt the above query
$result = $conn->query($sql);

?>

<?php 

include('parts/connection.php');
// select data from categories table
$sql = "SELECT courses.*, categories.category_name from courses
join categories on courses.category_id = categories.category_id
";

// runt the above query
$result = $conn->query($sql);



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
                        <a href="add_course.php" class="btn btn-primary mb-1"> Add New Course</a>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Course</h4>
                                 <table class="table table-hover table-striped">
                                    <tr>
                                        <th>1</th>
                                        <th>Course Name</th>
                                        <th>Number Of Students</th>
                                        <th>Category</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Course Description</th>
                                        <th>Action</th>
                                    </tr>
                                    <br>
                                    <br>
                                    <?php while($row = $result->fetch_assoc()){ ?>

                                        <tr>
                                            <td><?php echo  $row['course_id'] ?></td>
                                            <td><?php echo $row['course_name'] ?></td>
                                            <td><?php echo $row['number_of_students'] ?></td>
                                            <td><?php echo $row['category_name'] ?></td>
                                            <td><?php echo $row['start_date'] ?></td>
                                            <td><?php echo $row['end_date'] ?></td>
                                            <td><?php echo $row['course_description'] ?></td>
                                            <td>
                                                <a href="edit_courses.php?id=<?php echo $row['course_id'] ?>" class="btn btn-warning text-white">Edit</a>
                                                <a onclick="return confirm('are you sure?')" href="delete_course.php?id=<?php echo $row['course_id'] ?>" class="btn btn-danger text-white">Delete</a>
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