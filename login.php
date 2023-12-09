<div class="auth-form-wrapper">
  <div class="auth-form-header">
    <h1>
      Login
    </h1>
    <p>
      Please enter your username and password to login.
    </p>
  </div>
  <div class="auth-form-body">
    <?php check_message(); ?>
    <form class="auth-form" method="POST">
      <div class="auth-form-group">
        <label class="control-label" for="U_USERNAME">Username</label>
        <input class="form-control" id="U_USERNAME" name="U_USERNAME" type="text" required />
      </div>
      <div class="auth-form-group">
        <label class="control-label" for="U_PASS">Password</label>
        <input class="form-control" id="U_PASS" name="U_PASS" type="password" required />
      </div>
      <div class="auth-form-group">
        <label class="control-label" for="U_ROLE">Role</label>
        <select class="form-control" id="U_ROLE" name="U_ROLE" required>
          <option selected value="User">User</option>
          <option value="Staff">Staff</option>
          <!-- <option value="Administrator">Administrator</option> -->
        </select>
      </div>
      <div class="auth-form-group">
        <button class="btn-submit" name="btnLogin" type="submit">Login</button>
        <a class="btn-admin" href="<?php echo web_root; ?>admin/">
          Login as Administrator
        </a>
      </div>
    </form>
  </div>
</div>
       
<?php 

if(isset($_POST['btnLogin'])){
  $email = trim($_POST['U_USERNAME']);
  $upass  = trim($_POST['U_PASS']);
  $urole = trim($_POST['U_ROLE']);
  $h_upass = sha1($upass);
  
  if ($email == '' OR $upass == '' OR $urole == '') {
    message("Invalid Username and Password!", "error");
  } else {  
    $user = new User();
    $res = $user::userAuthenticationWithRole($email, $h_upass, $urole);
    if ($res == true) {
      // message("You logged in as ".$_SESSION['U_ROLE'].".","success");
      if ($_SESSION['U_ROLE']=='Staff'){
        redirect(web_root.'staff/');
      }else{
        redirect(web_root."user/");
      }
    }else{
      message("Account does not exist!", "error");
      redirect(web_root."index.php?q=login");
    }
  }
 } 