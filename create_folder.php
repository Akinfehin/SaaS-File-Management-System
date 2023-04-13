<?php 
require_once("_Assets/include/connection.php");
  error_reporting(0);
  if(isset($_POST['save'])){
   $full_name = $conn->real_escape_string(ucwords($_POST["full_name"]));
    $dirname = $conn->real_escape_string($_POST["name"]);

     $filename = "/{$dirname}/"; 

      $destination = "../uploads".$filename; 
   
    if (file_exists($destination)) { 

        echo "The directory {$destination} exists"; 

    } else { 

    mkdir("{$destination}", 0777); 

          $emp = "Admin";

          date_default_timezone_set("asia/manila");
          $epm_datecreated =  date('Y-m-d H:i:s', strtotime("+0 HOURS"));
          
            $conn->query("INSERT INTO folder_content (file_path, full_name, emp_status, date_created) VALUES ('$destination','$full_name', '$emp', '$epm_datecreated')");

        		echo '
				<script type = "text/javascript">
					alert("Folder was successfully created.");
					window.location = "add_folder.php";
				</script>
			';

    } 
  }
?>