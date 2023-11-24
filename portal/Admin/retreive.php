<?php
// include_once '../action/dbconnect.php';
//  $sql = "SELECT * from school";
//  $result =$conn->query($sql);
//  if($result->num_rows > 0){
//      $data = array();
//      while($row = $result->fetch_assoc()){
//          $data[] = $row;
//      }
//  }
//  echo json_encode($data);


include_once '../action/dbconnect.php';
$conn;
function retreiveschool($conn){
$sqlretreive = "SELECT * from school";
            $result =$conn->query($sqlretreive);
            if($result->num_rows > 0){
                $count = 0;
                while($row = $result->fetch_assoc()){
                    $sch_id = $row['sch_id'];
                    $sch_name = $row['sch_name'];
                    $sch_code = $row['sch_code'];
                    $count += 1;
                    $output = "<tr><td>$count</td>
                    <td>$sch_name</td>
                    <td>$sch_code</td>
                    <td><button class='btn btn-info btn-sm editsch' id= 'editsch-$sch_id' name='editsch' data-toggle='modal' data-target='#modal-edit' title='Edit' href='#'><i class='fas fa-pencil-alt'> Edit</i>
                        </button>&nbsp;&nbsp;<a class='btn btn-danger btn-sm delsch' id='delsch-$sch_id' name='delsch'  title='Delete' href='#'><i class='fas fa-trash'> Delete</i>
                        </a></td> </tr>";
                    echo "$output";
                }
            }
}
?>