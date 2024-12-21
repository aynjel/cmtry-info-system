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
        <a href="index.php?q=username-recover" class="auth-form-link">Forgot password?</a>
      </div>
      <div class="auth-form-group">
        <button class="btn-submit" name="btnLogin" type="submit">Login</button>
      </div>
    </form>
  </div>
</div>

<?php

if (isset($_POST['btnLogin'])) {
  $email = trim($_POST['U_USERNAME']);
  $upass  = trim($_POST['U_PASS']);
  $h_upass = sha1($upass);

  if ($email == '' or $upass == '') {
    message("Invalid Username and Password!", "error");
  } else {
    $user = new User();
    $res = $user::userAuthentication($email, $h_upass);
    if ($res == true) {
      // message("You logged in as " . $_SESSION['U_ROLE'] . ".", "success");
      if ($_SESSION['U_ROLE'] == 'Staff') {
        redirect(web_root . 'staff/');
      } elseif ($_SESSION['U_ROLE'] == 'User') {
        redirect(web_root . 'user/');
      } else {
        redirect(web_root . "admin/person/index.php");
      }
    } else {
      message("Account does not exist!", "error");
      redirect(web_root . "index.php?q=login");
    }
  }
}
