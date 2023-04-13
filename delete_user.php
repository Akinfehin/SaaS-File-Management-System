
<?php

 require_once("_Assets/include/connection.php");

  $id = $conn->real_escape_string($_GET['id']);
  $conn->query("DELETE FROM  login_user WHERE id='$id'")or die(mysqli_error());
  echo "<script type='text/javascript'>alert('Deleted User!');document.location='view_user.php'</script>";
?>
