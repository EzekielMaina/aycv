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
  <title>Lecturer Portal | Leave</title>
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
                <h1>Leave Awards</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">leave</a></li>
                  <li class="breadcrumb-item active">Welfare</li>
                </ol>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="callout callout-info">
                 <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-bullhorn"></i>
                     List of leaves awarded,in-processing,denied.
                    </h3>
                    <div class="clearfix">
                        <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-default-leave"><i class="fas fa-plus"></i> Apply </button>
                       </div>
                  </div>
                 
                </div>
              </div>
          </div>
          </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Student List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Ref #</th>
                    <th>Start date</th>
                    <th>Period</th>
                    <th>Reason</th>
                    <th>Status</th>
                   
                  </tr>
                  </thead>
                  <tbody>

<?php 
$sql = "SELECT * from leaves where staff=$user";
 $query = mysqli_query($conn,$sql);
        if (mysqli_num_rows($query) > 0) {
           while($row = mysqli_fetch_array($query)){
                $id=$row['id'];
                $sdate=$row['sdate'];
                 $period=$row['period'];
                   $status=$row['status'];
                 $reason=$row['reason'];
                echo "
                  <tr>
                    <td>$id</td>
                    <td>$sdate</td>
                    <td>$period</td>
                    <td>$reason</td>
                    <td>$status</td> 
                  </tr>"
                
                ;
            }
          }
          

?>

                  
                  <tfoot>
                     <th>Ref #</th>
                    <th>Start date</th>
                    <th>Period</th>
                    <th>Reason</th>
                    <th>Status</th>
                    
                    
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="modal-default-leave">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Leave Allocations</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action ="edit.php" method='POST' >
          <div class="modal-body">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Start Date</label>
                <input type="date" class="form-control" id="lsdate" name="lsdate" placeholder="Enter Start Date" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Period</label>
                <input type="number" class="form-control" id="lperiod" name="lperiod" placeholder="Weeks Duration" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Reason </label>
                
                <textarea name="lreason" id="lreason"  class="form-control" placeholder="Enter some Brief Description..." required=></textarea>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" id="lsubmit" name="lsubmit"class="btn btn-primary">Submit</button>
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
