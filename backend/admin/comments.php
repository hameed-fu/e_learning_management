<?php
include 'session_check.php';
check_user_role("admin");
?>

<!DOCTYPE html>
<html lang="en">

<?php include('parts/head.php') ?>


<?php
include('parts/connection.php');



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
                        <div class="card ">
                            <div class="card-body">
                                <h4 class="card-title">Comments</h4>
                                <?php
// Select data from comments, students, and lectures table
$sql = "SELECT comments.*, students.first_name, students.last_name, lectures.title
        FROM comments
        JOIN students ON comments.user_id = students.id
        JOIN lectures ON comments.lecture_id = lectures.lecture_id
        ORDER BY lectures.lecture_id, comments.created_at ASC"; // Group by lecture and sort by date

// Run the query
$result = $conn->query($sql);

// Initialize a variable to track the current lecture
$current_lecture = null;

while ($row = $result->fetch_assoc()) {
    // Check if the lecture has changed
    if ($current_lecture !== $row['lecture_id']) {
        // If it's a new lecture, close the previous collapse (if any) and start a new one
        if ($current_lecture !== null) {
            echo '</div>'; // Close the collapse content
            echo '</div>'; // Close the previous card
        }

        // Create a unique ID for the collapsible section
        $collapseId = 'collapse_' . $row['lecture_id'];

        // Output the lecture title with a toggle button for collapse
        echo '<div class="card mt-3">';
        echo '<div class="card gradient-7  p-2 text-white">';
        echo '<h5 class="mb-0">';
        echo '<a class="text-white" data-toggle="collapse" href="#' . $collapseId . '" role="button" aria-expanded="false" aria-controls="' . $collapseId . '">';
        echo $row['title']; // Lecture title
        echo '</a>';
        echo '</h5>';
        echo '</div>';

        // Collapsible section for comments
        echo '<div id="' . $collapseId . '" class="collapse">';
        echo '<div class="card-body">';
        
        // Update the current lecture
        $current_lecture = $row['lecture_id'];
    }

    // Output the comments for the current lecture
    echo '<div class="card mt-2">';
    echo '<div class="card-body">';
    echo '<h6><strong>' . $row['first_name'] . ' ' . $row['last_name'] . '</strong> <small class="text-muted">(' . date('F j, Y, g:i a', strtotime($row['created_at'])) . ')</small></h6>';
    echo '<p class="mb-0">' . $row['comments'] . '</p>';
    echo '</div>';
    echo '</div>';
}
 
?>

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
        Main wrapper end
    ***********************************-->
    <?php include('parts/footer.php') ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('parts/script.php') ?>

</body>

</html>