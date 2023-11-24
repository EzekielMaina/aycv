<?php
include_once '../action/dbconnect.php';
session_start();

$data = stripslashes(file_get_contents("php://input"));
 $mydata = json_decode($data, true);

 if(isset($_POST["adminlogin"])){
     $admname = $_POST['admuname'];
     $admpass = $_POST['admpass'];
     if (!empty($admname) && !empty($admpass)) {
        $sql = "SELECT username,password,role FROM staff WHERE role = 'administrator' AND username='$admname' AND password='$admpass'";
        // $query = mysqli_query($conn,$sql);
        if (mysqli_num_rows(mysqli_query($conn, $sql)) == TRUE) {
            // echo "login successful";
            echo "<script>window.location.replace('admindash.php');</script>";
            $_SESSION['adminname'] = $admname;
        } else{
            echo 'Incorrect login Details';
        }
     }
 }

 if(isset($mydata["schsubmit"])){
    //$schid = $mydata['schid'];
    $schname = $mydata['schname'];
    $schcode = $mydata['schcode'];
    // echo "$schcode";
    if(!empty($schname) && !empty($schcode)){
        $sql = "INSERT INTO school(sch_code,sch_name) VALUES ('$schcode','$schname')"; 
        // -- ON DUPLICATE KEY UPDATE sch_code='$schcode',sch_name='$schname'";
        if($conn->query($sql) == TRUE){
            // echo "School Saved Succesfully";
            include 'retreive.php';
            retreiveschool($conn);
        }
        else{
            echo "Unable to save";
        }
    }

 }

if(!empty($_POST["staffnumber"])){
    $staffno = $_POST['staffnumber'];
    if(filter_var($staffno,FILTER_DEFAULT)===false)
    {
        echo "error : You did not enter a valid admission ";
    }
    else
    {
   $sql="SELECT staff_number from staff where staff_number = '$staffno'";
   $query = mysqli_query($conn,$sql);
   $row = mysqli_num_rows($query);
   $data=mysqli_fetch_array($query);
   if($data>0)
   {
       echo"<span style ='color:red'>Registration already exists.</span>";
       echo"<script>$('#submitstaff').prop('disabled',true );</script>";
   }
else
  {
    echo"<script>$('#submitstaff').prop('disabled',false );</script>";
}

    }
}

if(!empty($_POST["staffmail"])){
    $staffmail = $_POST['staffmail'];
    if(filter_var($staffmail,FILTER_VALIDATE_EMAIL)=== FALSE)
    {
        echo "<span style='color:red;'><span style='font-weight:700;font-size:20px;'>! </span>Invalid Email</span>";
    }
    else
    {
   $sql="SELECT staff_number from staff where mail = '$staffmail'";
   $query = mysqli_query($conn,$sql);
   $row = mysqli_num_rows($query);
   $data=mysqli_fetch_array($query);
   if($data>0)
   {
       echo"<span style ='color:red'>Email already exists.</span>";
       echo"<script>$('#submitstaff').prop('disabled',true );</script>";
   }
else
   
  {
    echo"<span style ='color:green'>Email available for Registration.</span>";
    echo"<script>$('#submitstaff').prop('disabled',false );</script>";
    
}

    }
}
if(!empty($_POST["staffrole"])){
    $role = $_POST['staffrole'];
    if($role == "")
    {
        echo"<span style ='color:red'>No role selected</span>";
        echo"<script>$('#submitstaff').prop('disabled',true );</script>";
    }
    elseif($role == "deptofficer" || $role == "lecturer")
    {
        echo"<script>$('#staffdepartment').prop('disabled',false );</script>";
        $sql = "SELECT id,name FROM department";
        $query = mysqli_query($conn,$sql);
        if($query){
            while($row = mysqli_fetch_array($query)){
                $id = $row["id"];
                $role = $row["name"];
                echo "
                <option value='$id'>$role</option>
                ";
            }
        }

    } elseif($role == "administrator"){
        echo "<option value='NULL'>ALL Departments</option>";
        echo"<script>$('#staffdepartment').prop('disabled',true );</script>";
    }
    
}

//delete staff
if(!empty($_POST['del'])){
    $staffid = $_POST['del'];
    $sql = "DELETE FROM staff WHERE id=$staffid";
    if($conn->query($sql) == TRUE){
        echo "Staff deleted";
    } else{
        echo "unable to delete student";
    }
}

//delete student
if(isset($mydata['delst'])){
    $studid = $mydata['delst'];
    $sql = "DELETE FROM student WHERE stud_id=$studid";
    if($conn->query($sql) == TRUE){
        echo "Student deleted";
    } else{
        echo "unable to delete student";
    }
}

//Delete school
if(!empty($_POST['delsch'])){
    $schoolid = $_POST['delsch'];
    $sql = "DELETE FROM school WHERE sch_id=$schoolid";
    if($conn->query($sql) == TRUE){
        echo "school deleted";
        header("Location:school.php");
    } else{
        echo "unable to delete School";
    }
}
//delete Department

if(!empty($_POST['deldept'])){
    $deptid = $_POST['deldept'];
    $sql = "DELETE FROM department WHERE id=$deptid";
    if($conn->query($sql) == TRUE){
        echo "DEpartment deleted";
        header("Location:department.php");
    } else{
        echo "unable to delete Department";
    }
}
//dsplay staff on edit
if(isset($mydata['sid'])){
    $id = $mydata['sid'];
    $sql = "SELECT * FROM staff WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row);
}
if(!empty($_POST['editdept'])){
    
    $depid = $_POST['editdept'];
  
    $sql = "SELECT * FROM department WHERE id=$depid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row);
}


// display school on edit
if(isset($mydata['schoolid'])){
    $id = $mydata['schoolid'];
    $sql = "SELECT * FROM school WHERE sch_id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row);
}
if(isset($mydata["schsubmit"])){
    // $schid = $mydata['schid'];
    $schname = $mydata["schname"];
    $schcode = $mydata["schcode"];

//Insert Or update
if(!empty($schname) && !empty($schcode)){
    $sql = "INSERT INTO staff(sch_name,sch_code) VALUES
    ('$schname','$schcode')";
    if($conn->query($sql) == TRUE){
        //echo "School Saved Succesfully";
        
    }
    else{
        echo "Unable to save the school";
    }
}
}
if(isset($mydata["edschsubmit"])){
    $edschid = $mydata['edschid'];
    $edschname = $mydata["edschname"];
    $edschcode = $mydata["edschcode"];

//Insert Or update
if(!empty($edschname) && !empty($edschcode)){
    $sql = "UPDATE school SET sch_name='$edschname',sch_code= '$edschcode' WHERE sch_id=$edschid";
    if($conn->query($sql) == TRUE){
        echo "School Saved Succesfully";
        
    }
    else{
        echo "Unable to save the school";
    }
}
}
if(isset($_POST["submitstaff"])){
    // $id = $_POST['staffid'];
    $staffno = $_POST["staffnumber"];
    $staffname = $_POST["staffname"];
    $staffmail = $_POST["staffmail"];
    $staffrole = $_POST["staffrole"];
    $staffpass = $_POST["staffpass"];
    $staffdept = $_POST["staffdepartment"];

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["staffphoto"]["name"]); 
    $uploadOk = 0;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 
    $imageFilename = strtolower(pathinfo($target_file,PATHINFO_FILENAME));
    
    if(file_exists($target_file)){
        $uploadOk = 0;
        "<script>alert('It already Existst');</script>";
    }
    if($_FILES["staffphoto"]["size"] > 5000000){
        $uploadOk = 0;
        echo "<script>alert('too big');</script>";
    } else{
        if(move_uploaded_file($_FILES['staffphoto']['tmp_name'],$target_file) ){
            $uploadFile = $target_file;
            $uploadOk = 1;
            echo "<script>alert('uploaded');</script>";
        } else{
            echo "<script>alert('please select a different file or rename the previous tu re upload');</script>";
            $uploadOk = 0;
        }
    }
if($uploadOk == 1){
//Insert Or update
if(!empty($staffno) && !empty($staffname) && !empty($staffmail) && !empty($staffrole) && !empty($staffpass)){
    $sql = "INSERT INTO staff(staff_number, name, mail, role, pass, pic, department) VALUES
    ('$staffno','$staffname','$staffmail','$staffrole','$staffpass','$uploadFile',$staffdept) ON DUPLICATE KEY
    UPDATE staff_number='$staffno',name ='$staffname', mail ='$staffmail',role ='$staffrole',pass='$staffpass'";
    if($conn->query($sql) == TRUE){
        // echo "Staff Saved Succesfully";
        header('Location:staff.php');
    }
    else{
        // echo "Unablity to save";
        header('Location:staff.php');
    }
}
}
}


//DEpartment
if(isset($mydata["submitdept"])){
    // $deptid = $mydata['deptid'];
    $deptname = $mydata["deptname"];
    // $deptcode = $mydata["deptcode"];
    $deptsch = $mydata["deptsch"];
    $deptofficer = $mydata["deptofficer"];

//Insert Or update
// ON DUPLICATE KEY UPDATE school_id=$deptsch,name ='$deptname',officer_id =$deptofficer";
if(!empty($deptname) && !empty($deptsch) && !empty($deptofficer)){
    $sql = "INSERT INTO department(school_id,name,officer_id) VALUES
    ($deptsch,'$deptname',$deptofficer)";
    
    if($conn->query($sql) == TRUE){
        echo "Department Saved Succesfully";
    }
    else{
        echo "Unable to save Department";
    }
}
}

if(isset($mydata["submiteddept"])){
    $deptid = $mydata['deptid'];
    $eddeptname = $mydata["eddeptname"];
    $eddeptsch = $mydata["eddeptsch"];
    $eddeptofficer = $mydata["eddeptofficer"];

if(!empty($eddeptname) && !empty($eddeptsch) && !empty($eddeptofficer)){
    $sql = "UPDATE department SET school_id=$eddeptsch,name='$eddeptname',officer_id=$eddeptofficer WHERE id=$deptid";
    
    if($conn->query($sql) == TRUE){
        echo "Department Updated Succesfully";
    }
    else{
        echo "Unable to Updated Department";
    }
}else{
    echo "sth is empty";
}
}


// DElETE PROGRAMME
if(isset($mydata['delprog'])){
    $delprog = $mydata['delprog'];
    $sql = "DELETE FROM course WHERE id=$delprog";
    if($conn->query($sql) == TRUE){
        echo "Course delete successfully";
        header("Location:programme.php");
    } else{
        echo "unable to delete Department";
    }
}

//display prog on edit
if(isset($mydata['progid'])){
    $progid = $mydata['progid'];
    $sql = "SELECT * FROM course WHERE id=$progid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row);
}

//editand submit programme
if(isset($_POST["submitprog"])){
    // $courseid = $_POST['cid'];
    $coursename = $_POST["cname"];
    $coursedept = $_POST["cdept"];
    $coursecode = $_POST["ccode"];

//Insert Or update
if(!empty($coursename) && !empty($coursedept) && !empty($coursecode)){
    // echo "Succeessfully posted $coursedept,$coursename,$coursecode";
    $sql = "INSERT INTO course(dept_id,name,code) VALUES ($coursedept,'$coursename','$coursecode')";
    if($conn->query($sql) == TRUE){
        echo "Course Saved Succesfully";
        header("Location:programme.php");
    }
    else{
        echo "Unable to save Course";
    }
}
}

if(isset($_POST["submitedprog"])){
    $edcourseid = $_POST['edcid'];
    $edcoursename = $_POST["edcname"];
    $edcoursedept = $_POST["edcdept"];
    $edcoursecode = $_POST["edccode"];

//Insert Or update
if(!empty($edcoursename) && !empty($edcoursedept) && !empty($edcoursecode)){
    $sql = "UPDATE course SET name ='$edcoursename', dept_id = $edcoursedept, code='$edcoursecode'WHERE id=$edcourseid";
    if($conn->query($sql) == TRUE){
        echo "Course updated Succesfully";
        header("Location:programme.php");
    }
    else{
        echo "Unable to updated Course";
    }
}
}



// Delete Stage
if(isset($mydata['delstg'])){
    $delstg = $mydata['delstg'];
    $sql = "DELETE FROM stage WHERE id=$delstg";
    if($conn->query($sql) == TRUE){
        echo "Stage deleted successfully";
    } else{
        echo "unable to delete Stage";
    }
}

//display prog on edit
if(isset($mydata['stgid'])){
    $stageid = $mydata['stgid'];
    $sql = "SELECT * FROM stage WHERE id=$stageid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row);
}

//editand submit programme
if(isset($_POST["submitstg"])){
    // $courseid = $_POST['cid'];
    $code = $_POST["stgcode"];
    $yr = $_POST["stgyr"];
    $sem = $_POST["stgsem"];

//Insert Or update
if(!empty($code) && !empty($yr) && !empty($sem)){
    // echo "Succeessfully posted $coursedept,$coursename,$coursecode";
    $sql = "INSERT INTO stage(code,year,sem) VALUES ('$code',$yr,$sem)";
    if($conn->query($sql) == TRUE){
        echo "Stage Saved Succesfully";
        header("Location:stage.php");
    }
    else{
        echo "Unable to save Course";
    }
}
}

if(isset($_POST["edsubmitstg"])){
    $edstgid = $_POST['edstgid'];
    $edcode = $_POST["edstgcode"];
    $edyr = $_POST["edstgyr"];
    $edsem = $_POST["edstgsem"];

//Insert Or update
if(!empty($edcode) && !empty($edyr) && !empty($edsem)){
    $sql = "UPDATE stage SET code ='$edcode', year = $edyr, sem='$edsem'WHERE id=$edstgid";
    if($conn->query($sql) == TRUE){
        echo "Stage updated Succesfully";
        header("Location:stage.php");
    }
    else{
        echo "Unable to updated stage";
    }
}
}


//Delete Unit
if(isset($mydata['delun'])){
    $delun = $mydata['delun'];
    $sql = "DELETE FROM unit WHERE unit_id=$delun";
    if($conn->query($sql) == TRUE){
        echo "Unit deleted successfully";
        header("Location:unit.php");
    } else{
        echo "unable to delete unit";
    }
}

//display prog on edit
if(isset($mydata['unitid'])){
    $unitid = $mydata['unitid'];
    $sql = "SELECT * FROM unit WHERE unit_id=$unitid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row);
}

//editand submit programme
if(isset($_POST["submitun"])){
    // $courseid = $_POST['cid'];
    $ucode = $_POST["uncode"];
    $uname = $_POST["unname"];
    $ustage = $_POST["unstage"];
    $udept = $_POST["undept"];
    $ucourse = $_POST["uncourse"];

//Insert Or update
if(!empty($ucode) && !empty($uname) && !empty($ucourse) && !empty($udept) && !empty($ustage)){
    // echo "Succeessfully posted $ucode,$uname,$ustage,$udept,$ucourse";
    $sql = "INSERT INTO unit(course_id,dept_id,unit_code,stage_id,unit_name) VALUES ($ucourse,$udept,'$ucode',$ustage,'$uname')";
    if($conn->query($sql) == TRUE){
        echo "Unit Saved Succesfully";
        header("Location:unit.php");
    }
    else{
        echo "Unable to save unit";
    }
}
}

if(isset($_POST["edsubmitun"])){
    $eduid = $_POST['edunid'];
    $educode = $_POST["eduncode"];
    $eduname = $_POST["edunname"];
    $edustage = $_POST["edunstage"];
    $edudept = $_POST["edundept"];
    $educourse = $_POST["eduncourse"];

//Insert Or update
if(!empty($educode) && !empty($eduname) && !empty($educourse) && !empty($edudept) && !empty($edustage)){
    // echo "Succeessfully posted id: $eduid, code:$educode,name:$eduname,stage:$edustage,dept:$edudept,course:$educourse";
$sql = "UPDATE unit set unit_code='$educode',unit_name='$eduname',stage_id=$edustage,dept_id=$edudept,course_id=$educourse where unit_id=$eduid;";
    if($conn->query($sql) == TRUE){
        echo "Unit updated Succesfully";
        header("Location:unit.php");
    }
    else{
        echo "Unable to update unit";
    }
}
}



//Delete room
if(isset($mydata['delh'])){
    $delhostel = $mydata['delh'];
    $sql = "DELETE FROM room WHERE id=$delh";
    $sql ="DELETE FROM room where id=$delhostel;";
    if($conn->query($sql) == TRUE){
        echo "Room deleted successfully";
        header("Location:hostel.php");
    } else{
        echo "unable to delete room";
    }
}

//display prog on edit
if(isset($mydata['hid'])){
    $hid = $mydata['hid'];
    $sql = "SELECT * FROM room WHERE id=$hid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row);
}

//editand submit programme
if(isset($_POST["submith"])){
    // $courseid = $_POST['cid'];
    $rno = $_POST["hrno"];
    $block = $_POST["hblock"];
    $cap = $_POST["hcap"];

//Insert Or update
if(!empty($rno) && !empty($block) && !empty($cap)){
    // echo "Succeessfully posted $ucode,$uname,$ustage,$udept,$ucourse";
    $sql = "INSERT INTO room(room_no,hostel_block,capacity) VALUES ('$rno','$block',$cap)";
    if($conn->query($sql) == TRUE){
        echo "Room Saved Succesfully";
        header("Location:hostel.php");
    }
    else{
        echo "Unable to save room";
    }
}
}

if(isset($_POST["edsubmith"])){
  $edhid = $_POST['edhid'];
  $edrno = $_POST["edhrno"];
  $edblock = $_POST["edhblock"];
  $edcap = $_POST["edhcap"];

//Insert Or update
if(!empty($edrno) && !empty($edblock) && !empty($edcap)){
    echo "Succeessfully posted block: $edblock, number:$edrno,capacity:$edcap";
$sql = "UPDATE room set room_no='$edrno',hostel_block='$edblock',capacity=$edcap where id=$edhid;";
    if($conn->query($sql) == TRUE){
        echo "room updated Succesfully";
        header("Location:hostel.php");
    }
    else{
        echo "Unable to update Room";
    }
}
}
    
?>