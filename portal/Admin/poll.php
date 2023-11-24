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
            <h1 class="m-0 text-dark">Poll</h1>
          </div><!-- /.col --> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Poll</li>
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
                  <h3 class="card-title">Poll Table</h3>
                  <div class="clearfix">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-default" title="Add a poll"><i class="fas fa-plus"></i> Poll</button>
                   </div>
                </div>
               
                
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Poll ID</th>
                      <th>Poll Name</th>
                      <th>Poll Description</th>
                      <th>Yes Polls</th>
                      <th>No Polls</th>
                      <th>Undecided</th>
                      <th>T.Responses</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Payment of Fee half ?
                      </td>
                      <td>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, dolores?
                      </td>
                      <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-volumenow="75" aria-volumemin="0" aria-volumemax="100" style="width: 75%">
                            </div>
                        </div>
                        <small>
                            75%
                        </small>
                      </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-danger" role="progressbar" aria-volumenow="10" aria-volumemin="0" aria-volumemax="100" style="width: 10%">
                              </div>
                          </div>
                          <small>
                              10%
                          </small>
                      </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-secondary" role="progressbar" aria-volumenow="15" aria-volumemin="0" aria-volumemax="100" style="width: 15%">
                              </div>
                          </div>
                          <small>
                              15%
                          </small>
                      </td>
                      <td>20</td>
                      <td>
                      <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete" title="Delete" href="#">
                            <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Halting of students?</td>
                      <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, nemo.</td>
                      <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-volumenow="60" aria-volumemin="0" aria-volumemax="100" style="width: 60%">
                            </div>
                        </div>
                        <small>
                            60%
                        </small>
                    </td>
                    <td class="project_progress">
                      <div class="progress progress-sm">
                          <div class="progress-bar bg-danger" role="progressbar" aria-volumenow="22" aria-volumemin="0" aria-volumemax="100" style="width: 22%">
                          </div>
                      </div>
                      <small>
                          22%
                      </small>
                      </td>
                      <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-secondary" role="progressbar" aria-volumenow="18" aria-volumemin="0" aria-volumemax="100" style="width: 18%">
                            </div>
                        </div>
                        <small>
                            18%
                        </small>
                    </td>
                      <td>23</td>
                      <td>
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
                      <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-volumenow="40" aria-volumemin="0" aria-volumemax="100" style="width: 40%">
                            </div>
                        </div>
                        <small>
                            40%
                        </small>
                    </td>
                    <td class="project_progress">
                      <div class="progress progress-sm">
                          <div class="progress-bar bg-danger" role="progressbar" aria-volumenow="38" aria-volumemin="0" aria-volumemax="100" style="width: 38%">
                          </div>
                      </div>
                      <small>
                          38%
                      </small>
                  </td>
                  <td class="project_progress">
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-secondary" role="progressbar" aria-volumenow="22" aria-volumemin="0" aria-volumemax="100" style="width: 22%">
                        </div>
                    </div>
                    <small>
                        22%
                    </small>
                  </td>
                      <td>27</td>
                      <td>
                      <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete" title="Delete" href="#">
                            <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Poll ID</th>
                      <th>Poll Name</th>
                      <th>Poll Description</th>
                      <th>Yes Polls</th>
                      <th>No polls</th>
                      <th>Undecided</th>
                      <th>Total Responses</th>
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
          <h4 class="modal-title">Add a Poll</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form">
          <div class="modal-body">
              <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Poll name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Poll name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Poll name</label>
                   <textarea name="exampleInputEmail1" id="exampleInputEmail1"  class="form-control" placeholder="Enter some Brief Description..."></textarea>
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
