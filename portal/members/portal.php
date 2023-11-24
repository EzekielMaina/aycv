
<?php session_start();?>
<?php include('topbar.php'); ?>
<?php include('sidebar.php');
include'../action/dbconnect.php';?>
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





  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lecturer Portal | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Main Sidebar Container -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DASHBOARD/PROFILE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Portal</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  
                  <h3>Units </h3>
                  <?php 
                  $sql2 = "SELECT * FROM lecunits WHERE lecunits.staff_id=staff.id and staff.staff_number='$user'";
                    $query2 = mysqli_query($conn,$sql2);

                  $row2 = mysqli_num_rows($query2);?>
                  <p>Units :<?php echo $row2 ?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success text-light">
                <div class="inner">
                  <h3>Students</h3>
  
                  <p>Students : XXX</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary text-light">
                <div class="inner">
                  <h3>Complains</h3>
                  <?php $sql3 = "SELECT * FROM lcomplain WHERE staff='$user'";
                    $query3 = mysqli_query($conn,$sql3);

                  $row3 = mysqli_num_rows($query3);?>
                  <p>Complains : <?php echo $row3 ?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="complaint.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning text-light">
                <div class="inner">
                  <h3>Awards</h3>
   <?php $sql4 = "SELECT * FROM leaves WHERE staff='$user'";
                    $query4 = mysqli_query($conn,$sql4);

                  $row4 = mysqli_num_rows($query4);?>
                  <p>leaves : <?php echo $row4 ?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="leave.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
        <div class="row">
          <div class="col-md-6">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">Dr. <?php echo $name ?></h3>
                <!-- <p class="text-muted text-center">Software Engineer</p> -->

                <ul class="list-group list-group-unbordered mb-3">
                  
                  <li class="list-group-item">
                    <b>Staff Number</b> <a class="float-right"><?php echo $user ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Mail</b><a class="float-right"> <?php echo $mail ?></a>
                  </li>
                   <li class="list-group-item">
                    <a class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#modal-edit">
                          <i class="fas fa-pencil-alt">
                          </i>
                         Edit Profile Information
                      </a>
                  
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
         
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6 card card-primary">
            <div class="card-header">
              <h3 class="card-title">Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fas fa-book mr-1"></i>Department</strong>

              <p class="text-muted">
               <?php echo $department ?>
              </p>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i>Category</strong>

              <p class="text-muted"><?php echo $role ?></p>

              <hr>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    <div class="modal fade" id="modal-edit" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Profile Information</h4>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role='form' action ="edit.php" method='POST'>
                <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Staff ID</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $user ?>" disabled>             
              </div>
              
             
              <div class="form-group">
                <label for="examplemarks">Email</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="email" class="form-control" name="newmail" id="newmail" placeholder="Enter new Mail">
                    <!-- <label class="custom-file-label" for="exampleInputFile">Choose file</label> -->
                  </div>
                 
                  <div class="input-group-append">
                    <a class="btn btn-danger btn-sm" href="#">
                      <i class="fas fa-trash">
                      </i>
                      clear
                    </a>
                  </div>
                
               
           
               
                             
              </div>
                </div>
                
              </div>
           
            
            <!-- /.card-body -->

            <!-- <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div> -->
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type='submit' id='edit' name='edit' class='btn btn-primary'>Save changes</button>
            </div>
          </form>
          
        </div>
        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
     
    </div>
    <strong>Copyright &copy; 2022 <a href="http://portal.ke">Integrated School Management System</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

 

</script>

</body>
</html>
