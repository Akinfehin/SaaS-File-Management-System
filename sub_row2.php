<?php 
	require_once("_Assets/include/connection.php");
	if(isset($_POST['ID'])){
		$id = $conn->real_escape_string(strip_tags($_POST['ID']));
		$sql = "SELECT * FROM `upload_adminfiles` WHERE ID = '$id'"; 

		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}
?>