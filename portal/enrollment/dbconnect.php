<?php 

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "isms_db";


$conn = new mysqli($servername, $username,$password, $dbname);
if($conn->connect_error) {
	die("Connection Failed : " . $conn->connect_error);
} else {
	// echo "Successfully Connected";
}