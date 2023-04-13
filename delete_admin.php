
<?php

 require_once("_Assets/include/connection.php");

    $id = $conn->real_escape_string($_GET['id']);
	$conn->query("DELETE FROM admin_login WHERE id='$id'")or die(mysqli_error());
	echo "<script type='text/javascript'>alert('Deleted Admin!');document.location='view_admin.php'</script>";
?>
