<?php
include 'session_check.php';
check_user_role("student");
?>
<!DOCTYPE html>
<html lang="en">

<?php
include 'parts/connection.php';
include 'parts/head.php';
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

    include 'parts/header.php'
      ?>
    <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->
    <?php
    include 'parts/sidebar.php';
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
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Lectures</h5><br>
                <ul class="nav flex-column">
                  <?php
                  $subject_id = $_GET['subject_id'];
                  $sql = "SELECT * FROM lectures WHERE subject_id = '$subject_id'";
                  $result = $conn->query($sql);

                  while ($row = $result->fetch_assoc()) { ?>
                    <li class="nav-item">
                      <a class="nav-link"
                        href="?subject_id=<?php echo $row['subject_id'] ?>&lecture_id=<?php echo $row['lecture_id'] ?>"><?php echo $row['title'] ?></a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="content">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Lecture Details</h5><br>
                  <?php
                  if (isset($_GET['lecture_id'])) {
                    $lecture_id = $_GET['lecture_id'];
                    $l_sql = "SELECT * FROM lectures WHERE subject_id = '$subject_id' and lecture_id = '$lecture_id'";
                    $l_result = $conn->query($l_sql);
                    $l_row = $l_result->fetch_assoc();
                    $content_URL = $l_row['content_URL'];

                    if (strpos($content_URL, 'youtube.com') !== false || strpos($content_URL, 'youtu.be') !== false) {
                      preg_match('/v=([^\&\?\/]+)/', $content_URL, $matches);
                      $video_id = isset($matches[1]) ? $matches[1] : null;

                      if (!$video_id) {
                        preg_match('/youtu\.be\/([^\?\/]+)/', $content_URL, $matches);
                        $video_id = isset($matches[1]) ? $matches[1] : null;
                      }

                      if ($video_id) {
                        echo "<iframe class='w-100' width='560' height='315' src='https://www.youtube.com/embed/" . htmlspecialchars($video_id, ENT_QUOTES, 'UTF-8') . "' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
                      } else {
                        echo "Invalid YouTube link.";
                      }
                    } elseif (preg_match('/\.(mp4|avi|mov)$/i', $content_URL)) {
                      echo "<video class='w-100' controls>
                            <source src='" . htmlspecialchars($content_URL, ENT_QUOTES, 'UTF-8') . "' type='video/mp4'>
                            Your browser does not support the video tag.
                          </video>";
                    } else {
                      echo "Download Lecture: <a class='text-info' target='_blank' href='" . htmlspecialchars($content_URL, ENT_QUOTES, 'UTF-8') . "' download>" . $content_URL . "</a>";
                    }
                  } else {
                    echo "Please select a lecture";
                  }
                  ?>
                </div>
              </div>
              <?php if (isset($_GET['lecture_id'])) { ?>
                <div class="card">
                  <div class="card-body">
                    <div class="default-tab">
                      <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Comments</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">Assignments</a>
                        </li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                          <div class="p-t-15">
                            <?php
                            $id = $_GET['lecture_id'];
                            $c_sql = "SELECT comments.*, students.first_name AS f_name, students.last_name AS l_name
                          FROM comments
                          JOIN students ON students.id = comments.user_id
                          WHERE lecture_id = '$id'";
                            $c_result = $conn->query($c_sql);
                            while ($c_row = $c_result->fetch_assoc()) { ?>
                              <h4><?php echo $c_row['comments'] ?></h4>
                              <p class="text-grey"><?php echo $c_row['created_at'] ?> by
                                <?php echo $c_row['f_name'] . " " . $c_row['l_name'] ?>
                              </p>
                            <?php } ?>
                            <hr>
                            <form action="" method="post" class="">
                              <textarea name="comments" class="form-control" id="" placeholder="Comments"></textarea>
                              <input type="hidden" name="lecture_id" value="<?php echo $_GET['lecture_id'] ?>">
                              <input type="submit" class="btn btn-warning my-2 mx-auto" value="Add Comment"
                                name="add_comment">
                            </form>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="profile">
                          <div class="p-t-15">
                            <table class="table">
                              <?php

                              $id = $_GET['lecture_id'];
                              $a_sql = "SELECT assignments.* FROM assignments WHERE lecture_id = '$id'";
                              $a_result = $conn->query($a_sql);
                              $a_row = $a_result->fetch_assoc();
                              if ($a_row) {


                                ?>
                                <tr>
                                  <th>Title</th>
                                  <td class="text-right"><?php echo $a_row['title'] ?></td>
                                </tr>
                                <tr>
                                  <th>Description</th>
                                  <td class="text-right"><?php echo $a_row['description'] ?></td>
                                </tr>
                                <tr>
                                  <th>Due Date</th>
                                  <td class="text-right"><?php echo $a_row['due_date'] ?></td>
                                </tr>
                                <tr>
                                  <th>Submit Assignment</th>
                                  <td class="text-right" style="width: 300px;">
                                    <?php
                                    if ($a_row) {
                                      $id = $a_row['assignment_id'];
                                      $s_sql = "SELECT * FROM assignment_submission WHERE assignment_id = $id";
                                      $s_result = $conn->query($s_sql);
                                      if ($s_result && $s_result->num_rows > 0) {
                                        $sol = $s_result->fetch_assoc();
                                        echo '<a class="text-info" target="_blank" href="' . $sol['solution'] . '">Solution</a> : <span>' . $sol['submission_date'] . '</span>';
                                      } else {
                                        if ($a_row['due_date'] >= date("Y-m-d")) {
                                          ?>

                                          <form action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="assignment_id"
                                              value="<?php echo htmlspecialchars($a_row['assignment_id']); ?>">
                                            <div class="input-group mb-3">
                                              <input type="file" class="form-control" name="solution"
                                                placeholder="Select Assignment" required>
                                              <div class="input-group-append">
                                                <input class="btn btn-outline-secondary" type="submit" name="submit_assignment"
                                                  value="Submit">
                                              </div>
                                            </div>
                                          </form>

                                          <?php
                                        } else {
                                          echo '<p class="text-danger">Due date has passed</p>';
                                        }
                                      }
                                      ?>
                                    </td>
                                  </tr>

                                <?php } ?>
                              <?php } else {
                                echo "No Assignments";
                              } ?>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>

          </div>
        </div>
      </div>
      <!-- #/ container -->
    </div>
  </div>
  <!--**********************************
        Main wrapper end
    ***********************************-->
  <?php include 'parts/footer.php' ?>
  <!--**********************************
        Scripts
    ***********************************-->
  <?php include 'parts/script.php' ?>

</body>

</html>

<?php
if (isset($_POST['add_comment'])) {
  $comments = $_POST['comments'];
  $lecture_id = $_POST['lecture_id'];
  $user_id = $_SESSION['id'];
  $sql = "INSERT INTO comments (user_id, lecture_id, comments) VALUES ('$user_id', '$lecture_id', '$comments')";
  $state = $conn->query($sql);
  echo "<script> window.location.href = window.location.href </script>";
}

if (isset($_POST['submit_assignment'])) {


  $assignment_id = $_POST['assignment_id'];
  $student_id = $_SESSION['id'];
  $solution = $_FILES['solution'];
  $submission_date = date('Y-m-d H:i:s');

  $fileTmpPath = $_FILES['solution']['tmp_name'];
  $fileName = $_FILES['solution']['name'];
  $dest_path = 'assignment_submissions/' . $fileName;

  if (move_uploaded_file($fileTmpPath, $dest_path)) {
    $solution = $dest_path;
  } else {
    echo "There was an error moving the uploaded file.";
    exit;
  }

  $sql = "INSERT INTO assignment_submission (assignment_id, student_id, solution, submission_date) 
      VALUES ('$assignment_id', '$student_id', '$solution', '$submission_date')";
  $state = $conn->query($sql);
  if ($state) {
    echo "<script> window.location.href = window.location.href </script>";
  }
}
?>