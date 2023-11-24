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
            <h1 class="m-0 text-dark">Staff</h1>
          </div><!-- /.col --> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Staff</li>
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
                  <h3 class="card-title">Staff Table</h3>
                  <div class="clearfix">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-default" title="Add staff member"><i class="fas fa-plus"></i> Add Staff</button>
                   </div>
                </div>
               
                
                <!-- /.card-header -->
                <div class="card-body" id="tablediv">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Staff Number</th>
                      <th>Full Names</th>
                      <th>Staff Role</th>
                      <th>Staff Mail</th>
                      <th>Staff Password</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include_once '../action/dbconnect.php';
                        $sql = "SELECT * from staff";
                        $result =$conn->query($sql);
                        if($result->num_rows > 0){
                            $data = array();
                            $count = 0;
                            while($row = $result->fetch_assoc()){
                               $count += 1;
                               ?>
                               <tr>
                      <td><?php echo $count ?></td>
                      <td><?php echo $row['staff_number'];?></td>
                      <td><?php echo $row['name']?></td>
                      <td><?php echo $row['mail']?></td>
                      <td><?php echo $row['role']?></td>
                      <td><?php echo $row['pass']?></td>
                      <td>
                        <button class="btn btn-info btn-sm edit" id='edit-<?php echo $row['id']?>' name='edit' data-toggle="modal" data-target="#modal-default" title="Edit">
                          <i class="fas fa-pencil-alt"></i>
                            </button>
                      <a class="btn btn-danger btn-sm del" id='del-<?php echo $row['id']?>' name='del' title="Delete" href="#">
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
                        <th>Staff Number</th>
                        <th>Full Names</th>
                        <th>Staff Role</th>
                        <th>Staff Mail</th>
                        <th>Staff Password</th>
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
          <h4 class="modal-title">Staff Allocations</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="action.php" name="staffform" id="staffform" method="POST" enctype="multipart/form-data" class="ajax">
          <div class="modal-body">
              <div class="card-body">
             
                  
                
                <div class="form-group">
                <input type="number" class="form-control" id="staffid" name="staffid" placeholder="Enter Staff Number" style="display: none;">
                  <label for="staffnumber">Staff Number</label>
                  <input type="text" class="form-control" id="staffnumber" name="staffnumber" placeholder="Enter Staff Number">
                  <span id="staffnumber-error"></span>
                </div>
                  <div class="form-group">
                    <label for="staffname">Staff Name</label>
                    <input type="text" class="form-control" id="staffname" name="staffname" placeholder="Enter Full name">
                  </div>
                <div class="form-group">
                    <label for="staffmail">Email address</label>
                    <input type="email" class="form-control" id="staffmail" name="staffmail" placeholder="Enter email" >
                    <span id="staffmail-error"></span>
                  </div>
                  <div class="form-group">
                    <label for="staffrole">Staff Role</label>
                    <select name="staffrole" id="staffrole" class="form-control">
                      <option value="">Staff Role</option>
                      <option value="administrator">Admin</option>
                      <option value="deptofficer">Department Officer</option>
                      <option value="lecturer">Lecturer</option>
                    </select>
                  </div>
                  <span id="staffrole-error"></span>
                  <div class="form-group">
                    <label for="staffdepartment">Staff Role</label>
                    <select name="staffdepartment" id="staffdepartment" class="form-control">
                      <option value="NULL">Department</option>
                      <!-- <span id="staffrole-disp"></span> -->
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="staffpass">Password</label>
                    <input type="password" class="form-control" id="staffpass" name="staffpass" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="staffphoto">Picture</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="staffphoto" name="staffphoto">
                        <label class="custom-file-label" id="staffph" for="staffphoto">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                    <span id="staffphoto-error" style="color: red;"></span>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" id="submitstaff" name="submitstaff" class="btn btn-primary">Submit</button>
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
// $('form.ajax').on('submit', function(event){
//   var myform = $(this),
//       url = myform.attr('action'),
//       type = myform.attr('method'),
//       data = {};
//       myform.find('[name]').each(function(index, value){
//           var item = $(this),
//               name = item.attr('name'),
//               value = item.val();

//               data[name] = value;
//       });
//       $.ajax({
//         url :url,
//         type: type,
//         data: JSON.stringify(data),
//         dataSrc: "",
//         success: function(response){
//          console.log(response);
//          $('form.ajax')[0].reset();
//         // $('#tablediv').load();
        
//         }

//       });
//   event.preventDefault();
// });


$('form.ajax').on('submit', function(event){
  var myform = $(this),
      url = myform.attr('action'),
      type = myform.attr('method');
      data = [];
      myform.find('[name]').each(function(index, value){
          var item = $(this),
              name = item.attr('name'),
              value = item.val();

              data[name] = value;
      });
      $.ajax({
        url :url,
        type: type,
        data: data,
        success: function(response){
         console.log(response);
        //  $('form.ajax')[0].reset();
        // $('#maintable').DataTable().ajax.reload();
        window.location.replace('staff.php');
        
        }

      });
  event.preventDefault();
});




});

$(document).ready(function(){
$("#staffphoto").change(function(){
  var file = this.files[0];
  var fileType = file.type;
  var match = ['image/jpeg', 'image/jpg', 'image/png'];

  if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]))){
    alert("Sorry, Only Jpeg,JPG and PNG are allowed");
    $("#staffphoto-error").html("Error on file");
    $('#submitstaff').prop('disabled',true );
  }
  else{
    $('#submitstaff').prop('disabled',false ); 
  jQuery.ajax({
      url:"action.php",
      data: 'staffphoto ='+$("#staffphoto").val(),
      type: "POST",
      success: function(data){
        $("#staffphoto-error").html(data);

      },
      error:function(){}
    }); 
  }
});

$('#staffnumber').keyup(function(){
    jQuery.ajax({
      url:"action.php",
      data: 'staffnumber='+$("#staffnumber").val(),
      type: "POST",
      success: function(data){
        $("#staffnumber-error").html(data);

      },
      error:function(){}
    });
    });

    $('#staffmail').keyup(function(){
    jQuery.ajax({
      url:"action.php",
      data: 'staffmail='+$("#staffmail").val(),
      type: "POST",
      success: function(data){
        $("#staffmail-error").html(data);
        $()

      },
      error:function(){}
    });
    });

    $('#staffrole').change(function(){
    jQuery.ajax({
      url:"action.php",
      data: 'staffrole='+$("#staffrole").val(),
      type: "POST",
      success: function(data){
        $("#staffdepartment").html(data);

      },
      error:function(){}
    });
    });

    $('.edit').click(function(){
      var id = $(this).attr('id').replace('edit-','');
      mydata = {sid:id}
      jQuery.ajax({
      url:"action.php",
      dataType: "json",
      data: JSON.stringify(mydata),
      type: "POST",
      success: function(data){
        // console.log(data);
        $('#staffid').val(data.id);
        $('#staffnumber').val(data.staff_number);
        $('#staffname').val(data.name);
        $('#staffmail').val(data.mail);
        $('#staffrole').val(data.role);
        $('#staffpass').val(data.pass);
        $('#staffdepartment').val(data.department);
        $('#staffphoto').val(data.pic);

      },
      error:function(){}
    });
    });

    $('.del').click(function(){
      if(confirm("Are You Sure You want to delete the item?")){
      var id = $(this).attr('id').replace('del-','');
      jQuery.ajax({
      url:"action.php",
      data: 'del='+id,
      type: "POST",
      success: function(data){
        console.log(data);
          
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
