<!DOCTYPE html>
<html>
<?php
include '../action/dbconnect.php';
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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3> <?php 
                  $sql = "SELECT * FROM student";
                  $query = mysqli_query($conn,$sql);
                  $totno = mysqli_num_rows($query) ;
                  echo $totno;
                ?></h3>

                <p>Students</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php 
                  $sql = "SELECT * FROM student  WHERE stud_session='registered'";
                  $query = mysqli_query($conn,$sql);
                  $seno = mysqli_num_rows($query) ;
                  echo $seno;
                ?></h3>

                <p>Session Students</p>
              </div>
              <div class="icon">
                <i class="fas fa-link"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php 
                  $sql = "SELECT * FROM student WHERE stud_session='unregistered'";
                  $query = mysqli_query($conn,$sql);
                  $unregno = mysqli_num_rows($query) ;
                  echo $unregno;
                ?></h3>

                <p>Unregistered Students</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-times"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php 
                  $sql = "SELECT * FROM staff WHERE role='lecturer'";
                  $query = mysqli_query($conn,$sql);
                  $lecno = mysqli_num_rows($query) ;
                  echo $lecno;
                ?></h3>

                <p>Lecturers</p>
              </div>
              <div class="icon">
                <i class="fas fa-clipboard"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-columns"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Departments</span>
                <span class="info-box-number"><?php 
                  $sql = "SELECT * FROM department";
                  $query = mysqli_query($conn,$sql);
                  $depno = mysqli_num_rows($query) ;
                  echo $depno;
                ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-folder"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Programme</span>
                <span class="info-box-number"><?php 
                  $sql = "SELECT * FROM course";
                  $query = mysqli_query($conn,$sql);
                  $cno = mysqli_num_rows($query) ;
                  echo $cno;
                ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class=" fas fa-pencil-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Units</span>
                <span class="info-box-number"><?php 
                  $sql = "SELECT * FROM unit";
                  $query = mysqli_query($conn,$sql);
                  $uno = mysqli_num_rows($query) ;
                  echo $uno;
                ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clipboard-list"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Complaints</span>
                <span class="info-box-number"><?php 
                  $sql = "SELECT * FROM complaint";
                  $query = mysqli_query($conn,$sql);
                  $compno = mysqli_num_rows($query) ;
                  echo $compno;
                ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            
            <!-- /.info-box -->
          </div>
          <div class="col-md-8">
            <div class="card">
              
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">Students</span>
                    <span class="text-bold">15</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> Students Ratio
                    </span>
                    <a href="javascript:void(0);">View Report</a>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Male
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Female
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

          </div>
          
        </div>
        <!-- Main row -->
        <div class="row">
         
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  include "footer.php";
  ?>
<script>
  $(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  var salesChart  = new Chart($salesChart, {
    type   : 'bar',
    data   : {
      labels  : ['1st yrs', '2nd Yrs', '3rd Yrs', '4th Yrs'],
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor    : '#007bff',
          data           : [3, 2, 1, 4]
        },
        {
          backgroundColor: '#ced4da',
          borderColor    : '#ced4da',
          data           : [1, 3, 2, 0]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }
              return '$' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })

})

</script>
</body>
</html>
