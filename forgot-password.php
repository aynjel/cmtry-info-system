<?php
$user_recover_info = $_SESSION['USER_RECOVER_INFO'];
$uname = $user_recover_info->U_USERNAME;
?>

<div class="auth-form-wrapper">
  <div class="auth-form-header">
    <h1>
      Reset Password
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
        <input class="form-control" id="U_USERNAME" name="U_USERNAME" type="text" value="<?php echo $uname; ?>" readonly />
      </div>
      <div class="auth-form-group">
        <label class="control-label" for="U_PASS">Password</label>
        <input class="form-control" id="U_PASS" name="U_PASS" type="password" required />
      </div>
      <div class="auth-form-group">
        <label class="control-label" for="U_CON_PASS">Confirm Password</label>
        <input class="form-control" id="U_CON_PASS" name="U_CON_PASS" type="password" required />
      </div>
      <div class="auth-form-group">
        <button class="btn-submit" name="btnSubmit" type="submit">Reset</button>
      </div>
    </form>
  </div>
</div>

<?php

if (isset($_POST['btnSubmit'])) {
  $p_uname = trim($_POST['U_USERNAME']);
  $upass  = trim($_POST['U_PASS']);
  $ucpass  = trim($_POST['U_CON_PASS']);
  $h_upass = sha1($upass);
  $h_ucpass = sha1($ucpass);

  if ($p_uname == '' or $upass == '' or $ucpass == '') {
    redirect(web_root . "index.php?q=forgot-password");
    message("Invalid Username and Password!", "error");
  } elseif ($h_upass != $h_ucpass) {
    redirect(web_root . "index.php?q=forgot-password");

    message("Password does not match!", "error");
  } else {
    $user = new User();
    $res = $user::resetPassword($p_uname, $h_upass);
    if ($res == true) {
      redirect(web_root . "index.php?q=login");
    } else {
      redirect(web_root . "index.php?q=forgot-password");
      message("Failed to reset password!", "error");
    }
  }
}
