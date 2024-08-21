<!DOCTYPE html>
<html lang="en">

<?php include ('parts/head.php') ?>


<?php
include ('parts/connection.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
     
    $sql = "select * from courses where course_id =  $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

}


if(isset($_POST['save'])){
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];
    $category_id = $_POST['category_id'];
    $number_of_students = $_POST['number_of_students']; 
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $course_id = $_POST['course_id'];
    
    $sql = "UPDATE  courses set course_name = '$course_name', course_description = '$course_description', category_id ='$category_id', number_of_students = '$number_of_students',start_date =  '$start_date',end_date = '$end_date' where course_id = '$course_id'";
    $state = $conn->query($sql);
    if($state){
        //echo "record added successfully";
        header("Location: courses.php");
    }
}


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
                                <h4 class="card-title">Edit Course</h4>
                            
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="name">Course Name</label>
                                        <input type="text" value="<?php echo $row['course_name'] ?>" class="form-control" id="name" name="course_name">
                                     
                                         
                                    
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Course Description</label>
                                        <input type="text" value="<?php echo $row['course_description'] ?>" class="form-control" id="name" name="course_description">




                                        

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Category</label>
                                        <?php 

                                            $sql = "SELECT * FROM categories";
                                            // runt the above query
                                            $result = $conn->query($sql);

                                        ?>
                                        <select name="category_id" class="form-control">
                                            <option>Please Select</option>
                                            <?php while($category = $result->fetch_assoc()){ ?>
                                                <option <?php echo $category['category_id'] == $row['category_id'] ? 'selected' : '' ?> value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="name">Number of student</label>
                                        <input type="number" class="form-control" value="<?php echo $row['number_of_students'] ?>" id="phone" name="number_of_students">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Start Date</label>
                                        <input type="date" class="form-control" value="<?php echo $row['start_date'] ?>" id="phone" name="start_date">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="name">End date</label>
                                        <input type="date" class="form-control" value="<?php echo $row['end_date'] ?>" id="phone" name="end_date">
                                         
                                    </div>
                                    <input type="hidden" value="<?php echo $row['course_id'] ?>" name="course_id">
                                   
                                    
                                    <button type="submit" name="save" class="btn btn-primary">Submit</button>
                                </form>
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
        Main wrapper endd
    ***********************************-->
    <?php include ('parts/footer.php') ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include ('parts/script.php') ?>

</body>

</html>