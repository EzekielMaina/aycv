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
            <h1 class="m-0 text-dark">Department</h1>
          </div><!-- /.col --> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Department</li>
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
                  <h3 class="card-title">Departments Table</h3>
                  <div class="clearfix">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-default" title="Add a department"><i class="fas fa-plus"></i> Add department</button>
                   </div>
                </div>
               
                
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Department Name</th>
                      <th>Department School</th>
                      <th>officer</th>
                      
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include_once '../action/dbconnect.php';
                        $sql = "SELECT * from department";
                        $result =$conn->query($sql);
                       
                        if($result->num_rows > 0){
                            $data = array();
                            $count = 0;
                            while($row = $result->fetch_assoc()){
                               $count += 1;
                               $schid = $row['school_id'];
                               $deptid = $row['officer_id'];
                               
                                   
                               ?>
                               <tr>
                      <td><?php echo $count ?></td>
                     
                      <td><?php echo $row['name'];?></td>
                      <td><?php
                      $query = "SELECT * FROM school WHERE sch_id=$schid";
                      $queryresult = mysqli_query($conn,$query);
              
                          $datat = mysqli_num_rows($queryresult);
                          $test=mysqli_fetch_array($queryresult);
                          if($datat==1)
                          {
                            $school = $test['sch_name'];
                            echo "$school";
                          } else{
                            echo "NuLL";
                          }
                      ?></td>
                      
                      <td><?php 
                        $queryoff = "SELECT staff_number,name FROM staff WHERE id=$deptid";
                        $resultoff = mysqli_query($conn,$queryoff);
                
                            $dataoff = mysqli_num_rows($resultoff);
                            $testoff=mysqli_fetch_array($resultoff);
                            if($dataoff==1)
                            {
                              $deptoff = $testoff['name'];
                              $deptname = $testoff['staff_number'];
                              echo "$deptname - $deptoff";
                            }
                      ?></td>
                      <td>
                        <button class="btn btn-info btn-sm editdept" id='editdept-<?php echo $row['id']?>' name='editdept' data-toggle="modal" data-target="#modal-edit" title="Edit">
                          <i class="fas fa-pencil-alt"></i>
                            </button>
                      <a class="btn btn-danger btn-sm deldept" id='deldept-<?php echo $row['id']?>' name='deldept' title="Delete" href="#">
                            <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr><?php
                               
                            }
                        }
                    ?>
                    <!-- <tr>
                      <td>1</td>
                      <td>Computer Science</td>
                      <td>School Of Computing and Informatics
                      </td>
                      <td>3</td>
                      <td>10</td>
                      <td>
                        <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit" title="Edit" href="#">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete" title="Delete" href="#">
                            <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr> -->
                    <!-- <tr>
                      <td>2</td>
                      <td>Pure Mathematics</td>
                      <td>School Of Mathematics and Acturial Science
                      </td>
                      <td>5</td>
                      <td>13</td>
                      <td>
                        <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit" title="Edit" href="#">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete" title="Delete" href="#">
                            <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    </tr>
                    -->
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                      <th>Department Name</th>
                      <th>Department School</th>
                      <th>Officer</th>
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
          <h4 class="modal-title">Department Allocations</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="action.php" method="POST" enctype="multipart/form-data" class="ajax">
          <div class="modal-body">
              <div class="card-body">
                  <div class="form-group">
                  
                  <!-- <input type="text" class="form-control" id="deptid" name="deptid" placeholder="id"> -->
                    <label for="deptname">Department name</label>
                    <input type="text" class="form-control" id="deptname" name="deptname" placeholder="Enter department name">
                  </div>
                  <div class="form-group">
                    <label for="deptsch">Department School</label>
                    <select name="deptsch" id="deptsch" class="form-control">
                      <option value="">Department School</option>
                      <?php
                        $sql = "SELECT sch_id,sch_name FROM school";
                        $query = mysqli_query($conn,$sql);
                        if($query){
                            while($row = mysqli_fetch_array($query)){
                                $id = $row["sch_id"];
                                $name = $row["sch_name"];
                                echo "
                                <option value='$id'>$name</option>
                                ";
                            }
                        }
                      ?>
                    </select>
                  </div>
                <!-- <div class="form-group">
                    <label for="deptcode">Department Code</label>
                    <input type="text" class="form-control" id="deptcode" name="deptcode" placeholder="Enter department Code e.g SAAS">
                  </div> -->
                  <div class="form-group">
                    <label for="deptofficer">Department Officer</label>
                    <select name="deptofficer" id="deptofficer" class="form-control">
                      <option value="">Department Officer</option>
                      <?php
                        $sql = "SELECT id,staff_number,name FROM staff WHERE role = 'deptofficer'";
                        $query = mysqli_query($conn,$sql);
                        if($query){
                            while($row = mysqli_fetch_array($query)){
                                $id = $row["id"];
                                $number = $row["staff_number"];
                                $name = $row["name"];
                                echo "
                                <option value='$id'>$number - $name</option>
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
            <button type="submitdept" name="submitdept" id="submitdept" class="btn btn-primary">Submit</button>
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
          <h4 class="modal-title">Edit Department Allocations</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="action.php" method="POST" class="ajax">
          <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                  <label for="depname">Department name</label>
                  <input type="text" class="form-control" id="deptid" name="deptid" placeholder="id" style="display: none;">
                  <input type="text" class="form-control" id="eddeptname" name="eddeptname" placeholder="Enter department name" value="">
                </div>
                <div class="form-group">
                  <label for="eddeptsch">Department School</label>
                  <select name="eddeptsch" id="eddeptsch" class="form-control">
                    <!-- <option value="">Department School</option> -->
                    <?php
                        $sql = "SELECT sch_id,sch_name FROM school";
                        $query = mysqli_query($conn,$sql);
                        if($query){
                            while($row = mysqli_fetch_array($query)){
                                $id = $row["sch_id"];
                                $name = $row["sch_name"];
                                echo "
                                <option value='$id'>$name</option>
                                ";
                            }
                        }
                      ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="eddeptofficer">Department Officer</label>
                  <select name="eddeptofficer" id="eddeptofficer" class="form-control">
                    <!-- <option value="">Department Officer</option> -->
                    <?php
                        $sql = "SELECT id,staff_number,name FROM staff WHERE role='deptofficer'";
                        $query = mysqli_query($conn,$sql);
                        if($query){
                            while($row = mysqli_fetch_array($query)){
                                $id = $row["id"];
                                $number = $row["staff_number"];
                                $name = $row["name"];
                                echo "
                                <option value='$id'>$number - $name</option>
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
            <button type="submiteddept" name="submiteddept" id="submiteddpt" class="btn btn-primary">Edit</button>
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
  $('form.ajax').on('submit', function(event){
  var myform = $(this),
      url = myform.attr('action'),
      type = myform.attr('method'),
      data = {};
      myform.find('[name]').each(function(index, value){
          var item = $(this),
              name = item.attr('name'),
              value = item.val();

              data[name] = value;
      });
      $.ajax({
        url :url,
        type: type,
        data: JSON.stringify(data),
        success: function(response){
         console.log(response);
         $('form.ajax')[0].reset();
        window.location.replace('department.php');
        
        }

      });
  event.preventDefault();
});
$('.editdept').click(function(){
      var id = $(this).attr('id').replace('editdept-','');
      mydata = {depid:id};
      // console.log("Edit buitton Clicked "+mydata.depid);
      jQuery.ajax({
      url:"action.php",
      dataType: "json",
      data: 'editdept='+id,
      type: "POST",
      success: function(data){
        console.log(data);
        $('#deptid').val(data.id);
        $('#eddeptname').val(data.name);
        $('#eddeptsch').val(data.school_id);
        $('#eddeptofficer').val(data.officer_id);

      },
      error:function(){}
    });
    });

    $('.deldept').click(function(){
      if(confirm("Are You Sure You want to delete the item?")){
      var id = $(this).attr('id').replace('deldept-','');
      jQuery.ajax({
      url:"action.php",
      data: 'deldept='+id,
      type: "POST",
      success: function(data){
        console.log(data);
        window.location.replace('department.php');
          
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
