<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ayc_db";


$conn = new mysqli($servername, $username,$password, $dbname);
if($conn->connect_error) {
	echo "<script> alert('Mysql Connection successful')</script>";
	die("Connection Failed : " . $conn->connect_error);
}