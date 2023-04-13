<?php
// connect to the database
require_once("_Assets/include/connection.php");

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
  $user = $conn->real_escape_string($_POST['email']);
   $loginid = $conn->real_escape_string($_POST['login_id']);

     $filename = utf8_encode(htmlspecialchars($_FILES['myfile']['name'],ENT_QUOTES));
  //  $folderselect = $_POST['folderselect'];


  if ($_POST['variable'] == '')
    {
      $variable = './'; // default folder
    }
    else
    {
      $variable = $conn->real_escape_string($_POST['variable']);
    }
    $destination = "../uploads/$variable".$filename; 

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];


    if (!in_array($extension, ['docx', 'doc', 'pptx', 'ppt', 'xlsx', 'xls', 'pdf', 'odt'])) {
                echo '<script type = "text/javascript">
                            alert("You file extension must be:  .docx .doc .pptx .ppt .xlsx .xls .pdf .odt");
                            window.location = "add_file.php";
                    </script>
                     ';
    } elseif ($_FILES['myfile']['size'] > 2000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else{


  $query=$conn->query("SELECT * FROM `upload_adminfiles` WHERE `name` = '$filename'")or die(mysqli_error($conn));
           $counter=$query->num_rows;
            
            if ($counter == 1) 
              { 
                   echo '
                <script type = "text/javascript">
                    alert("Files already taken");
                    window.location = "add_document.php";
                </script>


               ';
              } 
      
        date_default_timezone_set("asia/manila");
         $time = date("M-d-Y h:i A",strtotime("+0 HOURS"));

        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
           $file = "file";
            $sql = "INSERT INTO upload_adminfiles (name, size, download, timers, admin_status, email, folderselect, variable, type, login_id) VALUES ('$filename', $size, 0, '$time', 'Admin', '$user','$destination','$variable',  '$file', '$loginid')";
            if ($conn->query($sql)) {
                   echo '
                     <script type = "text/javascript">
                    alert("File Upload");
                    window.location = "add_document.php";
                </script>';

            }
        } else {
             echo "Failed Upload files!";
        }
    
  }
}
