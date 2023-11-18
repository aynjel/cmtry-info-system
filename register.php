<form class="form-horizontal span6" action="controller.php?action=register" method="POST">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Registration Form
      </h1>
    </div>
    <div class="col-lg-12">
      <p>
        <?php
        check_message();
        
        ?>
      </p>
    </div>
  </div>          
  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "U_NAME">Name:</label>

      <div class="col-md-8">
        <input name="deptid" type="hidden" value="">
          <input class="form-control input-sm" id="U_NAME" name="U_NAME" placeholder=
            "Account Name" type="text" value="">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "U_USERNAME">Username:</label>

      <div class="col-md-8">
        <input name="deptid" type="hidden" value="">
          <input class="form-control input-sm" id="U_USERNAME" name="U_USERNAME" placeholder=
            "Email Address" type="text" value="">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "U_PASS">Password:</label>

      <div class="col-md-8">
        <input name="deptid" type="hidden" value="">
          <input class="form-control input-sm" id="U_PASS" name="U_PASS" placeholder=
            "Account Password" type="Password" value="" required>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "U_ROLE">Role:</label>

      <div class="col-md-8">
        <input class="form-control input-sm" id="U_ROLE" name="U_ROLE" type="text" value="User" readonly>
        <!-- <select class="form-control input-sm" name="U_ROLE" id="U_ROLE">
          <option value="Administrator"  >Administrator</option>
          <option value="Staff"  >Staff</option> 
          <option value="User">User</option>
        </select>  -->
      </div>
    </div>
  </div>


        
  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "idno"></label>

      <div class="col-md-8">
        <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
          <!-- <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span></span>&nbsp;<strong>List of Users</strong></a> -->
        </div>
    </div>
  </div>
</form>
       