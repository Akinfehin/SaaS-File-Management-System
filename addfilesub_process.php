

<?php
error_reporting(0);
require_once("_Assets/include/connection.php");
 if(ISSET($_POST)){

   $target_file = htmlspecialchars($_FILES["file_name"]["name"],ENT_QUOTES);
   $fullname = $conn->real_escape_string($_POST["full_name"]);
   $subfolder_path = $conn->real_escape_string($_POST['folder_name']);

    $image = addslashes(file_get_contents($_FILES['file_name']['tmp_name']));
    // $image_name = addslashes($_FILES['file_name']['name']);
    $image_name = htmlspecialchars($_FILES['file_name']['name'],ENT_QUOTES);
    
    $image_size = getimagesize($_FILES['file_name']['tmp_name']);
    $size = $_FILES['file_name']['size'];
    move_uploaded_file($_FILES["file_name"]["tmp_name"], "".$subfolder_path.'/'.$image_name);
    $path = "" .$subfolder_path.'/'.$image_name;
    $login_id = $conn->real_escape_string($_POST['ID']);


    date_default_timezone_set("asia/manila");
    $timestamp =  date('Y-m-d H:i:s', strtotime("+0 HOURS"));
    $Emp = "Employee";
    $download = 0;

   $q_checkadmin = $conn->query("SELECT * FROM `upload_files1` WHERE `NAME` = '$target_file'") or die(mysqli_error($conn));
    $v_checkadmin = $q_checkadmin->num_rows;
    if($v_checkadmin === 1){
       echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="warning-alerts">
                <strong>FILE ALREADY TAKEN!!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
           </button>
         </div>';
    }  else{
  $file = "sub_file1";
  $stmt = $conn->query("INSERT INTO upload_files1(NAME, SIZE, DOWNLOAD, TIMERS, ADMIN_STATUS, EMAIL, VARIABLE, TYPE, LOGIN_ID, GET_ID) VALUES('$target_file', '$size', '$download', '$timestamp', '$Emp', '$fullname', '$subfolder_path', '$file', 'sub_$login_id','$login_id')") or die(mysqli_error($conn));

  if($stmt == TRUE){

       echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alerts">
                <strong>INSERT SUCCESSFULLY!!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
           </button>
         </div>';
    }else{
      echo "Failed";
    }

   }
  }
?>



