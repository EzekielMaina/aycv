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
            <h1 class="m-0 text-dark">Room</h1>
          </div><!-- /.col --> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active"><a href="#">Allocation</a></li>
              <li class="breadcrumb-item active">Rooms</li>
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
                  <h3 class="card-title">Room</h3>
                  <div class="clearfix">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-default" title="Add rooms"><i class="fas fa-plus"></i> Room</button>
                   </div>
                </div>
               
                
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Room Number</th>
                      <th>Room Hostel</th>
                      <th>Room Capacity</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include_once '../action/dbconnect.php';
                        $sql = "SELECT * from room";
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
                     
                      <td><?php echo $row['room_no'];?></td>
                      <td><?php
                     echo $row['hostel_block'];
                      ?></td>
                      
                      <td><?php echo $row['capacity']?></td>
                      <td>
                      <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-view" title="View Occupants" href="#">
                            <i class="fas fa-eye"></i>
                        </a>
                        <button class="btn btn-info btn-sm edith" id='edith-<?php echo $row['id']?>' name='edith' data-toggle="modal" data-target="#modal-edit" title="Edit">
                          <i class="fas fa-pencil-alt"></i>
                            </button>
                      <a class="btn btn-danger btn-sm delh" id='delh-<?php echo $row['id']?>' name='delh' title="Delete" href="#">
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
                        <th>Room Number</th>
                        <th>Room Hostel</th>
                        <th>Room Capacity</th>
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
          <h4 class="modal-title">Room Allocations</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="action.php" method="POST"  class="ajax">
          <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                  <label for="hrno">Room Number</label>
                  <input type="text" class="form-control" id="hrno" name="hrno" placeholder="Enter department name">
                </div>
                <div class="form-group">
                  <label for="hblock">Room Hostel</label>
                  <select name="hblock" id="hblock" class="form-control">
                    <option value="">Room Block</option>
                    <option value="kili">Kilimanjaro</option>
                    <option value="nsr">Tsunami</option>
                    <option value="mak">makerere</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="hcap">Room Capacity</label>
                    <input type="text" class="form-control" id="hcap" name="hcap" placeholder="Enter department name">
                  </div>
            </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="submith" id="submith" class="btn btn-primary">Submit</button>
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
        <form role="form" action="action.php" method="POST"  class="ajax">
          <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                <input type="number" class="form-control" id="edhid" name="edhid" placeholder="Enter code" style="display: none;">
                  <label for="exampleInputEmail1">Room Number</label>
                  <input type="text" class="form-control" id="edhrno" name="edhrno" placeholder="Enter department name">
                </div>
                <div class="form-group">
                  <label for="edhblock">Room Hostel</label>
                  <select name="edhblock" id="edhblock" class="form-control">
                    <option value="">Room Block</option>
                    <option value="Kili">Kilimanjaro</option>
                    <option value="nsr">Tsunami</option>
                    <option value="mak">makerere</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="edhcap">Room Capacity</label>
                    <input type="number" class="form-control" id="edhcap" name="edhcap" placeholder="Enter department name">
                  </div>
            </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" id="edsubmith" name="edsubmith" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="modal-view">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Room Members</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Paul Gichia</label>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Owako Stephen</label>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Maina</label>
                </div>
            </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
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
$('.edith').click(function(){
      var id = $(this).attr('id').replace('edith-','');
      mydata = {hid:id};
      jQuery.ajax({
      url:"action.php",
      dataType: "json",
      data: JSON.stringify(mydata),
      type: "POST",
      success: function(data){
        // console.log(data);
        $('#edhid').val(data.id);
        $('#edhrno').val(data.room_no);
        $('#edhblock').val(data.hostel_block);
        $('#edhcap').val(data.capacity);
       

      },
      error:function(){}
    });
    });
    $('.delh').click(function(){
      if(confirm("Are You Sure You want to delete the item?")){
      var id = $(this).attr('id').replace('delh-','');
      mydata = {delh:id};
      jQuery.ajax({
      url:"action.php",
      data: JSON.stringify(mydata),
      type: "POST",
      success: function(data){
        console.log(data);
        window.location.replace('hostel.php');
          
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
