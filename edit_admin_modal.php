  <div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST">
    
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-edit"></i> Edit User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body mx-3">
           <div class="md-form mb-5">
            <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>"><br>
        </div>
       <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="file" id="orangeForm-name" name="user_profile" class="form-control validate" >
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
        <input type="text" id="orangeForm-name" name="name" value="<?php echo $fname;?>" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
        </div>
         <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="user_position" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Position</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" name="admin_user" value="<?php echo $admin;?>" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" name="admin_password" value="<?php echo $pass;?>" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
        </div>
          <div class="md-form mb-4">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" name="admin_status" value = "Admin" class="form-control validate" readonly="">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">User Status</label>
        </div>
      
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" name="edit2">UPDATE</button>
      </div>
    </div>
  </div>
</div>
</form>

  <!--modal--->
 <?php 

 require_once("_Assets/include/connection.php");

  
 if(isset($_POST['edit2'])){
         $user_id = $conn->real_escape_string($_POST['id']);
         $user_name = $conn->real_escape_string($_POST['name']);
         $admin_user = $conn->real_escape_string($_POST['admin_user']);
         $admin_password = password_hash($_POST['admin_password'], PASSWORD_DEFAULT, array('cost' => 12));  
       //  $user_status = mysqli_real_escape_string($conn,$_POST['status']);

     $conn->query("UPDATE `admin_login` SET `name` = '$user_name', `admin_user` = '$admin_user', `admin_password` = '$admin_password' where id='$user_id'") or die (mysqli_error($conn));
  
  echo "<script type = 'text/javascript'>alert('Success Edit User/Employee!!!');document.location='view_admin.php'</script>";

}

?>