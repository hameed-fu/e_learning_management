<!DOCTYPE html>
<html lang="en">

<?php include ('parts/head.php') ?>


<?php
include ('parts/connection.php');




if(isset($_POST['save'])){
    
    $title = $_POST['title'];
    $subject_id = $_POST['subject_id'];
    $description = $_POST['description'];
    $instructor_id = $_POST['instructor_id'];
    $Content_URL = $_POST['Content_URL'];
    $lecture_id = $_POST['lecture_id'];
   
    
    $sql = "UPDATE  lectures set instructor_id = '$instructor_id', title = '$title', subject_id ='$subject_id',description='$description', content_URL = '$Content_URL'  where lecture_id = $lecture_id";
    $state = $conn->query($sql);
    if($state){
        
        header("Location: lectures.php");
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
    <?php 
    
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
       
        $sql = "select * from lectures where lecture_id =  $id";
        $result = $conn->query($sql);
        $lecture = $result->fetch_array();
    
    
    }
    ?>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> Lectures</h4>
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
                                                <option <?php echo $row['instructor_id'] == $lecture['instructor_id'] ? 'selected' : '' ?> value="<?php echo $row['instructor_id'] ?>"><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                         
                                    </div>
                                         
                                     
                                   
                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input type="text" value="<?php echo $lecture['title'] ?>" class="form-control" id="name" name="title">
                                         
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="name">Subject</label>
                                        <?php 

                                            $sql = "SELECT * FROM subjects";
                                            // runt the above query
                                            $result = $conn->query($sql);

                                        ?>
                                        <select name="subject_id" class="form-control">
                                            <option>Please Select</option>
                                            <?php while($row = $result->fetch_assoc()){ ?>
                                                <option <?php echo $row['subject_id'] == $lecture['subject_id'] ? 'selected' : '' ?> value="<?php echo $row['subject_id'] ?>"><?php echo $row['title'] ?> - <?php echo $row['code'] ?></option>
                                            <?php } ?>
                                        </select>
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>
                                        <textarea name="description" class="form-control"  id=""><?php echo $lecture['description'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name"> Content URL</label>
                                        <input type="text" value="<?php echo $lecture['content_URL'] ?>" class="form-control" id="name" name="Content_URL">
                                         
                                         
                                    </div>
                    
                                    <input type="hidden" name="lecture_id" value="<?php echo $lecture['lecture_id'] ?>">
                    
                                    
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