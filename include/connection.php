<?php 
$conn = mysqli_connect("localhost","root","","file_managementsys");

if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}
?>