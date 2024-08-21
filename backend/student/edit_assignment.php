<!DOCTYPE html>
<html lang="en">

<?php include ('parts/head.php') ?>


<?php
include ('parts/connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "select * from assignments where assignment_id =  $id";
    $result = $conn->query($sql);
    $assignment = $result->fetch_assoc();

}


if (isset($_POST['save'])) {
    $instructor_id = $_POST['instructor_id'];
    $lecture_id = $_POST['lecture_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $assignment_id = $_POST['assignment_id'];


    $sql = "UPDATE  assignments set instructor_id = '$instructor_id',lecture_id  = '$lecture_id', title ='$title', description = '$description',due_date = '$due_date' where assignment_id = '$assignment_id' ";
    $state = $conn->query($sql);
    if ($state) {
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
                                <h4 class="card-title"> Eidt Assignment</h4>

                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="name">instructor</label>
                                        <?php

                                        $sql = "SELECT * FROM instructors";
                                        // runt the above query
                                        $result = $conn->query($sql);

                                        ?>
                                        <select name="instructor_id" class="form-control">
                                            <option>Please Select</option>
                                            <?php while ($instructor = $result->fetch_assoc()) { ?>
                                                <option <?php echo $instructor['instructor_id'] == $assignment['instructor_id'] ? 'selected' : '' ?>
                                                    value="<?php echo $instructor['instructor_id'] ?>">
                                                    <?php echo $instructor['first_name'] ?> <?php echo $instructor['last_name'] ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Lecture</label>
                                        <?php
                                        $sql = "SELECT * FROM lectures";
                                        // runt the above query
                                        $result = $conn->query($sql);

                                        ?>
                                        <select name="lecture_id" class="form-control">
                                            <option>Please Select</option>
                                            <?php while ($lecture = $result->fetch_assoc()) { ?>
                                                <option <?php echo $lecture['lecture_id'] == $assignment['lecture_id'] ? 'selected' : '' ?> value="<?php echo $lecture['lecture_id'] ?>">
                                                    <?php echo $lecture['title'] ?></option>
                                            <?php } ?>
                                        </select>


                                    </div>


                                    <div class="form-group">
                                        <label for="name">Title</label>  
                                        <input type="text" class="form-control" value="<?php echo $assignment['title'] ?>"
                                             name="title">

                                    </div>
                                    <div class="form-group">
                                        <label for="name">Description</label>
                                        <input type="text" class="form-control"
                                            value="<?php echo $assignment['description'] ?>"  name="description">

                                    </div>
                                    <div class="form-group">
                                        <label for="name"> Due date</label>
                                        <input type="date" class="form-control" value="<?php echo $assignment['due_date'] ?>"
                                             name="due_date">

                                    </div>
                                    <input type="hidden" name="assignment_id" value="<?=  $assignment['assignment_id'] ?>">



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