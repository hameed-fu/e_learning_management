<?php
include 'session_check.php';
check_user_role("instructor");
?>


<!DOCTYPE html>
<html lang="en">

<?php include ('parts/head.php') ?>


<?php
include ('parts/connection.php');

if (isset($_POST['save'])) {
    $instructor_id = $_POST['instructor_id'];
    $lecture_id = $_POST['lecture_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];

    $sql = "INSERT INTO assignments(instructor_id, lecture_id ,title,description,due_date) values('$instructor_id',' $lecture_id',' $title',' $description','$due_date')";
    $state = $conn->query($sql);
    if ($state) {
        header("Location: assignments.php?id=" . $_GET['id']);
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
                                        $instructor_id = $_SESSION['id'];
                                        $i_sql = "SELECT * FROM instructors WHERE id = '$instructor_id'";
                                        $i_result = $conn->query($i_sql);
                                        $i_row = $i_result->fetch_assoc();
                                        ?>
                                        <input disabled type="text" class="form-control" id="name" name=""
                                            value="<?php echo $i_row['first_name'] ?> <?php echo $i_row['last_name'] ?>">
                                        <input type="hidden" name="instructor_id" value="<?php echo $i_row['id'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Subject</label>
                                        <?php
                                        $id = $_GET['id'];
                                        $s_sql = "SELECT subjects.subject_id, subjects.title FROM lectures
                                        JOIN subjects ON subjects.subject_id = lectures.subject_id
                                        WHERE lecture_id = '$id'";
                                        $s_result = $conn->query($s_sql);
                                        $s_row = $s_result->fetch_assoc();
                                        ?>
                                        <input disabled type="text" class="form-control" id="name" name=""
                                            value="<?php echo $s_row['title'] ?>">
                                        <input type="hidden" name="subject_id"
                                            value="<?php echo $s_row['subject_id'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Lecture</label>
                                        <?php

                                        $l_sql = "SELECT * FROM lectures WHERE lecture_id = '$id'";
                                        $l_result = $conn->query($l_sql);
                                        $l_row = $l_result->fetch_assoc();
                                        ?>
                                        <input disabled type="text" class="form-control" id="name" name=""
                                            value="<?php echo $l_row['title'] ?>">
                                        <input type="hidden" name="lecture_id"
                                            value="<?php echo $l_row['lecture_id'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input type="text" class="form-control" id="name" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>
                                        <textarea name="description" class="form-control" id=""></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name"> Submission Date</label>
                                        <input min="<?php echo date('Y-m-d') ?>" type="date" class="form-control"
                                            id="name" name="due_date">
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