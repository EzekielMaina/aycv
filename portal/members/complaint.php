<?php
session_start();
include'../action/dbconnect.php';
 $user= $_SESSION["sid"];
 ?>
<?php include('topbar.php'); ?>
<?php include('sidebar.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student | Complaints</title>
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>COMPLAINS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Complain</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item active">Welfare</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-bullhorn"></i>
                      Complaints
                    </h3>
                    <div class="clearfix">
                        <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> Make complaint</button>
                       </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">




               
<?php 
$sql = "SELECT * from lcomplain where staff=$user";
 $query = mysqli_query($conn,$sql);
        if (mysqli_num_rows($query) > 0) {
           while($row = mysqli_fetch_array($query)){
                $title=$row['title'];
                $description=$row['description'];
                echo '
                  <div class="callout callout-success">
                      <h5>';
                      echo$title;
                      echo'</h5>
    
                      <p>';
                      echo$description;
                      echo'</p>
                      
                    </div>';
                    
                
            }
          }
          else{

echo'<div class="callout callout-danger">
                   <h5>No Complain</h5>
    
                      <p>You have filled 0 complains</p>   
                    
                  </div>
';

          }


?>







                   
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
        </div>

          
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Complaint</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="edit.php" method="POST">
          <div class="modal-body">
              <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Complaint Title</label>
                    <input type="text" class="form-control" id="complain" name="complain"placeholder="Complaint title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Complaint Description</label>
                   <textarea  id="creason"  name="creason" class="form-control" placeholder="Enter some Brief Description..."></textarea>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" id = "lcsubmit" name="lcsubmit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2022 <a href="http://portal.ke">Integrated School Management System</a>.</strong> All rights
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
</body>
</html>
