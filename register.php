

 <?php
 error_reporting(0);
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

       session_start();
    if (isset( $_SESSION["email_address"])) {
        header("Location:  /File%20Management%20System/private_user/home.php");
        die();
    }

    //Load Composer's autoloader
    require 'vendor/autoload.php';

  require_once("include/connection.php");;
    $msg = "";

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
         $password_1 = $conn->real_escape_string($_POST['user_password']);  
         $confirm_password = $conn->real_escape_string($_POST['confirm_password']);  
         $user_status = $conn->real_escape_string($_POST['user_status']);


  $q_checkadmin = $conn->query("SELECT * FROM `login_user` WHERE `email_address` = '$email_address'") or die(mysqli_error($conn));
    $v_checkadmin = $q_checkadmin->num_rows;
    if($v_checkadmin == 1){
         $msg = "<div class='alert alert-danger'> An account with Email <b>{$email}</b> already exists.</div>";
      // echo '
      //   <script type = "text/javascript">
      //     alert("Email Address already taken");
      //     window.location = "register.php";
      //   </script>
      // ';
    }else{
            if ($password_1 === $confirm_password) {
              $password = $password_1;
                $sql = "INSERT INTO login_user (`user_profile`,`name`,`user_position`,`user_contact`,`user_address`,`email_address`,`user_password`,`user_status`) VALUES ('$item_image', '$user_name', '$user_position', '$user_contact', '$user_address', '$email_address', '$password', '$user_status')";
                $result = mysqli_query($conn, $sql);
                 
                echo '
                    <script type = "text/javascript">
                        alert("Registration Successfully!);
                         window.location = "register.php";
                        </script>
                      ';
                
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>File Management System</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mdb.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

 <style type="text/css">
      #loader{
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('img/loading.gif') 50% 50% no-repeat rgb(249,249,249);
        opacity: 1;
    }
 </style>
</head>

<body style="padding:0px; margin:0px; background-color:#fff;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">

<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
    <a class="navbar-brand" href="index.php"><img src="js/img/Files_Download.png" width="33px" height="33px"> <font color="#F0B56F">F</font>ile <font color="#F0B56F">M</font>anagement <font color="#F0B56F">S</font>ystem</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav ml-auto">
    </ul>
  </div>
</nav>
<br><Br>
<div id="loader"></div>
<div class="container col-md-5">
<div class="card">
 
  <form action="" method="POST" enctype="multipart/form-data">

      <div class="modal-body mx-0">
<!--      <div class="md-form mb-0">
       <img src="_Assets/img/Men-Profile-Image.png" width="200" height="150">
      </div> -->
       <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="file" id="orangeForm-name" name="user_profile" value="<?php if (isset($_POST['reguser'])) { echo $image_name; } ?>" class="form-control validate" accept="image/*" autocomplete="off">
        </div>
        <div class="md-form mb-5">

      </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="name" value="<?php if (isset($_POST['reguser'])) { echo $user_name; } ?>" class="form-control validate" autocomplete="off">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Full name</label>
        </div>
         <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="user_position"  value="<?php if (isset($_POST['reguser'])) { echo $user_position; } ?>" class="form-control validate" autocomplete="off" >
          <label data-error="wrong" data-success="right" for="orangeForm-name">Position</label>
        </div>
          <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="user_contact"  value="<?php if (isset($_POST['reguser'])) { echo $user_contact; } ?>" maxlength="11" class="form-control validate" autocomplete="off" >
          <label data-error="wrong" data-success="right" for="orangeForm-name">contact</label>
        </div>
         <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="user_address"  value="<?php if (isset($_POST['reguser'])) { echo $user_address; } ?>" class="form-control validate" autocomplete="off" >
          <label data-error="wrong" data-success="right" for="orangeForm-name">Address</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" name="email_address"  value="<?php if (isset($_POST['reguser'])) { echo $email_address; } ?>" class="form-control validate" required="" autocomplete="off" >
          <label data-error="wrong" data-success="right" for="orangeForm-email">Email</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" name="user_password"  class="form-control validate" required="" autocomplete="off" >
          <label data-error="wrong" data-success="right" for="orangeForm-pass"> Password</label>
        </div>
                <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" name="confirm_password"  class="form-control validate" required="" autocomplete="off" >
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Confirm password</label>
        </div>
         <div class="md-form mb-4">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" name="user_status" value = "Employee" class="form-control validate" readonly="">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">User Status</label>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info btn-block" name="reguser">Sign up</button>
      </div>
            <div class="modal-footer d-flex justify-content-right">
         <p><a href="login.php" style="margin-bottom: 15px; display: block; text-align: right;">Login Here.</a> </p>
       </div>
    </div>
  </div>
</div>
</form>
    </div>
</div>
</div>
<footer class="text-center py-4 mt-3" style="background-color: #c6ecef;margin-left: 30%;margin-right: 30%;border-radius:4px;    margin-bottom: 5px;">
<p>All right Reserved &copy; <?php echo date('Y');?> Created By: Fehintoluwa Akinisinde</p>
</footer>
  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>
<script type="text/javascript">
   $("#login").on("click", function () {
   
          uservalidate();
          passvalidate();
   
         if (uservalidate() === true
          && passvalidate() === true
   
          ) {
   
     };
   
   
   });
   
   
   function uservalidate() {
   if ($('#materialFormCardEmailEx').val() == '') { 
       $('#materialFormCardEmailEx').css('border-color', '#dc3545');
    return false;
     } else {
      $('#materialFormCardEmailEx').css('border-color', '#28a745'); 
       return true;
   }
   
   };
   
   function passvalidate() {
   if ($('#materialFormCardPasswordEx').val() == '') { 
    $('#materialFormCardPasswordEx').css('border-color', '#dc3545');
    return false;
     } else {
      $('#materialFormCardPasswordEx').css('border-color', '#28a745'); 
       return true;
   }
   
   };
   
   
</script>
  <script src = "jss/jquery.js"></script>
  <script src = "jss/bootstrap.js"></script>
  <script src = "jss/login.js"></script>
  <script src="jquery.min.js"></script>
<script type="text/javascript">
  $(window).on('load', function(){
    setTimeout(function(){
          $('#loader').fadeOut('slow');  
      });
  });
</script>
</html>
