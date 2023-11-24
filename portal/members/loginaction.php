<?php
include_once '../action/dbconnect.php';
session_start();
    $sno= $_POST['sid'];
    $pass = $_POST['pas'];


    $sql = "SELECT * FROM staff WHERE staff_number='$sno' AND pass='$pass'";
        $query = mysqli_query($conn,$sql);

            $row = mysqli_num_rows($query);
            $data=mysqli_fetch_array($query);
            if($row==1)
            {
                $_SESSION["sid"] = $sno;
               header('Location:portal.php');
             
            }
            
            else
            {
                header('Location:login.html');
            }

?>


