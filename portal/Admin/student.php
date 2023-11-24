<!DOCTYPE html>
<html>
<?php
include "header.php";
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php
  include "topbar.php";
 ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
   include "sidebar.php";
  ?>
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student</h1>
          </div><!-- /.col --> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Student</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Student Table</h3>
                  
                </div>
               
                
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                    <th>#</th>
                      <th>Registration Number</th>
                      <th>Full Names</th>
                      <!-- <th>Admission Year</th> -->
                      <th>Status</th>
                      <th>Stage</th>
                      <th>Fee balance</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include_once '../action/dbconnect.php';
                        $sql = "SELECT * from student";
                        $result =$conn->query($sql);
                        if($result->num_rows > 0){
                            $data = array();
                            $count = 0;
                            while($row = $result->fetch_assoc()){
                               $count += 1;
                               $stageid = $row['stage_id'];
                               ?>
                               <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $row['stud_reg'];?></td>
                      <td><?php echo $row['stud_name']?></td>
                      <td><?php echo $row['stud_session']?></td>
                      <td><?php 
                        $queryoff = "SELECT id,code FROM stage WHERE id=$stageid";
                        $resultoff = mysqli_query($conn,$queryoff);
                
                            $dataoff = mysqli_num_rows($resultoff);
                            $testoff=mysqli_fetch_array($resultoff);
                            if($dataoff==1)
                            {
                              $id = $testoff['id'];
                              $code = $testoff['code'];
                              echo "$code";
                            }
                      ?></td>
                      <td><?php echo $row['fee_balance']?></td>
                      <td>
                      <a class="btn btn-danger btn-sm delst" id='delst-<?php echo $row['id']?>' name='delst' title="Delete" href="#">
                            <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr><?php
                               
                            }
                        }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                    <th>#</th>
                      <th>Registration Number</th>
                      <th>Full Names</th>
                      <!-- <th>Admission Year</th> -->
                      <th>Status</th>
                      <th>Stage</th>
                      <th>Fee balance</th>
                      <th>Actions</th>
                    </tr>
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
 
  <?php
  include "footer.php";
  ?>
  <script>
    $(document).ready(function(){

    $('.delst').click(function(){
      if(confirm("Are You Sure You want to delete the item?")){
      var id = $(this).attr('id').replace('delst-','');
      mydata = {delst:id};
      jQuery.ajax({
      url:"action.php",
      data: JSON.stringify(mydata),
      type: "POST",
      success: function(data){
        console.log(data);
        window.location.replace('student.php');
          
      },
      error:function(){}
    });
  } else{
    alert("Deletion Cancelled");
  }
    });

    });
  </script>
</body>
</html>
