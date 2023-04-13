<?php 
	require_once("_Assets/include/connection.php");
	if(isset($_POST['fol_id'])){
		$id = $conn->real_escape_string(strip_tags($_POST['fol_id']));
		$sql = "SELECT * FROM `folder_content` WHERE fol_id = '$id'"; 

		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}
?>