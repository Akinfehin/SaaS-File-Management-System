
<?php

$msg = "";

require_once("include/connection.php");

if (isset($_GET['reset'])) {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM login_user WHERE code='{$_GET['reset']}'")) > 0) {
        if (isset($_POST['submit'])) {

            $password_1 = $conn->real_escape_string($_POST['user_password']);  
            $confirm_password = $conn->real_escape_string($_POST['confirm-password']);  

            if ($password_1 === $confirm_password) {
              $password = password_hash($password_1, PASSWORD_DEFAULT);
                $query = mysqli_query($conn, "UPDATE login_user SET user_password='{$password}', code='' WHERE code='{$_GET['reset']}'");

                if ($query) {
                    header("Location: login.php");
                }
            } else {
                $msg = "<div class='alert alert-danger'>Passwords didn't matched! Please try again.</div>";
            }
        }
    } else {
        $msg = "<div class='alert alert-danger'>Reset Link do not match.</div>";
    }
} else {
    header("Location: forgot-password.php");
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
    <a class="navbar-brand" href="index.html"><img src="js/img/Files_Download.png" width="33px" height="33px"> <font color="#F0B56F">F</font>ile <font color="#F0B56F">M</font>anagement <font color="#F0B56F">S</font>ystem</a>
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
  <div class="card-body">
    <?php echo $msg; ?>
     <form action="" method="POST">
            <p class="h4 text-center py-4">Change Password</p>
            <div class="md-form">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password"  name="user_password" class="form-control" required="" autocomplete="off">
                <label for="materialFormCardPasswordEx" class="font-weight-light">Password</label>
            </div>
            <div class="md-form">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" name="confirm-password" class="form-control" required="" autocomplete="off">
                <label for="materialFormCardPasswordEx" class="font-weight-light">Confirm password</label>
            </div>
            <div class="text-center py-4 mt-3">
                <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">Change Password</button> 
            </div>
             <div class="social-icons">
                <p>Back to <a href="login.php" style="color: green"><b>Login</b></a></p>
               </div>
        </form>
    </div>
</div>
</div>
<footer class="text-center py-4 mt-3" style="background-color: #c6ecef;margin-left: 30%;margin-right: 30%;border-radius:4px;    margin-bottom: 5px;">
<p>All right Reserved &copy; <?php echo date('Y');?> Created By:Mariana de San Juan</p>
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
