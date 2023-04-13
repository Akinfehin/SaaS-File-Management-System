

 <?php

    if (isset($_POST['reguser'])) {

      $image = addslashes(file_get_contents($_FILES['user_profile']['tmp_name']));
      $image_name = addslashes($_FILES['user_profile']['name']);
      $image_size = getimagesize($_FILES['user_profile']['tmp_name']);
      move_uploaded_file($_FILES["user_profile"]["tmp_name"], "image_upload/" .date("Ymd").time().'_'. $_FILES["user_profile"]["name"]);
      $item_image = "image_upload/" .date("Ymd").time().'_'. $_FILES["user_profile"]["name"];

         $user_name = $conn->real_escape_string($_POST['name']);
         $user_position = $conn->real_escape_string($_POST['user_position']);
         $user_contact = $conn->real_escape_string($_POST['user_contact']);
         $user_address = $conn->real_escape_string($_POST['user_address']);
         $email_address = $conn->real_escape_string($_POST['email_address']);
         $password = $conn->real_escape_string($_POST['user_password']);  
         $confirm_password = $conn->real_escape_string($_POST['confirm-password']);  
         $user_status = $conn->real_escape_string($_POST['user_status']);
        
                $sql = "INSERT INTO table_admin (`user_profile`,`name`,`user_position`,`user_contact`,`user_address`,`email_address`,`user_password`,`user_status`,`code`) VALUES ('$item_image', '$user_name', '$user_position', '$user_contact', '$user_address', '$email_address', '$user_password', '$user_status','code')";
                $result = mysqli_query($conn, $sql);

           
               
    }
?>
