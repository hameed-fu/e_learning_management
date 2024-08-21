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
include ('parts/connection.php');

if(isset($_POST['save'])){
    $title = $_POST['title'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $course_id = $_POST['course_id'];


    
    $sql = "INSERT INTO subjects(title, code, description,course_id) values('$title','$code', '$description','$course_id')";
    $state = $conn->query($sql);
    if($state){
        //echo "record added successfully";
        header("Location: subjects.php");
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
                                <h4 class="card-title">Add New Subject</h4>
                            
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input type="text" class="form-control" id="name" name="title">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Code</label>
                                        <input type="number" class="form-control" id="name" name="code">
                                         
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Course</label>
                                        <?php 
                                            $sql = "SELECT * FROM courses";
                                            // runt the above query
                                            $result = $conn->query($sql);

                                        ?>
                                        <select name="course_id" class="form-control">
                                            <option>Please Select</option>
                                            <?php while($row = $result->fetch_assoc()){ ?>
                                                <option value="<?php echo $row['course_id'] ?>"><?php echo $row['course_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                         
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>
                                        <textarea name="description" class="form-control"  id=""></textarea>
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