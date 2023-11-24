 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['adminname'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
    
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="admindash.php" class="nav-link">
                  <i class="fas fa-tachometer-alt nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
          <li class="nav-item has-treeview">
            <a href="allocations#" class="nav-link">
              <i class="fas fa-folder-open"></i>
              <p>
                Allocations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="student.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="staff.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="hostel.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hostels</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="school.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Schools</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="department.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="programme.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Programmes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="stage.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="unit.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Units</p>
                </a>
              </li>
            </ul>
            <li class="nav-item">
              <a href="poll.php" class="nav-link">
                <i class="fas fa-bullhorn"></i>
                <p>Polls</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="complaint.php" class="nav-link">
                <i class="fas fa-clipboard-list"></i>
                <p>Complaints
                  <span class="badge badge-info right">6</span>
                </p>
                
              </a>
            </li>
          </li>
        </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>