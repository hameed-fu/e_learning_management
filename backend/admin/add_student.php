<?php 
include 'session_check.php';
check_user_role("admin");
?>

<!DOCTYPE html>
<html lang="en">

<?php include ('parts/head.php') ?>


<?php
include ('parts/connection.php');

if(isset($_POST['save'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
     $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $phone= $_POST['phone'];
 
 
    $sql = "INSERT INTO students(first_name,last_name,email,address,password,phone) values('$first_name', '$last_name','$email','$address','$password', '$phone')";
    $state = $conn->query($sql);
   
    if($state){
        //echo "record added successfully";
        header("Location: students.php");
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
                                <h4 class="card-title">Add new student</h4>
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="first_name">FirstName</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name">
                                         
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="last_name">LastName</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="address" class="form-control" id="address" name="address">
                                         </div>
                                         <div class="form-group">
                                        <label for="name">Password</label>
                                        <input type="password" class="form-control" id="name" name="password">
                                         </div>
                                         <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="phone" class="form-control" id="phone" name="phone">
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