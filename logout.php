<?php

require_once("_Assets/include/connection.php");

session_start();
  date_default_timezone_set("asia/manila");
  $time = date("M-d-Y h:i A",strtotime("+0 HOURS"));

 $email = trim($_SESSION['admin_user']);
  

$conn->query("UPDATE history_log1 SET `logout_time` = '$time'  WHERE `id` = '$email'");

$_SESSION = NULL;
$_SESSION = [];
session_unset();
session_destroy();

if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
		setcookie("user", '', time() - (3600));
		setcookie("pass", '', time() - (3600));
	}

echo "<script type='text/javascript'>alert('LogOut Successfully!');
				  document.location='index.php'</script>";

?>

