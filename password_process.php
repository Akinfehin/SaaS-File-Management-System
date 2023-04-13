
<?php

 require_once("_Assets/include/connection.php");

if (isset($_POST['change']))
	{

     $id = $conn->real_escape_string($_SESSION['email_address']);
	 $password = $conn->real_escape_string($_POST['oldpassword']); 
     $newpassword = $conn->real_escape_string($_POST['newpassword']);
	 $confirmnewpassword = $conn->real_escape_string($_POST['confirmpassword']);   

		//get user details
		$sql = "SELECT * FROM login_user WHERE id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		//check if old password is correct
		if(password_verify($password, $row['user_password'])){
			//check if new password match retype
			if($newpassword == $confirmnewpassword){
				//hash our password
				$password = password_hash($newpassword, PASSWORD_DEFAULT);
				//update the new password
				$sql = "UPDATE login_user SET user_password = '$password' WHERE id = '$id'";
				if($conn->query($sql)){
					echo "<div class=\"alert alert-success\" role=\"alert\"><h6>Successfully changed password.</h6></div>";
				}

			 }
			else{
				echo "<div class=\"alert alert-danger\" role=\"alert\"><h6>Passwords do not match</h6></div>";
			}
		}
		else{
			echo "<div class=\"alert alert-warning\" role=\"alert\">Old password is wrong</div>";
		}
	}

 
?>

