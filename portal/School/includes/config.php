<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";


$dbh = new mysqli($servername, $username,$password, $dbname);
if($dbh->connect_error) {
	die("Connection Failed : " . $dbh->connect_error);
} else {
	// echo "Successfully Connected";
}
?>