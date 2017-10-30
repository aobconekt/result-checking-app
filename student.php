<?php
session_start();

    class student{
        var $pin;
        var $reg_no;
        private $dbcon;

        public function __construct(){
            $this->dbcon = mysqli_connect("localhost","root","","studentapp");
        }

        public function create_pin($regi_number){
            $userRegNo =$regi_number;

            $sql = "SELECT * FROM student_details WHERE reg_no = '$regi_number'";

            $slquery = $this->dbcon->query($sql) or die(mysql_error($this->dbcon));

            $numbrows = mysqli_num_rows($slquery);
                if ($numbrows > 0) {
                    echo "numbrows correct";
                    $pin_generator = mt_rand(1,9);
                    for($i=1; $i<6; $i++){
                      $pin=  $pin_generator .=mt_rand(1,9);
                        echo $pin;
                    }

                    $update = "UPDATE student_details SET stdnt_pin = '$pin' WHERE reg_no ='$regi_number'";
                    $updateQuery =$this->dbcon->query($update) or die(mysql_error($this->dbcon));


                    $_SESSION['reg_no']=$userRegNo;
                    header("location:pinpage.php");


            }else{
                header("location: nopin.php");
               echo "Oops! Looks like you input a wrong Registration Number.";
            }
        }

        public function display_pin(){#for displaying the generated pin in pinpage.php

                $userRegNo = $_SESSION['reg_no'];
                $select = "SELECT * FROM student_details WHERE reg_no ='$userRegNo'";
                $query = $this->dbcon->query($select) or die(mysqli_error($this->dbcon));

                return $query;

        }

        public function check_results(){#to verify registration No & pin to allow acces to resultpage.php

            $regnum = $this->reg_no;
            $pinn =$this->pin;
                $select = "SELECT * FROM student_details WHERE reg_no= '$this->reg_no' AND stdnt_pin ='$this->pin'";
                $selectquery =$this->dbcon->query($select);

                $numRows =mysqli_num_rows($selectquery);

                    if ($numRows > 0) {
                        $_SESSION['reg_no'] = $regnum;
                        $_SESSION['pin'] = $pinn;

                        header("location: resultpage.php");
                    }else{
                        header("location: index.php");
                      echo "Registration number or pin is incorrect. Try again";
                    }

        }

        public function theResults(){
           $regnum = $_SESSION['reg_no'];
             $pinn =$_SESSION['pin'];

            $select ="SELECT * FROM exam_score LEFT JOIN student_details ON exam_score.stdnt_id=student_details.stdnt_id WHERE reg_no= '$regnum' AND stdnt_pin ='$pinn'";
            $query = $this->dbcon->query($select) or die(mysql_error($this->dbcon));
            return $query;

        }

        public function averageScore(){
            $regnum = $_SESSION['reg_no'];
             $pinn =$_SESSION['pin'];

            $select ="SELECT * FROM exam_score LEFT JOIN student_details ON exam_score.stdnt_id=student_details.stdnt_id WHERE reg_no= '$regnum' AND stdnt_pin ='$pinn'";
            $query = $this->dbcon->query($select) or die(mysql_error($this->dbcon));
            $fetch =$query->fetch_assoc();

                while ($res = $fetch) {
                    $math = $res['Mathematics'];
                    $eng = $res['English'];
                    $chem = $res['Chemistry'];
                    $phy = $res['Physics'];
                    $bio = $res['Biology'];

                    $myarray = array($math, $eng, $chem, $phy, $bio);
                    $average = array_sum($myarray)/ count($myarray);

                    return $average;
                }
        }

        public function logout(){
            session_destroy();
            header("location: index.php");
        }

        public function set_regNo($setreg){
            $this->reg_no = $setreg;

        }
        public function get_regNo($setreg){
            return $this->reg_no;

        }
        public function set_pin($setpin){
            $this->pin = $setpin;
        }
        public function get_pin($setpin){
            return $this->pin;
        }




    }

$obj = new student;

?>