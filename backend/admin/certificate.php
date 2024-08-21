<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <style>
        .outer-border {
            width: 800px;
            height: 650px;
            padding: 20px;
            text-align: center;
            border: 10px solid #673AB7;
            margin-left: 21%;
        }

        .inner-dotted-border {
            width: 750px;
            height: 600px;
            padding: 20px;
            text-align: center;
            border: 5px solid #673AB7;
            border-style: dotted;

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .certification {
            font-size: 50px;
            font-weight: bold;
            color: #663ab7;
        }

        .certify {
            font-size: 25px;
        }

        .name {
            font-size: 30px;
            color: green;
        }

        .fs-30 {
            font-size: 30px;
        }

        .fs-20 {
            font-size: 20px;
        }
    </style>
</head>

<body>

<?php 
include 'parts/connection.php';
$s_sql = "select * from students where id = ".$_GET['student_id'];
$s_result = $conn->query($s_sql);
$s_row = $s_result->fetch_assoc();

$c_sql = "select * from courses where course_id = ".$_GET['course_id'];
$c_result = $conn->query($c_sql);
$c_row = $c_result->fetch_assoc();

?>

    <div class="outer-border">
        <div class="inner-dotted-border">
            <span class="certification">Certificate of Completion</span>
            <br><br>
            <span class="certify"><i>This is to certify that</i></span>
            <br><br>
            <span class="name"><b><?php echo $s_row['first_name'] ." ". $s_row['last_name'] ?></b></span><br /><br />
            <span class="certify"><i>has successfully completed the certification</i></span> <br /><br />
            <span class="fs-30"><?php echo $c_row['course_name'] ?></span> <br /><br />
            <span class="certify"><i>dated</i></span><br><br>

            <span class="fs-20"><?php echo date('Y-m-d H-i-s') ?></span>

        </div>
    </div>


</body>

</html>