

<?php 
 require_once("../include/connection.php");

   session_start();
    if (isset( $_SESSION["email_address"])) {
        header("Location:  ../private_user/home.php");
        die();
    }


    if (isset($_POST['logIn'])) {

         $email = $conn->real_escape_string($_POST["email_address"]);  
         $password = $conn->real_escape_string($_POST["user_password"]);

        $sql = "SELECT * FROM login_user WHERE email_address='{$email}' AND user_password='{$password}'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            if (empty($row['code'])) {
                    $_SESSION["user_no"] = htmlentities($row["id"]);
		            $_SESSION["email_address"] = $email;
                header("Location: ../private_user/home.php");
            } else {
                $msg = "<div class='alert alert-info'>Your account isn't yet verified! Please check the verification link sent to your registered email address.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
        }
    }





?>
