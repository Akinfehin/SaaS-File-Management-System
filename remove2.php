<?php
	error_reporting(0);
	 require_once("_Assets/include/connection.php");
	
	if(ISSET($_REQUEST['ID'])){
		$ID = $conn->real_escape_string($_REQUEST['ID']);
		$query = $conn->query("SELECT * FROM `upload_files2` WHERE `ID` = '$ID'") or die(mysqli_error());
		$fetch = $query->fetch_array();

        $id =  htmlentities($fetch['ID']);
         $name =  utf8_encode($fetch['NAME']);
         $size =  htmlentities($fetch['SIZE']);
         $download =  htmlentities($fetch['DOWNLOAD']);
         $time =  htmlentities($fetch['TIMERS']);
         $status =  htmlentities($fetch['ADMIN_STATUS']);
         $uploads =  htmlentities($fetch['EMAIL']);
         $folder =  htmlentities($fetch['FOLDERSELECT']);
         $targetFile = preg_replace('#[^\pL\pN./-]+#', '', $folder);
         $foldername =  htmlentities($fetch['VARIABLE']);   
         $type =  htmlentities($fetch['TYPE']); 
         $login =  htmlentities($fetch['LOGIN_ID']);
         $getID =  htmlentities($fetch['GET_ID']);      

          $destination = "../uploads/backup_files2/".htmlentities($fetch["NAME"]);
          rename($folder, $destination);


	    $conn->query("INSERT INTO `trash2` VALUES('$id', '$name', '$size', '$download', '$time', '$status', '$uploads', '$targetFile', '$foldername','$type', '$login','$getID')") or die(mysqli_error());
		$conn->query("DELETE FROM `upload_files2` WHERE `ID` = '$ID'") or die(mysqli_error());
		echo "<script type='text/javascript'>alert('File Has been Deleted!');document.location='view_archive2.php'</script>";
		}

	  
?>



