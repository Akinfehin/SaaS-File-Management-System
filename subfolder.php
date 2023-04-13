<!DOCTYPE html>
<html lang="en">
<?php

session_start();

if (!isset($_SESSION['admin_user'])) {
 header('Location: index.php');
}

?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>File Management System</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link href="_Assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="_Assets/css/mdb.min.css" rel="stylesheet">
  <link href="_Assets/css/style.min.css" rel="stylesheet">

    <script src="_Assets/js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="_Assets/medias/css/dataTable.css" />
    <script src="_Assets/medias/js/jquery.dataTables.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
     $.fn.dataTable.ext.errMode = 'none';
      $('#dtable').dataTable({
                "aLengthMenu": [[5, 10, 15, 25, 50, 100 , -1], [5, 10, 15, 25, 50, 100, "All"]],
                "iDisplayLength": 10
            });
       })
    </script>

  <style>
          select[multiple], select[size] {
    height: auto;
    width: 20px;
}
.pull-right {
    float: right;
    margin: 2px !important;
}

    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
#loader{
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('_Assets/img/lg.flip-book-loader.gif') 50% 50% no-repeat rgb(249,249,249);
        opacity: 1;
    }
  </style>

    <script src="jquery.min.js"></script>
<script type="text/javascript">
  $(window).on('load', function(){
    setTimeout(function(){
          $('#loader').fadeOut('slow');  
      });
  });
</script>
</head>

<body class="grey lighten-3">
  <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">
        <a class="navbar-brand waves-effect" href="#">
          <strong class="blue-text"></strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          </ul>
            <?php 

              require_once("_Assets/include/connection.php");


               $id = $conn->real_escape_string($_SESSION['admin_user']);

               $r = $conn->query("SELECT * FROM admin_login where id = '$id'") or die (mysqli_error($con));

              $row = $r->fetch_array();


               $id=htmlentities($row['admin_user']);
            ?>

          <ul class="navbar-nav nav-flex-icons">
          <li style="margin-top: 10px;">Welcome!,</font> <?php echo ucwords(htmlentities($id)); ?></li>
            <li class="nav-item">
              <a href="#" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link border border-light rounded waves-effect">
               <i class="far fa-user-circle"></i>SignOut
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="sidebar-fixed position-fixed">
      <a class="logo-wrapper waves-effect">   
      <img src="img/images.jpg" width="150px" height="200px;" class="img-fluid" alt="">
      </a>
     <div class="list-group list-group-flush">
      <a href="dashboard.php" class="list-group-item active waves-effect">
       <i class="fas fa-chart-pie mr-3"></i>Dashboard
        </a>
         <a href="#" class="list-group-item list-group-item-action waves-effect"  data-toggle="modal" data-target="#modalRegisterForm">
          <i class="fas fa-user mr-3"></i>Add Admin</a>
            <a href="view_admin.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users"></i> View Admin</a>
<!--         <a href="#" class="list-group-item list-group-item-action waves-effect" data-toggle="modal" data-target="#modalRegisterForm2">
          <i class="fas fa-user mr-3"></i>Add User</a> -->
           <a href="view_user.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users"></i>  View User</a>
        <a href="add_folder.php" class="list-group-item list-group-item-action waves-effect">
         <i class="fas fa-folder-plus"></i> Add Admin Folder</a>
        <a href="add_document.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-file-medical"></i> Add Admin File</a>
        <a href="view_userfile.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-folder-open"></i> View User File</a>
            <a href="admin_log.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-chalkboard-teacher"></i> Admin logged</a>
              <a href="user_log.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-chalkboard-teacher"></i> User logged</a>
      </div>
    </div>
   <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <form action="create_Admin.php" method="POST">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-plus"></i> Add Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="name" class="form-control validate" required="">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" name="admin_user" class="form-control validate" required="">
          <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" name="admin_password" class="form-control validate" required="">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
        </div>
         <div class="md-form mb-5">
          <input type="hidden" id="orangeForm-name" name="admin_status" value = "Admin" class="form-control validate">
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info" name="reg">Sign up</button>
      </div>
    </div>
  </div>
</div>
</form>
 <div class="modal fade" id="modalRegisterForm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <form action="create_user.php" method="POST" enctype="multipart/form-data">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-plus"></i> Add User Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-0">
     <div class="md-form mb-0">
       <img src="_Assets/img/Men-Profile-Image.png" width="200" height="150">
      </div>
       <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="file" id="orangeForm-name" name="user_profile" class="form-control validate" >
        </div>
        <div class="md-form mb-5">

      </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="name" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
        </div>
         <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="user_position" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Position</label>
        </div>
          <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="user_contact" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">contact</label>
        </div>
         <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="user_address" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Address</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" name="email_address" class="form-control validate" required="">
          <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" name="user_password" class="form-control validate" required="">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
        </div>
         <div class="md-form mb-4">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" name="user_status" value = "Employee" class="form-control validate" readonly="">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">User Status</label>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info" name="reguser">Sign up</button>
      </div>
    </div>
  </div>
</div>
</form>
 </header>
 <div id="loader"></div>
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
      <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="dashboard.php">Home Page</a>
            <span>/</span>
            <span>Dashboard</span>
          </h4>
        </div>
      </div>
      <div class="">
    <a href="add_document.php"><button type="button" class="btn btn-info"><i class="fas fa-chevron-circle-left"></i>  Document</button></a>
 
                    <a href="view_archive.php"><img src="_Assets/img/user-trash-full-128.png" class="imgs" width="40px" height="40px" title="View Archive" style="float: right;"></a>
    </div>
   <hr>
 <div class="col-md-12">
 <table id="dtable" class = "table table-striped">
  <thead>
    <th>Filename</th>
    <th>FileSize</th>
    <th>Uploader</th>  
    <th>Status</th> 
     <th>Date/Time Upload</th>
      <th>Admin Comment</th>
    <th>Action</th>
</thead>
<tbody>
 
    <tr>
 
      <?php 
          error_reporting(0);
           require_once("_Assets/include/connection.php");
            $getID = $conn->real_escape_string($_GET['SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c']);
            $query = $conn->query("SELECT *, a.type as sub, a.type as types FROM `upload_files` a LEFT JOIN `folder_content1` b ON a.LOGIN_ID = b.fol_id WHERE a.ADMIN_STATUS = 'Employee' AND a.LOGIN_ID = '$getID'") or die (mysqli_error($conn));
          if($query->num_rows === 0) echo'<div class="alert alert-danger" role="alert">No Record Found!!!</div>';
            while($file=$query->fetch_array()){
               $id =  htmlentities($file['ID']);
               $folder =  htmlentities($file['FOLDERSELECT']);
               $name =  utf8_encode($file['NAME']);
               $size =  htmlentities($file['SIZE']);
               $uploads =  htmlentities($file['EMAIL']);
               $status =  htmlentities($file['ADMIN_STATUS']);
               $time =  htmlentities($file['TIMERS']);
               $foldername =  htmlentities($file['VARIABLE']);
               $targetFile = preg_replace('#[^\pL\pN./-]+#', '', $foldername);
               $comment =  htmlentities(ucfirst($file['COMMENT']));
               $type =  htmlentities($file['types']);
               $loginid =  htmlentities($file['LOGIN_ID']);
              


               if($type == "file"){
                  $var =  '<img src="_Assets/img/docs-64.png" width="30px" height="25px" title="View File">'.$name.'';
               }else{
                  $var =  '<a href="subfolder1.php?SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c='.$id.'"><img src="_Assets/img/floder-close-128.png" width="30px" height="25px" title="View File">&nbsp;'.substr($foldername,12).'</a> &nbsp';
               }
              if($type == "file"){
                      $var1 =  '<a href="download.php?f='.$foldername.''.$name.'"><img src="_Assets/img/search-download-128.png" width="30px" height="30px" title="View And Download File" download></a> | <a href="remove.php?ID='.$id.'"><img src="_Assets/img/-_Trash-Can-Delete-Remove--128.png" width="30px" height="30px" title="Remove File"></a>  | <a href="#" data-toggle="modal" data-target="#modal_comment'.$id.'"><img src="_Assets/img/Comment-add.webp" width="30px" height="30px" title="Add Comment"></a>';
                   }else{
                      $var1 =  '';
             }
          
            ?>

            <td width="30%">
             <?php echo $var; ?>
            </td>
            <td><?php echo floor($size / 1000) . ' KB'; ?></td>
            <td><?php echo $uploads; ?></td>
            <td><?php echo $status; ?></td>
            <td><?php echo $time; ?></td>
            <td><?php echo $comment; ?></td>
            <td width="15%">
            <?php echo $var1; ?>
            </td>
        </tr>
           <?php include 'modal_comment.php';?>

     <?php } ?>
</tbody>
   </table>
    </div>  
    <hr></div>
    <div class="footer-copyright py-3">
     <p>All right Reserved &copy; <?php echo date('Y');?> Created By:JunilToledo</p>
    </div>
  </footer>

  <script type="text/javascript" src="_Assets/js/jquery-3.4.0.min.js"></script>
  <script type="text/javascript" src="_Assets/js/popper.min.js"></script>
  <script type="text/javascript" src="_Assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="_Assets/js/mdb.min.js"></script>

<link rel="stylesheet" type="text/css" href="_Assets/css/jquery.dataTables.min.css"/>   
<script type="text/javascript" src="_Assets/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="_Assets/css/dataTables.responsive.css">
<script type="text/javascript" language="javascript" src="_Assets/js/dataTables.responsive.js"></script>
        <?php

           require_once("_Assets/include/connection.php");
             
             if(isset($_POST['edit_comment'])){
              
                  
               $COMMENT = $conn->real_escape_string($_POST['COMMENT']);
               $ID = $conn->real_escape_string($_POST['ID']);

            
                $conn->query("UPDATE upload_files SET COMMENT = '$COMMENT' WHERE ID = '$ID'") or die(mysqli_error($conn));

                echo '
                  <script type = "text/javascript">
                    alert("Save comments Successfully!!!!");
                    
                  </script>
                ';
                   header('Refresh: 1;url='.$_SERVER['REQUEST_URI']);
              
            } 


 ?>


</body>
</html>
<script type="text/javascript">
             var IDLE_TIMEOUT = 1200; 
                var _idleSecondsCounter = 0;
                document.onclick = function() {
                _idleSecondsCounter = 0;
                };
                document.onmousemove = function() {
                _idleSecondsCounter = 0;
                };
                document.onkeypress = function() {
                _idleSecondsCounter = 0;
                };
                window.setInterval(CheckIdleTime, 1000);

                function CheckIdleTime() {
                _idleSecondsCounter++;
                var oPanel = document.getElementById("SecondsUntilExpire");
                if (oPanel)
                oPanel.innerHTML = (IDLE_TIMEOUT - _idleSecondsCounter) + "";
                if (_idleSecondsCounter >= IDLE_TIMEOUT) {
                document.location.href = "logout.php";
                }
              }
        </script>