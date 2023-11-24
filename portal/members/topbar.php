<?php
 
include'../action/dbconnect.php';
if(strlen($_SESSION['sid'])==0)
  { 
header('location:login.html');
}

  ?>

<?php  
$user= $_SESSION["sid"];
$sql = "SELECT * FROM staff WHERE staff_number='$user'";
        $query = mysqli_query($conn,$sql);

            $row = mysqli_num_rows($query);
            $data=mysqli_fetch_array($query);
        if ($row==1){
                $mail = $data['mail'];
                $name = $data['name']; 
                $role = $data['role']; 
                $picture = $data['pic'];
                $department = $data['department'];
                
                $picsrc="images/".$picture;
                $_SESSION["picname"] = "images/$picture";
                //$_SESSION["fname"] = $fullname; 
              }

$sqlunit = "SELECT * FROM lecunits WHERE staff_number='$user'";
        $query = mysqli_query($conn,$sql);

            $row = mysqli_num_rows($query);
            $data=mysqli_fetch_array($query);
        if ($row==1){
                
                $lname = $data['name']; 
                $lrole = $data['role']; 
                $picture = $data['pic'];
                
                
                $picsrc="images/".$picture;
               
                //$_SESSION["fname"] = $fullname; 
              }



  ?>


<nav class="main-header navbar navbar-expand navbar-white navbar-light branding">
    <a href="../index3.html" class="brand-link">
      <img src="../dist/img/smsLogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text">INTEGRATED SCHOOL MANAGEMENT SYSTEM</span>
    </a>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-power-off"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="../dist/img/user4-128x128.jpg"
                   alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">Dr.<?php echo $lname?></h3>

            <p class="text-muted text-center"><?php echo $lrole?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Are You Sure</b> <a class="float-right text-danger"><span class="fas fa-question"></span></a>
              </li>
            </ul>

            <a href="logout.php" class="btn btn-danger btn-block text-light"><b>LogOut</b></a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->