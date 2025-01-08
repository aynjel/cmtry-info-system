<div class="auth-form-wrapper">
  <div class="auth-form-header">
    <h1>
      Enter Username
    </h1>
    <p>
      Please enter your username to recover your password.
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
        <button class="btn-submit" name="btnSubmit" type="submit">Submit</button>
      </div>
      <div class="auth-form-group">
        <a href="index.php?q=login" class="auth-form-link">Back to Login</a>
      </div>
    </form>
  </div>
</div>

<?php

if (isset($_POST['btnSubmit'])) {
  $uname = trim($_POST['U_USERNAME']);

  if ($uname == '') {
    message("Invalid Username!", "error");
  } else {
    $user = new User();
    $res = $user::retreiveUser($uname);
    if ($res == true) {
      redirect(web_root . 'index.php?q=forgot-password');
    } else {
      message("Username does not exist!", "error");
      redirect(web_root . "index.php?q=username-recover");
    }
  }
}
