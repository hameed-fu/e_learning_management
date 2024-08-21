<!DOCTYPE html>
<html lang="en">

<?php include ('parts/head.php') ?>


<?php
include ('parts/connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * from notifications where notification_id =  $id";
    $result = $conn->query($sql);
    $notification = $result->fetch_assoc();

}


if (isset($_POST['save'])) {
    $user_id = $_POST['user_id'];

    $message = $_POST['message'];
    $date_created = $_POST['date_created'];
    $notification_id = $_POST['notification_id'];


    $sql = "UPDATE notifications set user_id = '$user_id', message ='$message', date_created = '$date_created' where notification_id = '$notification_id' ";
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
                                <h4 class="card-title">Edit Notifications</h4>

                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="name">Instructor</label>
                                        <?php

                                        $sql = "SELECT * FROM instructors";
                                        // runt the above query
                                        $result = $conn->query($sql);

                                        ?>
                                        <select name="user_id" class="form-control">
                                            <option>Please Select</option>
                                            <?php while ($instructor = $result->fetch_assoc()) { ?>
                                                <option <?php echo $instructor['id'] == $notification['user_id'] ? 'selected' : '' ?> value="<?php echo $instructor['id'] ?>">
                                                    <?php echo $instructor['first_name'] ?>
                                                    <?php echo $instructor['last_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="name">Message</label>
                                        <input type="text" value="<?php echo $notification['message'] ?>"
                                            class="form-control" id="name" name="message">

                                    </div>

                                    <div class="form-group">
                                        <label for="name">Date Created</label>
                                        <input type="date" class="form-control"
                                            value="<?php echo $notification['date_created'] ?>" id="phone"
                                            name="date_created">

                                    </div>
                                    <input type="hidden" value="<?php echo $notification['notification_id'] ?>"
                                        name="notification_id">


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
                    success: function (data) {
                        $.each(data, function (index, subject) {
                            $('#subjects').append('<option value="' + subject.id + '">' + subject.title + '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching subjects:', error);
                    }
                });
            }
        }
    </script>

</body>

</html>