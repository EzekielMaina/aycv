 <?php
 include 'dbconnect.php';


if(isset($_POST['rev']))
	{
  $studreg = $_POST['rev'];

$sql = "
DELETE FROM unitreg WHERE unitreg.session_id=session_students.session_reg and session_students.stud_id=student.stud_id and student.stud_reg=$studreg";
$query = mysqli_query($conn, $sql);
if($query){
	header("Location:manage.php");
            echo "
              <div class='alert alert-success' role='alert'>
              reverted
              </div>
            ";
          }
  
    
else{
    header("Location:manage.php");
    exit();
}


}






                     
 ?>