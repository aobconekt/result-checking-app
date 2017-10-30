<?php
    include("student.php");
    if (!isset($_SESSION['reg_no'])) {
        header("location: index.php");
    }

    $showPin = $obj->display_pin();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Your Login pin</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="appcss/extcss.css">
    <style type="text/css">
        body{
            background-color: rgb(33,36,33);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row"  style="margin-top: 200px;">
            <div class="col-md-4 col-md-offset-1">
                <p><img src="images/code.gif" class="img img-responsive"></p>
            </div>
            <div class="col-md-5 col-md-offset-1">

            <?php
            while ( $res = mysqli_fetch_assoc($showPin)) {


            ?>
                <h1><?php echo "Your login pin is <b style='background-color: brown;''>".$res['stdnt_pin']."</b>"; ?></h1>

                <?php
            }

             ?>

                <h3>Use this pin to login in the homepage</h3>

                <h2><a href="logout.php">Return to login</a></h2>
            </div>
        </div>
    </div>

</body>
</html>