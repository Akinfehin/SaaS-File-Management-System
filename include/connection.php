<?php 
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // enable error reporting
$conn = mysqli_connect("localhost","root","","file_managementsys");
//$conn->set_charset('utf8');

if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}
?>