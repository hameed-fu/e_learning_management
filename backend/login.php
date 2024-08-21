<?php 
session_start();
include 'parts/connection.php';
if (isset($_SESSION['email']) && isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
    
    switch ($role) {
        case 'admin':
            header("Location: $base_url/admin");
            exit();
        case 'student':
            header("Location: $base_url/student");
            exit();
        case 'instructor':
            header("Location: $base_url/instructor");
            exit();
        default:
            header("Location: $main_url/login.php");
            exit();
    }
}
?>

<!DOCTYPE html>
<html class="h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="admin/css/style.css" rel="stylesheet">

</head>

<body class="h-100">

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





    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="">
                                    <h4>LMS</h4>
                                </a>

                                <form class="mt-5 mb-5 login-input" method="post" action="">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <button type="submit" name="submit" class="btn login-form__btn submit w-100">Sign
                                        In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--**********************************
        Scripts
    ***********************************-->
    <script src="admin/plugins/common/common.min.js"></script>
    <script src="admin/js/custom.min.js"></script>
    <script src="admin/js/settings.js"></script>
    <script src="admin/js/gleek.js"></script>
    <script src="admin/js/styleSwitcher.js"></script>
</body>

</html>



<?php

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user_tables = [
        'admin' => 'users',
        'student' => 'students',
        'instructor' => 'instructors',
    ];

    $role = null;

    foreach ($user_tables as $role => $table) {
        $sql = "SELECT id, email, password FROM $table WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($password === $row['password']) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $role;

                switch ($role) {
                    case 'admin':
                        header("Location: $base_url/admin");
                        break;
                    case 'student':
                        header("Location: $base_url/student");
                        break;
                    case 'instructor':
                        header("Location: $base_url/instructor");
                        break;
                    default:
                        echo "Invalid role";
                        break;
                }
                exit();
            } else {
                echo "Invalid email or password";
            }
        }
    }

    echo "Invalid email or password";

    $conn->close();
}

?>