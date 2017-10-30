<?php
require("student.php");
var_dump($_POST);

if (isset($_POST['regNo'])) {
    $regi_number= trim($_POST['regNo']);

    $obj->create_pin($regi_number);
}

?>