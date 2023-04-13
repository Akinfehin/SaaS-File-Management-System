

<?php

require_once("_Assets/include/connection.php");

session_start();

if(isset($_POST["adminlog"])){


  date_default_timezone_set("asia/manila");
  $date = date("M-d-Y h:i A",strtotime("+0 HOURS"));

 $username = $conn->real_escape_string($_POST["admin_user"]);  
 $password = $conn->real_escape_string($_POST["admin_password"]);

 
 if (empty($username) || empty($password)) {
   		  echo "<script type='text/javascript'>alert('Invalid Email Address And Password,Please try again!');
		 document.location='index.php'</script>";
  }else{
  $query=$conn->query("SELECT * FROM admin_login WHERE admin_user = '$username'")or die(mysqli_error($conn));
		$row=$query->fetch_array();
           $id=htmlentities($row['id']);
            $admin= htmlentities($row['admin_user']);
           $_SESSION["admin_user"] = htmlentities($row["admin_user"]);
    
           $counter=$query->num_rows;
            
		  	if ($counter == 0) 
			  {	
				   echo "<script type='text/javascript'>alert('Invalid Email Address,Please try again!');
				  document.location='index.php'</script>";
			  } 

			  else
			  {
			  	if(password_verify($password, $row["admin_password"]))  
                     {
				        $_SESSION['admin_user']=$id;

				        if (isset($_POST['remember'])){
								//set up cookie
								setcookie("user", $row['admin_user'], time() + (86400 * 30)); 
								setcookie("pass", $row['admin_password'], time() + (86400 * 30)); 
							}	

				         if (!empty($_SERVER["HTTP_CLIENT_IP"]))
							{
							 $ip = $_SERVER["HTTP_CLIENT_IP"];
							}
							elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
							{
							 $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
							}
							else
							{
							 $ip = $_SERVER["REMOTE_ADDR"];
							}

							$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);


			
                       $remarks="Has LoggedIn the system at";  
                       $conn->query("INSERT INTO history_log1(id,admin_user,action,ip,host,login_time) VALUES('$id','$admin','$remarks','$ip','$host','$date')")or die(mysqli_error($conn));
    
                 
			  	echo "<script type='text/javascript'>document.location='dashboard.php'</script>";  
			  }else{
		    	echo "<script type='text/javascript'>alert('Invalid  Password,Please try again!');
				  document.location='index.php'</script>";
		  }
	   }
	 }
   }
?>