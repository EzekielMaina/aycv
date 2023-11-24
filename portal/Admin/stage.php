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
            <h1 class="m-0 text-dark">Stage</h1>
          </div><!-- /.col --> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active"><a href="#">Allocation</a></li>
              <li class="breadcrumb-item active">Stages</li>
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
                  <h3 class="card-title">Stages Table</h3>
                  <div class="clearfix">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-default" title="Add a Programme"><i class="fas fa-plus"></i> Add Stage</button>
                   </div>
                </div>
               
                
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Stage Code</th>
                      <th>Stage Year</th>
                      <th>Stage Semester</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include_once '../action/dbconnect.php';
                        $sql = "SELECT * from stage";
                        $result =$conn->query($sql);
                       
                        if($result->num_rows > 0){
                            $data = array();
                            $count = 0;
                            while($row = $result->fetch_assoc()){
                               $count += 1;
                               $id = $row['id'];
                              //  $ = $row['dept_id'];
                               
                                   
                               ?>
                               <tr>
                      <td><?php echo $count ?></td>
                     
                      <td><?php echo $row['code'];?></td>
                      <td><?php
                     echo $row['year'];
                      ?></td>
                      
                      <td><?php echo $row['sem']?></td>
                      <td>
                        <button class="btn btn-info btn-sm editstg" id='editstg-<?php echo $row['id']?>' name='editstg' data-toggle="modal" data-target="#modal-edit" title="Edit">
                          <i class="fas fa-pencil-alt"></i>
                            </button>
                      <a class="btn btn-danger btn-sm delstg" id='delstg-<?php echo $row['id']?>' name='delstg' title="Delete" href="#">
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
                      <th>Stage Code</th>
                      <th>Stage Year</th>
                      <th>Stage Semester</th>
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
          <h4 class="modal-title">Stage Allocations</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="action.php" method="POST"  class="ajax">
          <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Stage Code</label>
                  <input type="text" class="form-control" id="stgcode" name="stgcode" placeholder="Enter Stage Code e.g Y1S1">
                </div>
                <div class="form-group">
                  <label for="stgyr">Stage Year</label>
                  <select name="stgyr" id="stgyr" class="form-control">
                    <option value="">Stage Year</option>
                    <option value="1">First Year</option>
                    <option value="2">Second Year</option>
                    <option value="3">Third Year</option>
                    <option value="4">Fourth Year</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="stgsem">Stage Semester</label>
                  <select name="stgsem" id="stgsem" class="form-control">
                    <option value="">Semester</option>
                    <option value="1">Semester One</option>
                    <option value="2">Semester Two</option>
                  </select>
                </div>
            </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="submitstg" id="submitstg" class="btn btn-primary">Submit</button>
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
          <h4 class="modal-title">Edit Stage Allocations</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="action.php" method="POST"  class="ajax">
          <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                <input type="number" class="form-control" id="edstgid" name="edstgid" placeholder="Enter Stage Code e.g Y1S1" style="display: none;">
                  <label for="exampleInputEmail1">Stage Code</label>
                  <input type="text" class="form-control" id="edstgcode" name="edstgcode" placeholder="Enter Stage Code e.g Y1S1">
                </div>
                <div class="form-group">
                  <label for="edstgyr">Stage Year</label>
                  <select name="edstgyr" id="edstgyr" class="form-control">
                    <option value="">Stage Year</option>
                    <option value="1">First Year</option>
                    <option value="2">Second Year</option>
                    <option value="3">Third Year</option>
                    <option value="4">Fourth Year</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="edstgsem">Stage Semester</label>
                  <select name="edstgsem" id="edstgsem" class="form-control">
                    <option value="">Semester</option>
                    <option value="1">Semester One</option>
                    <option value="2">Semester Two</option>
                  </select>
                </div>
            </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="edsubmitstg" id="edsubmitstg" class="btn btn-primary">Submit</button>
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
$('.editstg').click(function(){
      var id = $(this).attr('id').replace('editstg-','');
      mydata = {stgid:id};
      jQuery.ajax({
      url:"action.php",
      dataType: "json",
      data: JSON.stringify(mydata),
      type: "POST",
      success: function(data){
        // console.log(data);
        $('#edstgid').val(data.id);
        $('#edstgcode').val(data.code);
        $('#edstgyr').val(data.year);
        $('#edstgsem').val(data.sem);
       

      },
      error:function(){}
    });
    });
    $('.delstg').click(function(){
      if(confirm("Are You Sure You want to delete the item?")){
      var id = $(this).attr('id').replace('delstg-','');
      mydata = {delstg:id};
      jQuery.ajax({
      url:"action.php",
      data: JSON.stringify(mydata),
      type: "POST",
      success: function(data){
        console.log(data);
        window.location.replace('stage.php');
          
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
