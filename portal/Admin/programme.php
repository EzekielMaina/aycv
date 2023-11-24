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
            <h1 class="m-0 text-dark">Programme</h1>
          </div><!-- /.col --> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active"><a href="#">Allocation</a></li>
              <li class="breadcrumb-item active">Programme</li>
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
                  <h3 class="card-title">Programmes Table</h3>
                  <div class="clearfix">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-default" title="Add a programme"><i class="fas fa-plus"></i> Programme</button>
                   </div>
                </div>
               
                
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Course Name</th>
                      <th>Course Department</th>
                      <th>Course Code</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include_once '../action/dbconnect.php';
                        $sql = "SELECT * from course";
                        $result =$conn->query($sql);
                       
                        if($result->num_rows > 0){
                            $data = array();
                            $count = 0;
                            while($row = $result->fetch_assoc()){
                               $count += 1;
                               $id = $row['id'];
                               $deptid = $row['dept_id'];
                               
                                   
                               ?>
                               <tr>
                      <td><?php echo $count ?></td>
                     
                      <td><?php echo $row['name'];?></td>
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
                      
                      <td><?php echo $row['code']?></td>
                      <td>
                        <button class="btn btn-info btn-sm editprog" id='editprog-<?php echo $row['id']?>' name='editprog' data-toggle="modal" data-target="#modal-edit" title="Edit">
                          <i class="fas fa-pencil-alt"></i>
                            </button>
                      <a class="btn btn-danger btn-sm delprog" id='delprog-<?php echo $row['id']?>' name='delprog' title="Delete" href="#">
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
                        <th>Course Name</th>
                        <th>Course Department</th>
                        <th>Course Code</th>
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
          <h4 class="modal-title">Course Allocations</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="action.php" method="POST"  class="ajax">
          <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                <!-- <input type="number" class="form-control" id="cid" name="cid" placeholder="Enter Staff Number" style="display: none;"> -->
                  <label for="cname">Course Name</label>
                  <input type="text" class="form-control" id="cname" name="cname" placeholder="Enter department name">
                </div>
                <div class="form-group">
                  <label for="cdept">Course Department</label>
                  <select name="cdept" id="cdept" class="form-control">
                    <option value="">Course Department</option>
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
              <div class="form-group">
                  <label for="ccode">Course Code</label>
                  <input type="text" class="form-control" id="ccode" name="ccode" placeholder="Enter Course Code e.g CCS">
                </div>
            </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="submitprog" id="submitprog" class="btn btn-primary">Submit</button>
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
          <h4 class="modal-title">Edit Course Allocations</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="action.php" method="POST"  class="ajax">
          <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                <input type="number" class="form-control" id="edcid" name="edcid" placeholder="Enter Staff Number" style="display: none;">
                  <label for="edcname">Course name</label>
                  <input type="text" class="form-control" id="edcname" name="edcname" placeholder="Enter department name">
                </div>
                <div class="form-group">
                  <label for="edcdept">Course department</label>
                  <select name="edcdept" id="edcdept" class="form-control">
                    <option value="">Department School</option>
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
              <div class="form-group">
                  <label for="edccode">Course Code</label>
                  <input type="text" class="form-control" id="edccode" name="edccode" placeholder="Enter department Code e.g SAAS" value="">
                </div>
            </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" id="submitedprog" name="submitedprog" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">ISMS asks?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form">
          <div class="modal-body">
              <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">
                      Are You sure You want to delete this Item?
                    </label>
                  </div>
                
              </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete Anyway</button>
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
$('.editprog').click(function(){
      var id = $(this).attr('id').replace('editprog-','');
      mydata = {progid:id};
      jQuery.ajax({
      url:"action.php",
      dataType: "json",
      data: JSON.stringify(mydata),
      type: "POST",
      success: function(data){
        // console.log(data);
        $('#edcname').val(data.name);
        $('#edcdept').val(data.dept_id);
        $('#edccode').val(data.code);
        $('#edcid').val(data.id);
       

      },
      error:function(){}
    });
    });
    $('.delprog').click(function(){
      if(confirm("Are You Sure You want to delete the item?")){
      var id = $(this).attr('id').replace('delprog-','');
      mydata = {delprog:id};
      jQuery.ajax({
      url:"action.php",
      data: JSON.stringify(mydata),
      type: "POST",
      success: function(data){
        console.log(data);
        window.location.replace('programme.php');
          
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
