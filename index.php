<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>File Management System</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link href="_Assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="_Assets/css/mdb.min.css" rel="stylesheet">
  <link href="_Assets/css/style.css" rel="stylesheet">
  <style type="text/css">
      body{
       background-image: url("_Assets/img/honey_im_subtle.png");
      }
        #loader{
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('_Assets/img/loading.gif') 50% 50% no-repeat rgb(249,249,249);
        opacity: 1;
    }

    </style>
</head>

<body style="padding:0px; margin:0px; background-color:#fff;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">

<nav class="mb-1 navbar navbar-expand-lg navbar-dark orange lighten-1">
<a class="navbar-brand" href="index.html"><img src="_Assets/js/img/Files_Download.png" width="33px" height="33px"> <font color="##74e874">F</font>ile <font color="#74e874">M</font>anagement <font color="#74e874">S</font>ystem</a>
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
<div class="container col-md-5">
<div class="card">
 <div id="loader"></div>
    <div class="card-body">
      <form action="admin_login.php" method="POST">
         <p class="h4 text-center py-4">ADMIN SECURITY</p>
            <div class="md-form">
                <i class="fa fa-envelope prefix grey-text"></i>
                <input type="email" id="materialFormCardEmailEx" value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>" name="admin_user" class="form-control" >
                <label for="materialFormCardEmailEx" class="font-weight-light">Your email</label>
            </div>
            <div class="md-form">
              <i class="fa fa-lock prefix grey-text"></i>
              <input type="password" id="myInput" value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>" name="admin_password" class="form-control">
                <label for="materialFormCardPasswordEx" class="font-weight-light">Your password</label>
            </div>
            <input type="checkbox" onclick="myFunction()"> Show Password
            <div class="text-center py-4 mt-3">
            <button class="btn btn-warning btn-lg btn-block" name = "adminlog" id="login" type="submit">Sign In</button>
            </div>
        </form>
    </div>
</div>
</div>
       <footer class="text-center py-4 mt-3" style="background-color: rgb(206, 209, 154);margin-left: 30%;margin-right: 30%;border-radius:4px;    margin-bottom: 5px;">
        <p>All right Reserved &copy; <?php echo date('Y');?> Created By: Fehintoluwa Akinsinde</p>
        </footer>

  <script type="text/javascript" src="_Assets/js/jquery-3.4.0.min.js"></script>
  <script type="text/javascript" src="_Assets/js/popper.min.js"></script>
  <script type="text/javascript" src="_Assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="_Assets/js/mdb.min.js"></script>
</body>
<script type="text/javascript">
  function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
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
  <script src = "_Assets/jss/jquery.js"></script>
  <script src = "_Assets/jss/bootstrap.js"></script>
  <script src = "_Assets/jss/login.js"></script>
  <script src="jquery.min.js"></script>
<script type="text/javascript">
  $(window).on('load', function(){
    setTimeout(function(){
          $('#loader').fadeOut('slow');  
      }, 1000);
  });
</script>
</html>
</body>
