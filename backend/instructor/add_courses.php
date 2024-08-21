
<?php 

session_start();

if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
}

?><!DOCTYPE html>
<html lang="en">

<?php include ('parts/head.php') ?>


<?php
include ('parts/connection.php');

if(isset($_POST['save'])){
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];
    $number_of_students = $_POST['number_of_students'];
    $category_id = $_POST['category_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    

    
    $sql = "INSERT INTO courses(course_name, course_description,number_of_students,category_id,start_date,end_date) values('$course_name','$course_description','$number_of_students',' $category_id','$start_date','$end_date')";
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
                                        <label for="name">Cource Name</label>
                                        <input type="text" class="form-control" id="name" name="course_name">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Number Of Students</label>
                                        <textarea name="number_of_students" class="form-control"  id=""></textarea>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Category_Id</label>
                                        <?php 

                                            $sql = "SELECT * FROM courses";
                                            // runt the above query
                                            $result = $conn->query($sql);

                                        ?>
                                        <select name="courses" class="form-control">
                                            <option>Please Select</option>
                                            <?php while($row = $result->fetch_assoc()){ ?>
                                                <option value="<?php echo $row['catergory_Id'] ?>"></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="name"> Start Date</label>
                                        <input type="date" class="form-control" id="name" name="start_date">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">End Date</label>
                                        <input type="date" name="end_date" class="form-control"  id="">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">course_description</label>
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