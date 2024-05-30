<?php
if (!isset($_SESSION['USERID'])) {
  redirect(web_root . "admin/index.php");
}
?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h2>
          <i class="fa fa-plus"></i> Add New User
          <a href="index.php" class="btn btn-secondary btn-sm">
            <i class="fa fa-list"></i> List of User
          </a>
        </h2>
      </div>
      <div class=" card-body">
        <form action="controller.php?action=add" method="POST">
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for="U_NAME">Name:</label>

              <div class="col-md-8">
                <input name="deptid" type="hidden" value="">
                <input class="form-control input-sm" id="U_NAME" name="U_NAME" placeholder="Account Name" type="text" value="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for="U_USERNAME">Username:</label>

              <div class="col-md-8">
                <input name="deptid" type="hidden" value="">
                <input class="form-control input-sm" id="U_USERNAME" name="U_USERNAME" placeholder="Email Address" type="text" value="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for="U_PASS">Password:</label>

              <div class="col-md-8">
                <input name="deptid" type="hidden" value="">
                <input class="form-control input-sm" id="U_PASS" name="U_PASS" placeholder="Account Password" type="Password" value="" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for="U_ROLE">Role:</label>

              <div class="col-md-8">
                <select class="form-control input-sm" name="U_ROLE" id="U_ROLE">
                  <option value="Administrator">Administrator</option>
                  <option value="Staff">Staff</option>
                  <option value="User">User</option>
                </select>
              </div>
            </div>
          </div>



          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for="idno"></label>

              <div class="col-md-8">
                <button class="btn btn-primary btn-sm" name="save" type="submit"><span class="fa fa-save fw-fa"></span> Save</button>
                <!-- <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span></span>&nbsp;<strong>List of Users</strong></a> -->
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>