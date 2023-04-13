<?php

  require_once("include/connection.php");

   session_start();
    if (isset( $_SESSION["email_address"])) {
        header("Location:  /File%20Management%20System/private_user/home.php");
        die();
    }

    $msg = "";

    if (isset($_GET['verification'])) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM login_user WHERE code='{$_GET['verification']}'")) > 0) {
            $query = mysqli_query($conn, "UPDATE login_user SET code='' WHERE code='{$_GET['verification']}'");
            
            if ($query) {
                $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
            }
        } else {
            header("Location: index.php");
        }
    }


    if (isset($_POST['logIn'])) {

         date_default_timezone_set("asia/manila");
         $date = date("M-d-Y h:i A",strtotime("+0 HOURS"));

         $email = $conn->real_escape_string($_POST["email_address"]);  
         $password = $conn->real_escape_string($_POST["user_password"]);

        $sql = "SELECT * FROM  login_user WHERE email_address = '$email'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
              $id = htmlentities($row['id']);
              $user = htmlentities($row['email_address']);

        if ($result->num_rows == 0)  { 
                $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";

        } else if(password_verify($password, $row["user_password"]))   {

            if (empty($row['code'])) {
                $_SESSION["user_no"] = htmlentities($row["id"]);
                $_SESSION["email_address"] = $email;

              if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
                      $ip = $_SERVER["HTTP_CLIENT_IP"];
                  } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
                      $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                  } else {
                      $ip = $_SERVER["REMOTE_ADDR"];
                  }

                  $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);

                    $remarks="Has LoggedIn the system at";  
                      
                    $conn->query("INSERT INTO history_log(id,email_address,action,ip,host,login_time) VALUES('$id','$user','$remarks','$ip','$host','$date')")or die(mysqli_error($conn));


                header("Location: /File%20Management%20System/private_user/home.php");
                  
                  }else{
                        $msg = "<div class='alert alert-info'>Your account isn't yet verified! Please check the verification link sent to your registered email address.</div>";        
               } 
            } else{
                $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
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
  <div class="card-body">

 <form action="userlogin/login.php" method="POST">
            <p class="h4 text-center py-4">Sign In</p>

            <!-- Material input text -->

            <div class="md-form">
                <i class="fa fa-envelope prefix grey-text"></i>
                <input type="email" id="materialFormCardEmailEx" name="email_address" class="form-control" required="">
                <label for="materialFormCardEmailEx" class="font-weight-light">Your email</label>
            </div>
            <!-- Material input password -->
            <div class="md-form">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" id="materialFormCardPasswordEx" name="user_password" class="form-control" required="">
                <label for="materialFormCardPasswordEx" class="font-weight-light">Your password</label>
            </div>

                <div class="form-group">

                          <p><a href="forgot-password.php"  style="display: block; text-align: right;">Forgot Password?</a>
                        </p>
                    </div>

            <div class="text-center py-4 mt-3">
                <button class="btn btn-lg btn-block" style="background-color: #286090;" name = "logIn" id="login" type="submit"><font color="white">Sign in</font></button>
            </div>
      
               <a href="register.php">Register here</a>
        </form>
    </div>
</div>
</div>
<footer class="text-center py-4 mt-3" style="background-color: #c6ecef;margin-left: 30%;margin-right: 30%;border-radius:4px;    margin-bottom: 5px;">
<p>All right Reserved &copy; <?php echo date('Y');?> Modified By: Fehintoluwa Akinsinde</p>
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
