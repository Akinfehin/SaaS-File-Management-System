<!DOCTYPE html>
<html lang="en">
<?php

session_start();
if(!isset($_SESSION["email_address"])){
    header("location:../login.html");

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
  <link href="_Assets/css/style.css" rel="stylesheet">

    <script src="_Assets/js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="media/css/dataTable.css" />
    <script src="_Assets/media/js/jquery.dataTables.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $.fn.dataTable.ext.errMode = 'none';
      $('#dtable').dataTable({
                "aLengthMenu": [[5, 10, 15, 25, 50, 100 , -1], [5, 10, 15, 25, 50, 100, "All"]],
                "iDisplayLength": 10
            });
  })
    </script>
    <style type="text/css">
      select[multiple], select[size] {
    height: auto;
    width: 20px;
}
.pull-right {
    float: right;
    margin: 2px !important;
}
input[type=file] {
    border: 2px dotted #999;
    border-radius: 10px;
    margin-left: 9px;
    width: 231px!important;
}  
  .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}

.md-form .form-control:disabled, .md-form .form-control[readonly] {
    border-bottom: 1px solid #bdbdbd;
    background-color: transparent;
    width: 215px !important;
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

<body style="padding:0px; margin:0px; background-color:#fff;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">
  <?php 

     require_once("_Assets/include/connection.php");

     $id = $conn->real_escape_string($_SESSION['email_address']);


      $r = $conn->query("SELECT * FROM login_user where id = '$id'") or die (mysqli_error($con));

      $row = $r->fetch_array();


   $id=htmlentities($row['email_address']);
   $user_status=htmlentities($row['user_status']);
   $name=htmlentities($row['name']);
    $folid=htmlentities($row['fol_id']);

?>

<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color fixed-top">
    <a class="navbar-brand" href="home.php"><img src="_Assets/js/img/Files_Download.png" width="33px" height="33px"> <font color="#F0B56F">F</font>ile <font color="#F0B56F">M</font>anagement <font color="#F0B56F">S</font>ystem</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
           <font color="black">Welcome!,</font> <?php echo ucwords(htmlentities($id)); ?> <i class="fas fa-user-circle"></i> Login </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
           <a class="dropdown-item" href="history_log.php"> <i class="fas fa-chalkboard-teacher"></i> User Logged</a>
           <a class="dropdown-item" href="change_password.php"> <i class="fas fa-cog"></i> Change Password</a>
          <a class="dropdown-item" href="Logout.php"><i class="fas fa-sign-in-alt"></i> LogOut</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<br>
<br>
  <main class="pt-5 mx-lg-5">
    <div class="container">
      <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
          <h4 class="mb-2 mb-sm-0 pt-1">
           <div class="d-flex justify-content-center pull-right">     
            <a href="home.php">
            <button class="btn btn-info"><i class="far fa-file-image"></i>  View File</button></a>
            <a href="add_file.php"><button type="button" class="btn btn-success"><i class="fas fa-file-medical"></i>  Add File</button></a>
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
<div id="loader"></div>
<div class="container">
  <div class="row">
    <div class="col-md-4">
   <div class="card">
    <div class="card-body">
        <form action="create_folder.php" method="post" enctype="multipart/form-data" >
           <label for="subject" class="">Folder form</label><hr style="background-color:green"></hr>
          <input type="text" name="name" class="form-control" placeholder="create folder name" required="" >
          <input type="hidden" value="<?php echo $name;?>" name="full_name"/>
          <button  type="submit" class="btn btn-info btn-rounded btn-block my-4 waves-effect z-depth-0"  name="save" type="submit">Create</button>
        </form>
  </div>
</div>
  </div>
    <div class="col-md-8">
    <table id="dtable" class = "table table-striped">
     <thead>
    <th>Foldername</th>
    <th>Action</th>
</thead>
<tbody> 
    <tr>
        <?php 
   
        require_once("_Assets/include/connection.php");

       $query = $conn->query("SELECT DISTINCT fol_id,file_path FROM  folder_content1 group by file_path DESC") or die (mysqli_error($conn));
      if($query->num_rows === 0) echo'<div class="alert alert-danger" role="alert">No Record Found!!!</div>';
      while($file=$query->fetch_array()){
         $id =  htmlentities($file['fol_id']);
         $name =  htmlentities($file['file_path']);
    
      ?>
          <td width="70%"><img src="_Assets/img/floder-close-128.png" width="30px" height="25px" title="View File"> &nbsp;<?php echo  $name; ?></td>
           <td><a href='delete_foldername.php?fol_id=<?php echo $id; ?>'><img src="_Assets/img/-_Trash-Can-Delete-Remove--128.png" width="30px" height="30px" title="Delete Foldername"></a></td>
    </tr>
<?php } ?>
</tbody>
</table>
  </div>
</div>
<Br>
</div></div>
 </center>
  <div class="footer-copyright py-3">
       <p>All right Reserved &copy; <?php echo date('Y');?> Created By:Fehintoluwa Akinisinde</p>
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
             var IDLE_TIMEOUT = 1200; //will expire after twenty minutes
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