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
    <form class="auth-form" method="POST">
      <?php check_message(); ?>
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