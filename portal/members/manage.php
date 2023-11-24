<?php
session_start();
include'../action/dbconnect.php';?>
<?php include('topbar.php'); ?>
<?php include('sidebar.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lecturer Portal | Manage</title>
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
                <h1>Manage Students</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Manage Students</a></li>
                  <li class="breadcrumb-item active">Workspace</li>
                </ol>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="callout callout-info">
                 Your Eligible Units will appear Here
                 <div class="row">
                  <div class="col-sm-6">
                    <!-- select -->
                    <div class="form-group">
                      
                      <label> <h5><i class="fas fa-info"></i>&nbsp; Select the Unit Here</h5></label>
                     <select class="form-control" id="units" name="units" onchange="getstudents()">

                      <?php 
                      $user= $_SESSION["sid"];
$sql = "SELECT unit_name FROM unit WHERE unit.unit_id=lecunits.unit_id and lecunits.staff_id 
=staff.id and staff.staff_number='$user'";

  $query = mysqli_query($conn,$sql);
  if (mysqli_num_rows($query) > 0) {
                          while ($row = mysqli_fetch_array($query)) {

          $unit = $row['unit_name'];
                   echo' <option value="$unit">$unit</option>';
              }
            }
            else{
              echo'<option value="no">No Units assigned</option>';
            }
?>                      
             
                      </select>
                   
                    </div>
                    
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

            <div id="course" name="course" class="card"> 
             
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
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">School Allocations</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form">
          <div class="modal-body">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Student registration Number</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter reg nnumber">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">CAT Marks</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Cat Marks">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Main Exam Marks</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Main Marks">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Marks</h4>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Student registration Number</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter reg nnumber">             
              </div>
              <div class="form-group">
                <label for="examplemarks">Cat marks</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="email" class="form-control" id="marks" placeholder="Enter reg nnumber">
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
              <div class="form-group">
                <label for="examplemarks">Main exams</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="email" class="form-control" id="marks" placeholder="Main Exams">
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
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
          
        </div>
        
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


  function getstudents(){
    jQuery.ajax({
      url:"data.php",
      data: 'units='+$("#units").val(),
      type: "POST",
      success: function(data){
        $("#course").html(data);

      },
      error:function(){}
    });
  }

  $(document).ready(function(){
    $('.rev').click(function(){
      var id = $(this).attr('id').replace('rev-','');
      jQuery.ajax({
      url:"rev.php",
      data: 'rev='+id,
      type: "POST",
      success: function(data){
        $("#confirmed").html(data);
         $("#course").load(location.href+"#course");

      },
      error:function(){}
    });
    });
  })
</script>
</body>
</html>
