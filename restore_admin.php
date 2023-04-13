
<?php
   error_reporting(0);
   require_once("_Assets/include/connection.php");
   
   if(ISSET($_REQUEST['ID'])){
      $ID = $conn->real_escape_string($_REQUEST['ID']);
      $query=$conn->query("SELECT * FROM `trash_admin` WHERE `ID` = '$ID'") or die(mysqli_error());
      $fetch=$query->fetch_array();

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

         rename("../uploads/backup_filesadmin/".htmlentities($fetch["NAME"]), $folder);

     
         $conn->query("INSERT INTO `upload_adminfiles`(ID, NAME, SIZE, DOWNLOAD, TIMERS, ADMIN_STATUS, EMAIL, FOLDERSELECT, VARIABLE, `TYPE`, LOGIN_ID) VALUES('$id', '$name', '$size', '$download', '$time', '$status', '$uploads', '$targetFile', '$foldername','$type','$login')") or die(mysqli_error($conn));

      $conn->query("DELETE FROM `trash_admin` WHERE `ID` = '$ID'") or die(mysqli_error($conn));
      echo "<script type='text/javascript'>alert('File Restore Again!');document.location='add_document.php'</script>";
   }
   
?>