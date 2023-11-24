


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
                    <th>Control</th>
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
                    <td class="project-actions text-right" style="color: white;">
                      <a class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modal-default" value>
                          <i class="fas fa-plus">
                          </i>
                          Add
                      </a>
                      <a class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#modal-edit">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      
                  </td>
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
                    <th>Control</th>
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



            
                  
      
                  <tr>
                    <td>123</td>
                    <td>CCS/00098/019</td>
                    <td>Operating Systems</td>
                    <td>2019/20</td>
                    <td>90</td>
                    <td>B</td>
                    <td class="project-actions text-right" style="color: white;">
                      <a class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modal-default">
                          <i class="fas fa-plus">
                          </i>
                          Add
                      </a>
                      <a class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#modal-edit">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      
                  </td>
                  </tr>
                  
                  <tr>
                    <td>454</td>
                    <td>CCS/0098/019</td>
                    <td>Mobile computing</td>
                    <td>2005/07</td>
                    <td>57</td>
                    <td>A</td>
                    <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#modal-default">
                        <i class="fas fa-plus">
                        </i>
                        Add
                      </a>
                      <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-edit">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                     
                  </td>
                  </tr>
                 
                 
                  <tr>
                    <td>124</td>
                    <td>ESE/6788/019</td>
                    <td>HIV/AIDS</td>
                    <td>2020</td>
                    <td>82</td>
                    <td>A</td>
                    <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#modal-default">
                        <i class="fas fa-plus">
                        </i>
                        Add
                      </a>
                      <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-edit">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                     
                  </td>
                  </tr>
              
                  <tr>
                    <td>153</td>
                    <td>ED/0009/020</td>
                    <td>Arts</td>
                    <td>218</td>
                    <td>56</td>
                    <td>A</td>
                    <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#modal-default">
                        <i class="fas fa-plus">
                        </i>
                        Add
                      </a>
                      <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-edit">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      
                  </td>
                  </tr>
                  <tfoot>
                    <th>Exam card Number</th>
                    <th>Registration Number</th>
                    <th>Registered Unit</th>
                    <th>Year</th>
                    <th>Result <i>X/100</i></th>
                    <th>Grade</th>
                    <th>Control</th>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>