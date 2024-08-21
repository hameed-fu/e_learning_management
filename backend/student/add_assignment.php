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
    $instructor_id = $_POST['instructor_id'];
    $lecture_id = $_POST['lecture_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    
    

    
    $sql = "INSERT INTO assignments(instructor_id, lecture_id,title,description,due_date) values('$instructor_id',' $lecture_id',' $title',' $description','$due_date')";
    $state = $conn->query($sql);
    if($state){
        //echo "record added successfully";
        header("Location: assignments.php");
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
                                        <label for="name">Instructor</label>
                                        
                                        <?php 

                                            $sql = "SELECT * FROM instructors";
                                            // runt the above query
                                            $result = $conn->query($sql);

                                        ?>
                                        <select name="instructor_id" class="form-control">
                                            <option>Please Select</option>
                                            <?php while($row = $result->fetch_assoc()){ ?>
                                                <option value="<?php echo $row['instructor_id'] ?>"><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Lecture</label>
                                        

                                        <?php 

                                            $sql = "SELECT * FROM lectures";
                                            // runt the above query
                                            $result = $conn->query($sql);

                                        ?>
                                        <select name="lecture_id" class="form-control">
                                            <option>Please Select</option>
                                            <?php while($row = $result->fetch_assoc()){ ?>
                                                <option value="<?php echo $row['lecture_id'] ?>"><?php echo $row['title'] ?></option>
                                            <?php } ?>
                                        </select>
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input type="text" class="form-control" id="name" name="title">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>
                                        <textarea name="description" class="form-control"  id=""></textarea>
                                    </div>
                                   
                                   
                                    

                                    <div class="form-group">
                                        <label for="name"> Submission Date</label>
                                        <input type="date" class="form-control" id="name" name="due_date">
                                         
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