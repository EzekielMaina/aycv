<!DOCTYPE html>
<html>
<?php
include "header.php";
// include 'retreive.php';
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
            <h1 class="m-0 text-dark">School</h1>
          </div><!-- /.col --> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">School</li>
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
                  <h3 class="card-title">School Table</h3>
                  <div class="clearfix">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-default" title="Add a school/faculty"><i class="fas fa-plus"></i> School</button>
                   </div>
                </div>
               
                
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>School Name</th>
                      <th>School Code</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">
                    
                    <?php include 'retreive.php';
                          retreiveschool($conn);
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>#</th>
                      <th>School Name</th>
                      <th>School Code</th>
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
          <h4 class="modal-title">School Allocations</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- <span id="response"></span> -->
        <form role="form" action="action.php" class="ajax" method="POST">
          <div class="modal-body">
              <div class="card-body">
                  <div class="form-group">
                  <!-- <input type="number" class="form-control" id="schid" name="schid" placeholder="Enter Staff Number" style="display: none;"> -->
                    <label for="schname">School name</label>
                    <input type="text" class="form-control" id="schname" name="schname" placeholder="Enter School name">
                  </div>
                <div class="form-group">
                    <label for="schcode">School Code</label>
                    <input type="text" class="form-control" id="schcode" name="schcode" placeholder="Enter School Code e.g SAAS">
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" id="schsubmit" name="schsubmit" class="btn btn-primary">Submit</button>
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
          <h4 class="modal-title">Schooly Allocations</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- <span id="response"></span> -->
        <form role="form" action="action.php" class="ajax" method="POST">
          <div class="modal-body">
              <div class="card-body">
                  <div class="form-group">
                  <input type="number" class="form-control" id="edschid" name="edschid" placeholder="Enter Staff Number" disabled>
                    <label for="schname">School name</label>
                    <input type="text" class="form-control" id="edschname" name="edschname" placeholder="Enter School name">
                  </div>
                <div class="form-group">
                    <label for="schcode">School Code</label>
                    <input type="text" class="form-control" id="edschcode" name="edschcode" placeholder="Enter School Code e.g SAAS">
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" id="edschsubmit" name="edschsubmit" class="btn btn-primary">Edit Submit</button>
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
        //  $('form.ajax')[0].reset();
        //  $('#tbody').html(response);
        // $('#maintable').DataTable().ajax.reload();
        $('#response').html(response);
        window.location.replace('school.php');
        
        }

      });
  event.preventDefault();
});

$('.editsch').click(function(){
      var id = $(this).attr('id').replace('editsch-','');
      mydata = {schoolid:id}
      jQuery.ajax({
      url:"action.php",
      dataType: "json",
      data: JSON.stringify(mydata),
      type: "POST",
      success: function(data){
        // console.log(data);
        $('#edschid').val(data.sch_id);
        $('#edschname').val(data.sch_name);
        $('#edschcode').val(data.sch_code);
      },
      error:function(){}
    });
    });

    $('.delsch').click(function(){
      if(confirm("Are You Sure You want to delete the item?")){
      var id = $(this).attr('id').replace('delsch-','');
      jQuery.ajax({
      url:"action.php",
      data: 'delsch='+id,
      type: "POST",
      success: function(data){
        console.log(data);
        // window.location.replace('school.php');
        
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
