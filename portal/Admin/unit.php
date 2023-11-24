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
            <h1 class="m-0 text-dark">Units</h1>
          </div><!-- /.col --> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active"><a href="#">Allocation</a></li>
              <li class="breadcrumb-item active">Units</li>
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
                  <h3 class="card-title">Units Table</h3>
                  <div class="clearfix">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-default" title="Add a subject/Unit"><i class="fas fa-plus"></i> Add Unit</button>
                   </div>
                </div>
               
                
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Unit Code</th>
                      <th>Unit Name</th>
                      <th>Unit Department</th>
                      <th>Unit stage</th>
                      <th>Unit programme</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include_once '../action/dbconnect.php';
                        $sql = "SELECT * from unit";
                        $result =$conn->query($sql);
                       
                        if($result->num_rows > 0){
                            $data = array();
                            $count = 0;
                            while($row = $result->fetch_assoc()){
                               $count += 1;
                               $courseid = $row['course_id'];
                               $deptid = $row['dept_id'];
                               $stageid =$row['stage_id'];
                               
                                   
                               ?>
                               <tr>
                      <td><?php echo $count ?></td>
                      <td><?php echo $row['unit_code'];?></td>
                      <td><?php echo $row['unit_name'];?></td>
                      <td><?php
                      $query = "SELECT * FROM department WHERE id=$deptid";
                      $queryresult = mysqli_query($conn,$query);
              
                          $datat = mysqli_num_rows($queryresult);
                          $test=mysqli_fetch_array($queryresult);
                          if($datat==1)
                          {
                            $department = $test['name'];
                            echo "$department";
                          } else{
                            echo "NuLL";
                          }
                      ?></td>
                      
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
                      <td><?php 
                        $queryoff = "SELECT id,name FROM course WHERE id=$courseid";
                        $resultoff = mysqli_query($conn,$queryoff);
                
                            $dataoff = mysqli_num_rows($resultoff);
                            $testoff=mysqli_fetch_array($resultoff);
                            if($dataoff==1)
                            {
                              $id = $testoff['id'];
                              $name = $testoff['name'];
                              echo "$name";
                            }
                      ?></td>
                      <td>
                        <button class="btn btn-info btn-sm editun" id='editun-<?php echo $row['unit_id']?>' name='editun' data-toggle="modal" data-target="#modal-edit" title="Edit">
                          <i class="fas fa-pencil-alt"></i>
                            </button>
                      <a class="btn btn-danger btn-sm delun" id='delun-<?php echo $row['unit_id']?>' name='delun' title="Delete" href="#">
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
                      <th>Unit Code</th>
                      <th>Unit Department</th>
                      <th>Unit Name</th>
                      <th>Unit stage</th>
                      <th>Unit programme</th>
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
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Unit Allocations</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form"  action="action.php" method="POST"  class="ajax">
          <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                  
                  <label for="uncode">Unit Code</label>
                  <input type="text" class="form-control" id="uncode" name="uncode" placeholder="Enter code">
                </div>
                <div class="form-group">
                  <label for="unname">Unit Name</label>
                  <input type="text" class="form-control" id="unname" name="unname"  placeholder="Enter department name">
                </div>
                <div class="form-group">
                  <label for="uncourse">Unit Course</label>
                  <select name="uncourse" id="uncourse" class="form-control">
                    <option value="">Unit Course</option>
                    <?php
                        $sql = "SELECT * FROM course";
                        $query = mysqli_query($conn,$sql);
                        if($query){
                            while($row = mysqli_fetch_array($query)){
                                $id = $row["id"];
                                $name = $row["name"];
                                $code = $row["code"];
                                echo "
                                <option value='$id'>$code - $name</option>
                                ";
                            }
                        }
                      ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="unstage">Unit Stage</label>
                  <select name="unstage" id="unstage" class="form-control">
                    <option value="">Unit Stage</option>
                    <?php
                        $sql = "SELECT id,code FROM stage";
                        $query = mysqli_query($conn,$sql);
                        if($query){
                            while($row = mysqli_fetch_array($query)){
                                $id = $row["id"];
                                $code = $row["code"];
                                echo "
                                <option value='$id'>$code</option>
                                ";
                            }
                        }
                      ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="undept">Unit Department</label>
                  <select name="undept" id="undept" class="form-control">
                    <option value="">Unit Department</option>
                    <?php
                        $sql = "SELECT id,name FROM department";
                        $query = mysqli_query($conn,$sql);
                        if($query){
                            while($row = mysqli_fetch_array($query)){
                                $id = $row["id"];
                                $name = $row["name"];
                                echo "
                                <option value='$id'>$name</option>
                                ";
                            }
                        }
                      ?>
                  </select>
                </div>
            </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="submitun" id="submitun" class="btn btn-primary">Submit</button>
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
          <h4 class="modal-title">Edit Unit Allocations</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form"  action="action.php" method="POST"  class="ajax">
          <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                <input type="number" class="form-control" id="edunid" name="edunid" placeholder="Enter code" style="display: none;">
                  <label for="eduncode">Unit Code</label>
                  <input type="text" class="form-control" id="eduncode" name="eduncode" placeholder="Enter code">
                </div>
                <div class="form-group">
                  <label for="unname">Unit Name</label>
                  <input type="text" class="form-control" id="edunname" name="edunname"  placeholder="Enter department name">
                </div>
                <div class="form-group">
                  <label for="eduncourse">Unit Course</label>
                  <select name="eduncourse" id="eduncourse" class="form-control">
                    <option value="">Unit Course</option>
                    <?php
                        $sql = "SELECT * FROM course";
                        $query = mysqli_query($conn,$sql);
                        if($query){
                            while($row = mysqli_fetch_array($query)){
                                $id = $row["id"];
                                $name = $row["name"];
                                $code = $row["code"];
                                echo "
                                <option value='$id'>$code - $name</option>
                                ";
                            }
                        }
                      ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="edunstage">Unit Stage</label>
                  <select name="edunstage" id="edunstage" class="form-control">
                    <option value="">Unit Stage</option>
                    <?php
                        $sql = "SELECT id,code FROM stage";
                        $query = mysqli_query($conn,$sql);
                        if($query){
                            while($row = mysqli_fetch_array($query)){
                                $id = $row["id"];
                                $code = $row["code"];
                                echo "
                                <option value='$id'>$code</option>
                                ";
                            }
                        }
                      ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="edundept">Unit Department</label>
                  <select name="edundept" id="edundept" class="form-control">
                    <option value="">Unit Department</option>
                    <?php
                        $sql = "SELECT id,name FROM department";
                        $query = mysqli_query($conn,$sql);
                        if($query){
                            while($row = mysqli_fetch_array($query)){
                                $id = $row["id"];
                                $name = $row["name"];
                                echo "
                                <option value='$id'>$name</option>
                                ";
                            }
                        }
                      ?>
                  </select>
                </div>
            </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="edsubmitun" id="edsubmitun" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <?php
  include "footer.php";
  ?>
  <script>
    $(document).ready(function(){
$('.editun').click(function(){
      var id = $(this).attr('id').replace('editun-','');
      mydata = {unitid:id};
      jQuery.ajax({
      url:"action.php",
      dataType: "json",
      data: JSON.stringify(mydata),
      type: "POST",
      success: function(data){
        // console.log(data);
        $('#edunid').val(data.unit_id);
        $('#eduncode').val(data.unit_code);
        $('#edunname').val(data.unit_name);
        $('#edunstage').val(data.stage_id);
        $('#edundept').val(data.dept_id);
        $('#eduncourse').val(data.course_id);
       

      },
      error:function(){}
    });
    });
    $('.delun').click(function(){
      if(confirm("Are You Sure You want to delete the item?")){
      var id = $(this).attr('id').replace('delun-','');
      mydata = {delun:id};
      jQuery.ajax({
      url:"action.php",
      data: JSON.stringify(mydata),
      type: "POST",
      success: function(data){
        console.log(data);
        window.location.replace('unit.php');
          
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