<?php

 require_once("_Assets/include/connection.php");
   
   if(isset($_POST['reguser'])){
    
      $image = addslashes(file_get_contents($_FILES['user_profile']['tmp_name']));
      $image_name = addslashes($_FILES['user_profile']['name']);
      $image_size = getimagesize($_FILES['user_profile']['tmp_name']);
      move_uploaded_file($_FILES["user_profile"]["tmp_name"], "../image_upload/" .date("Ymd").time().'_'. $_FILES["user_profile"]["name"]);
      $item_image = "../image_upload/" .date("Ymd").time().'_'. $_FILES["user_profile"]["name"];

         $user_name = $conn->real_escape_string($_POST['name']);
         $user_position = $conn->real_escape_string($_POST['user_position']);
         $user_contact = $conn->real_escape_string($_POST['user_contact']);
         $user_address = $conn->real_escape_string($_POST['user_address']);
         $email_address = $conn->real_escape_string($_POST['email_address']);
         $user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT, array('cost' => 12));  
         $user_status = $conn->real_escape_string($_POST['user_status']);

	$q_checkadmin = $conn->query("SELECT * FROM `login_user` WHERE `email_address` = '$email_address'") or die(mysqli_error());
		$v_checkadmin = $q_checkadmin->num_rows;
		if($v_checkadmin == 1){
			echo '
				<script type = "text/javascript">
					alert("Email Address already taken");
					window.location = "dashboard.php";
				</script>
			';
		}else{
			$conn->query("INSERT INTO `login_user` VALUES('','$item_image', '$user_name', '$user_position', '$user_contact', '$user_address', '$email_address', '$user_password', '$user_status')") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Saved Employee Info");window.location = "dashboard.php";
				</script>
			';
		}
	}	


 ?>