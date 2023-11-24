<?php
session_start();
include'../action/dbconnect.php';

if(isset($_POST['edit'])){
 
       $user= $_SESSION["sid"];
        
        $mail = $_POST['newmail'];
        
       
          $sql = "UPDATE staff SET mail = '$mail' WHERE staff_number='$user'";
         $query = mysqli_query($conn, $sql);
          if($query)
          {
            header("Location:portal.php");
 
          }
        


          else{
           echo "<script>alert('Email Exists');</script>";
           header("Location:portal.php");
          }
        }

        if(isset($_POST['cpass'])){
 
       $user= $_SESSION["sid"];
        
        $pass = $_POST['confpass'];
        
       echo $user;
          $sql = "UPDATE staff SET pass= '$pass' WHERE staff_number='$user'";
         $query = mysqli_query($conn, $sql);
          if($query)
          {
            header("Location:change-password.php");
 
          }
        


          else{
          
 echo "<script>alert('Unsuccessful');</script>";
          }
        }

if(isset($_POST['lsubmit'])){
 
       $user= $_SESSION["sid"];
        
        $lsdate = $_POST['lsdate'];
          $lperiod = $_POST['lperiod'];
            $lreason = $_POST['lreason'];
            $status="in-processing";
        
        $sql = "INSERT INTO leaves(staff,sdate,period,reason,status) VALUES($user,$lsdate,$lperiod,$lreason,$status)";
 
        $insert = mysqli_prepare($conn,$sql);
        
        mysqli_stmt_bind_param($insert,'sssss',$user,$lsdate,$lperiod,$lreason,$status);
        
         $query = mysqli_stmt_execute($insert);
          if($query)
          {
            header("Location:leave.php");
 
          }
        


          else{
            echo'<script>alert("Unsucessful")</script>';
            
          
          }
        }

if(isset($_POST['lcsubmit'])){
 
       $user= $_SESSION["sid"];
        
        $complain= $_POST['complain'];
         $creason= $_POST['creason'];
        
        $sql = "INSERT INTO lcomplain(title,description,staff) VALUES(?,?,?)";
 
        $insert = mysqli_prepare($conn,$sql);
        
        mysqli_stmt_bind_param($insert,'sss',$complain,$creason,$user);
        
         $query = mysqli_stmt_execute($insert);
          if($query)
          {
            header("Location:complaint.php");
 
          }
        


          else{
              header("Location:complaint.php");
          
          }
        }



?>