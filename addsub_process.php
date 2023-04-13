<?php

     require_once("_Assets/include/connection.php");

    $folder_name = $conn->real_escape_string($_POST["folder_name"]);
    $dirname = $conn->real_escape_string($_POST["sub_name"]);
     $filename = "/{$dirname}/"; 
     $destination = "../uploads".substr($folder_name,10).''.$filename;    
   
    if (file_exists($destination)) { 

        echo "The directory {$destination} exists"; 

    } else { 

    mkdir("{$destination}", 0777); 

      $ID = $conn->real_escape_string($_POST['LOGIN_ID']);
      $folder = "folder";
      $status = "Admin";
      $size = 0;
      $download = 0;
      $name = $conn->real_escape_string($_POST["full_name"]);
      date_default_timezone_set("asia/manila");
      $time = date("M-d-Y h:i A",strtotime("+0 HOURS"));

      $emp = "Admin";
       $sql = $conn->query("INSERT INTO `upload_adminfiles`(`NAME`, `SIZE`, `DOWNLOAD`, `TIMERS`, `ADMIN_STATUS`, `EMAIL`, `VARIABLE`,  `type`,  `LOGIN_ID`)  VALUES ('$folder_name', '$size', '$download', '$time',  '$status', '$name', '$destination',  '$folder', '$ID')")  or die (mysqli_error($conn));


      if ($sql == TRUE) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong><i class="fa fa-check"></i>&nbsp;&nbsp;Insert Successfully!</strong>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
               <script> setTimeout(function() {  window.history.go(-2); }, 1000); </script>
            </div>';
      } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <strong><i class="fa fa-times"></i>;&nbsp;Insert Failed!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
      }
   } 


?>