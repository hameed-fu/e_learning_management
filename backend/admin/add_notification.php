<?php
include 'session_check.php';
check_user_role("admin");
?>

<!DOCTYPE html>
<html lang="en">

<?php include('parts/head.php') ?>


<?php
include('parts/connection.php');

if (isset($_POST['save'])) {
    $user_id = $_POST['instructor_id'];
    $message = $_POST['message'];
    $subject_id = $_POST['subject_id'];
    $date_created = date('Y-m-d');


    $sql = "INSERT INTO notifications(user_id,subject_id,message,date_created) values('$user_id', '$subject_id','$message','$date_created')";
    $state = $conn->query($sql);
    if ($state) {
        //echo "record added successfully";
        header("Location: notifications.php");
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

        include('parts/header.php')
        ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php
        include('parts/sidebar.php');
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
                                            <?php while ($row = $result->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['id'] ?>"><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label for="name">Courses</label>
                                        <?php
                                        $sql = "SELECT * FROM courses";
                                        $result = $conn->query($sql);
                                        ?>
                                        <select name="" id="course" onchange="getSubjects()" class="form-control">
                                            <option>Please Select</option>
                                            <?php while ($row = $result->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['course_id'] ?>"><?php echo $row['course_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Subjects</label>
                                        <select id="subjects" name="subject_id" class="form-control">
                                            <option>Please Select Course</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Message</label>
                                        <textarea type="text" class="form-control" id="name" name="message"></textarea>
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
    <?php include('parts/footer.php') ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('parts/script.php') ?>
    <script>
        function getSubjects() {
            var courseId = $("#course").val();

            $('#subjects').empty().append('<option>Please Select</option>');

            if (courseId) {
                $.ajax({
                    url: 'ajax/subjects.php',
                    type: 'POST',
                    data: {
                        course_id: courseId
                    },
                    success: function(data) {
                        $.each(data, function(index, subject) {
                            $('#subjects').append('<option value="' + subject.id + '">' + subject.title + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching subjects:', error);
                    }
                });
            }
        }
    </script>
</body>

</html>