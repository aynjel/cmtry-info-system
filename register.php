<div class="auth-form-wrapper">
  <div class="auth-form-header">
    <h1>
      Register
    </h1>
    <p>
      Please enter your name, username, and password to register.
    </p>
  </div>
  <div class="auth-form-body">
    <?php check_message(); ?>
    <form class="auth-form" method="POST">
      <div class="auth-form-group">
        <label class="control-label" for="U_NAME">Name</label>
        <input class="form-control" id="U_NAME" name="U_NAME" type="text" required />
      </div>
      <div class="auth-form-group">
        <label class="control-label" for="U_USERNAME">Username</label>
        <input class="form-control" id="U_USERNAME" name="U_USERNAME" type="text" required />
      </div>
      <div class="auth-form-group">
        <label class="control-label" for="U_PASS">Password</label>
        <input class="form-control" id="U_PASS" name="U_PASS" type="password" required />
      </div>
      <div class="auth-form-group">
        <label class="control-label" for="U_CPASS">Confirm Password</label>
        <input class="form-control" id="U_CPASS" name="U_CPASS" type="password" required />
      </div>
      <div class="auth-form-group">
        <label class="control-label" for="U_ROLE">Role</label>
        <input class="form-control" id="U_ROLE" name="U_ROLE" type="text" readonly value="User" />
      </div>
      <div class="auth-form-group">
        <button class="btn-submit" name="btnRegister" type="submit">Register</button>
      </div>
    </form>
  </div>
</div>

   
<?php 
if(isset($_POST['btnRegister'])){
  $name = trim($_POST['U_NAME']);
  $email = trim($_POST['U_USERNAME']);
  $upass  = trim($_POST['U_PASS']);
  $cpass  = trim($_POST['U_CPASS']);
  $urole = trim($_POST['U_ROLE']);
  $h_upass = sha1($upass);
  
  if ($name == '' OR $email == '' OR $upass == '' OR $cpass == '' OR $urole == '') {
    message("Invalid Username and Password!", "error");
  } else {  
    $user = New User();

    $user->U_NAME 		= $_POST['U_NAME'];
    $user->U_USERNAME		= $_POST['U_USERNAME'];
    $user->U_PASS			=sha1($_POST['U_PASS']);
    $user->U_ROLE			=  $_POST['U_ROLE'];
    $user->create();

    message("Registered successfully!", "success");
    redirect("index.php?q=register");
  }
 } 