


 <?php
include'../action/dbconnect.php';

if(!empty($_POST["units"]) and !empty($_POST["aunits"])){
    $units = $_POST['units'];
    $aunits = $_POST['aunits'];
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


        
        $sql = "SELECT student.stud_reg as reg ,student.stud_name as name ,unitreg.cat as cat,unitreg.main as main,unitreg.grade as grade FROM student where unitreg.session_id=session_students.session_reg and unitreg.unit_id=unit.unit_id and unit.unit_name=$units and session_students.ayear_id=ayear.id and ayear.ac_year=$aunits";
        $query = mysqli_query($conn,$sql);
        if (mysqli_num_rows($query) > 0) {
          echo'            
                <div class="card-header">
                <h3 class="card-title">Adding Marks</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Registration Number</th>
                    <th>Name</th>
                   
                    <th>Result <i>X/100</i></th>
                    <th>Grade</th>
                    
                  </tr>
                  </thead>
                  <tbody>';
            while($row = mysqli_fetch_array($query)){
                $studreg = $row["reg"];
                $studname = $row["name"];
                $cat = $row["cat"];
                $main = $row["main"];
                $total=$cat+$main;
                $grade = $row["grade"];
                $counter=0;
                echo '
                  <tr>
                    <td>$counter+1</td>
                    <td>$reg</td>
                    <td>$name</td>
                    <td>$total</td>
                    <td>$grade</td>
                    
                  </tr>'
                
                ;
            }
            echo'<tfoot>
            <tr>
                    <th>#</th>
                    <th>Registration Number</th>
                    <th>Name</th>
                   
                    <th>Result <i>X/100</i></th>
                    <th>Grade</th>
                    
                    </tr>
                  </tfoot>
                </table>
              </div>';
        }
        echo'<div class="card-header">
                <h3 class="card-title">Managing Students</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <p> No Student</p>
              </div
';
        


    }
}

?>



            
                  
      
                 