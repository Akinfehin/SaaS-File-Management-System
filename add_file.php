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

input[type=file] {
    border: 2px dotted #999;
    border-radius: 10px;
    margin-left: 9px;
    width: 231px!important;
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
               $admin_status=htmlentities($row['admin_status']);
              $name=htmlentities($row['name']);
  
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
  <!--       <a href="#" class="list-group-item list-group-item-action waves-effect" data-toggle="modal" data-target="#modalRegisterForm2">
          <i class="fas fa-user mr-3"></i>Add User</a> -->
           <a href="view_user.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users"></i>  View User</a>
           <a href="add_folder.php" class="list-group-item list-group-item-action waves-effect">
         <i class="fas fa-folder-plus"></i> Add Admin Folder</a>
        <a href="add_document.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-file-medical"></i> Add Admin File</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
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
          <input type="hidden" id="orangeForm-name" name="status" value = "Admin" class="form-control validate">
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="name" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" name="admin_user" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" name="admin_password" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
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
          <div class="d-flex justify-content-center pull-right"> 
          <a href="add_document.php">
          <button class="btn btn-info"><i class="far fa-file-image"></i>  View File</button></a>
        </div>
      </div>
      <hr>
    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add File Form</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-2">
      </div>
    </div>
  </div>
</div>
 <center>
 <div class="text-center col-md-5">
<div class="card">
<h5 class="card-header info-color white-text text-center py-4">
  <strong>Upload File Form</strong>
  </h5>
  <div class="card-body px-lg-5 pt-0">
    <div class="container">
      <div class="row">
        <form action="fileprocess.php" method="post" enctype="multipart/form-data" >
          <div class="col-md-11">
              <div class="md-form mb-0">
                <input type="hidden" name= "email" value="<?php echo ucwords(htmlentities($name)); ?>" class="form-control" readonly="">
                <input type="text"  value="<?php echo ucwords(htmlentities($admin_status)); ?>" class="form-control" readonly="">
              </div>
            </div>
           <label for="subject" class="">Upload File</label>
          <input type="file" name="myfile"> <br><br>
          <select name="variable"  class="form-control" data-text="inptxt1">
          <option value="" selected="selected"> &larr; Select a folder &rarr;</option>
          <html>
          <body>
          <form name="input" action="fileprocess.php" method="post" onchange="this.form.submit()">      
              <?php
               require_once("_Assets/include/connection.php");

                 $query = $conn->query("SELECT * FROM  folder_content order by fol_id ASC") or die (mysqli_error($conn));
                 while($file=$query->fetch_assoc()){
                 $ids =  htmlentities($file['fol_id']);
                 $name =  htmlentities($file['file_path']);
                  
                    $dirs = glob($name, GLOB_ONLYDIR);
                    foreach($dirs as $val){
                    echo '<option value="'.$val.'" data-id="'.$ids.'">'.$val."</option>\n";
                  }
                }
        
              ?>
          </select>
          <input type="hidden" name="login_id" value="" name="inptxt1" id="inptxt1" readonly/>
          <button  type="submit" class="btn btn-info btn-rounded btn-block my-4 waves-effect z-depth-0"  name="save" type="submit">UPLOAD</button>
         <footer style="font-size: 12px"><b>File Type:</b><font color="red"><i>.docx .doc .pptx .ppt .xlsx .xls .pdf .odt</i></font></footer>
        </form>
      </div>
    </div>
  </div>
</div>
<Br><br>
</div></div>
 </center>
    <hr></div>
    <div class="footer-copyright py-3">
       <p>All right Reserved &copy; <?php echo date('Y');?> Created By:Fehintoluwa Akinsinde</p>
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
</body>
</html>
  <script type="text/javascript">
    $(function(){
    $('select[name="variable"]').change(function(){
        var textId= $(this).data('text');
        var ids = $( "option:selected" , this).data('id');
        $('#'+textId).val(ids);  
    });
});
  </script>
<script type="text/javascript">
   $("#Alert").on("click", function () {

          uservalidate();
          userfile();
   
         if (uservalidate() === true && userfile() === true) {
   
         };
   
   
   });
   
   function uservalidate() {
   if ($('#categ').val() == '') { 
       $('#categ').css('border-color', '#dc3545');
    return false;
     } else {
      $('#categ').css('border-color', '#dc3545'); 
       return true;
   }
   
   };

      function userfile() {
   if ($('#file').val() == '') { 
       $('#file').css('border-color', '#dc3545');
    return false;
     } else {
      $('#file').css('border-color', '#dc3545'); 
       return true;
   }
   
  };
     
</script>
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