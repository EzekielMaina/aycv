<?php session_start() ?>
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
                $userpass = $data['pass'];
              
                //$_SESSION["fname"] = $fullname; 
              }
?>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpass.value!= document.chngpwd.confpass.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confpass.focus();
return false;
}
return true;
}

</script>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lecturer Portal | Account</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <!-- Main Sidebar Container -->
  
  <!-- Content Wrapper. Contains page content -->


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Account</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Change password</a></li>
                  <li class="breadcrumb-item active">Account</li>
                </ol>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="callout callout-info">
                Account Settings
                 <div class="row">
                  <div class="col-sm-6">
                    <!-- select -->
                    <div class="form-group">
                     <form role='form' action ="edit.php" method='POST' name="chngpwd" onSubmit="return valid();">
          <div class="modal-body">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Current Password</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $userpass ?>" disabled>   
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">New Password</label>
                <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Enter new password">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" class="form-control" id="confpass" name="confpass" placeholder="Confirm new password">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
           
            <button type="submit" name="cpass" id="cpass" class="btn btn-primary">Submit</button>
          </div>
        </form>
                    </div>
                  </div>
                 </div>
                </div>
              </div>
          </div>
          </div><!-- /.container-fluid -->
    </section>

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="">Integrated School Management System</a>.</strong> All rights
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
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
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
