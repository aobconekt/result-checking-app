<?php
    require("student.php");
var_dump($_POST);

$regno = trim($_POST['regNo']);
$pin = trim($_POST['pin']);

$obj->set_regNo($regno);
$obj->set_pin($pin);

$obj->check_results();
?>