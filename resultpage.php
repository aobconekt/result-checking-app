<?php
    include("student.php");
    if (!isset($_SESSION['reg_no']) && !isset($_SESSION['pin'])) {
        header("location: index.php");
    }
$results =$obj->theResults();
$avge = $obj->averageScore();


?>

<!DOCTYPE html>
<html>
<head>
    <title>My portal</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="appcss/extcss.css">

</head>
<body>
    <div class="container">
        <div class="row">

            <!--For students info-->
            <div class="col-md-5">
            <?php
                while ($res=mysqli_fetch_assoc($results)) {

            ?>
                <h2><?php echo $res['fname'].' '.$res['lname']?></h2>

                <h1><?php echo $res['reg_no']?></h1>

                <button type="button" class="btn btn-lg btn-danger"><a href="logout.php">Logout</a> </button>
            </div>

            <!--for student results-->
            <div class="col-md-5 col-md-offset-1">
                 <div class="row">
                    <h3>SECOND TERM RESULTS</h3>
                    <div class="col-md-7">

                        <table class="table table-stripe table-hover table-bordered tabl">
                            <thead>
                                <tr>
                                    <th>S/No</th>
                                    <th>Subjects</th>
                                    <th>Score(100)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mathematics</td>
                                    <td><?php echo $res['Mathematics']?></td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>English</td>
                                    <td><?php echo $res['English']?></td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Chemistry</td>
                                    <td><?php echo $res['Chemistry']?></td>
                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>Physics</td>
                                    <td><?php echo $res['Physics']?></td>
                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td>Biology</td>
                                    <td><?php echo $res['Biology']?></td>
                                </tr>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="3">
                                        <?php echo 'Your average score is '.$avge;?>

                                    </td>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                <?php
            }?>


                </div>
            </div>

        </div>
        <div class="row">

            <?php
                if ($avge < 50) {
                   echo "<div class='col-md-3 col-md-offset-1'>
                <img src='images/IMG_20170224_154940.jpg' class='img img-responsive img-circle'>
            </div>
            <div class='col-md-4 col-md-offset-1' style='font-size: 100px; color: red;'><p>FAILED</p></div>";
                }else{
                    echo "<div class='col-md-3 col-md-offset-1'>
                <img src='images/IMG_20170224_154908.jpg' class='img img-responsive img-circle'>
            </div>
            <div class='col-md-4 col-md-offset-1' style='font-size: 100px; color: green;'><p>PASSED</p></div>";
                }
            ?>

        </div>


    </div>

</body>
</html>