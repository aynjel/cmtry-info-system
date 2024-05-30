<?php
if (!isset($_SESSION['USERID'])) {
  redirect(web_root . "admin/index.php");
}

@$USERID = $_GET['id'];
if ($USERID == '') {
  redirect("index.php");
}
$user = new User();
$singleuser = $user->single_user($USERID);

?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h2>
          <i class="fa fa-edit"></i> Update User Account
        </h2>
      </div>
      <div class=" card-body">
        <form action="controller.php?action=edit" method="POST">

          <fieldset>
            <legend> Update User Account</legend>

            <input class="form-control input-sm" id="USERID" name="USERID" placeholder="Account Id" type="Hidden" value="<?php echo $singleuser->USERID; ?>">
            <div class="form-group">
              <div class="col-md-8">
                <label class="col-md-4 control-label" for="U_NAME">Name:</label>

                <div class="col-md-8">
                  <input name="deptid" type="hidden" value="">
                  <input class="form-control input-sm" id="U_NAME" name="U_NAME" placeholder="Account Name" type="text" value="<?php echo $singleuser->U_NAME; ?>">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-8">
                <label class="col-md-4 control-label" for="U_USERNAME">Username:</label>

                <div class="col-md-8">
                  <input name="deptid" type="hidden" value="">
                  <input class="form-control input-sm" id="U_USERNAME" name="U_USERNAME" placeholder="Email Address" type="text" value="<?php echo $singleuser->U_USERNAME; ?>" readonly>
                </div>
              </div>
            </div>

            <!-- <div class="form-group">
              <div class="col-md-8">
                <label class="col-md-4 control-label" for="U_PASS">Password:</label>

                <div class="col-md-8">
                  <input name="deptid" type="hidden" value="">
                  <input class="form-control input-sm" id="U_PASS" name="U_PASS" placeholder="Account Password" type="password" readonly>
                </div>
              </div>
            </div> -->
            <div class="form-group">
              <div class="col-md-8">
                <label class="col-md-4 control-label" for="U_ROLE">Role:</label>

                <div class="col-md-8">
                  <select class="form-control input-sm" name="U_ROLE" id="U_ROLE">
                    <option value="Administrator" <?php echo ($singleuser->U_ROLE === 'Administrator') ? 'selected' : ''; ?>>Administrator</option>
                    <option value="Staff" <?php echo ($singleuser->U_ROLE === 'Staff') ? 'selected' : ''; ?>>Staff</option>
                    <option value="User" <?php echo ($singleuser->U_ROLE === 'User') ? 'selected' : ''; ?>>User</option>
                  </select>
                </div>
              </div>
            </div>


            <div class="form-group">
              <div class="col-md-8">
                <label class="col-md-4 control-label" for="idno"></label>

                <div class="col-md-8">
                  <button class="btn btn-info btn-sm" name="save" type="submit"><span class="fa fa-save fw-fa"></span> Save</button>
                </div>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>