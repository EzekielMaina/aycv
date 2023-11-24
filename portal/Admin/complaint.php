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
            <h1 class="m-0 text-dark">Complaints</h1>
          </div><!-- /.col --> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Complaints</li>
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
                  <h3 class="card-title">Complaints Table</h3>
                </div>
               
                
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Complaint title</th>
                      <th>Complaint Description</th>
                      <th>Complaint Posted by</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Payment of Fee half ?</td>
                      <td>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, dolores?
                      </td>
                      <td>CCS/0098/019</td>
                      <td>
                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-reply" title="Reply" href="#">
                            <i class="fas fa-reply"></i>
                        </a>
                      <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete" title="Delete" href="#">
                            <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Halting of students?</td>
                      <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, nemo.</td>
                      <td>TMC/00056/019</td>
                      <td>
                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-reply" title="Reply" href="#">
                            <i class="fas fa-reply"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete" title="Delete" href="#">
                            <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Complaining via portals?</td>
                      <td>Lorem ipsum dolor sit amet.</td>
                      <td>PHT/00988/019</td>
                      <td>
                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-reply" title="Reply" href="#">
                            <i class="fas fa-reply"></i>
                        </a>
                      <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete" title="Delete" href="#">
                            <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Complaint title</th>
                        <th>Complaint Description</th>
                        <th>Complaint Posted by</th>
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
  <div class="modal fade" id="modal-reply">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">View more</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form">
          <div class="modal-body">
              <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, quam.</label>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Reply</label>
                   <textarea name="subject" id="subject"  class="form-control" placeholder="Enter reply..."></textarea>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send</button>
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
</body>
</html>
