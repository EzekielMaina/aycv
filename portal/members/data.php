<?php
include'../action/dbconnect.php';

if(!empty($_POST["units"])){
    $units = $_POST['units'];
    if($units == "no")
    {
        echo'<div class="card-header">
                <h3 class="card-title">Managing Students</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <p> Conuslt the Department Officer</p>
              </div
';
        
    }
    else
    {
        
        $sql = "SELECT stud_reg,stud_name FROM student where unitreg.session_id=session_students.session_reg and unitreg.unit_id=unit.unit_id and unit.unit_name=$units";
        $query = mysqli_query($conn,$sql);
        if (mysqli_num_rows($query) > 0) {
          echo'<div class="card-header">
                <h3 class="card-title">Managing Students</h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
              <span id="confirmed"></span>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Registration Number</th>
                    <th>Student Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>';
            while($row = mysqli_fetch_array($query)){
                $studreg = $row["stud_reg"];
                $studname = $row["stud_name"];
                $counter=0;
                echo "
                  <tr>
                    <td>$counter+1</td>
                    <td>$studreg</td>
                    <td>$studname</td>
                    <td><button type='button' id='rev-$studreg' name='rev' class='btn btn-primary rev' data-toggle='modal'>Revert</button></td> 
                  </tr>"
                
                ;
            }
            echo'<tfoot>
                    <th>#</th>
                    <th>Registration Number</th>
                    <th>Student Name</th>
                    <th>Action</th>
                  </tfoot>
                </table>
              </div>';
        }
        echo'<div class="card-header">
                <h3 class="card-title">Managing Students</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <p> No Stuedent</p>
              </div
';
        


    }
}

?>



            
                  
                  
      