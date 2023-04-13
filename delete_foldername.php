<?php

 require_once("_Assets/include/connection.php");

$id = $conn->real_escape_string($_GET['fol_id']);

    $conn->query("DELETE FROM folder_content1 WHERE fol_id='$id'")or die(mysqli_error());

    echo "<script type='text/javascript'>alert('Deleted Foldername!');document.location='add_folder.php'</script>";
?>
