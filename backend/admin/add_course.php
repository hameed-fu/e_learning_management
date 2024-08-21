<?php 
include 'session_check.php';
check_user_role("admin");
?>
<!DOCTYPE html>
<html lang="en">

<?php
 
include ('parts/head.php');
 ?>


<?php
include ('parts/connection.php');

if(isset($_POST['save'])){
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];
    $number_of_students = $_POST['number_of_students'];
    $category_id = $_POST['category_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    

    
    $sql = "INSERT INTO courses(course_name, course_description,category_id,number_of_students,start_date,end_date) values('$course_name','$course_description',' $category_id','$number_of_students','$start_date','$end_date')";
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
                                <h4 class="card-title"></h4>
                            
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="name">Course Name</label>
                                        <input type="text" class="form-control" id="name" name="course_name">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Number Of Students</label>
                                        <input type="text" name="number_of_students" class="form-control"  id="">
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
                                            <?php while($row = $result->fetch_assoc()){ ?>
                                                <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="name"> Start Date</label>
                                        <input min="<?php echo date('Y-m-d') ?>" value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="name" name="start_date">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">End Date</label>
                                        <input min="<?php echo date('Y-m-d') ?>" value="<?php echo date('Y-m-d') ?>" type="date" name="end_date" class="form-control"  id="">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Course Description</label>
                                        <textarea name="course_description" class="form-control"  id=""></textarea>
                                    </div>
                                    
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