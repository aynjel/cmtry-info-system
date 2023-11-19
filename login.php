<form class="form-horizontal span6" method="POST">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Login Form
      </h1>
      <p> <?php check_message(); ?> </p>
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
        <!-- <input class="form-control input-sm" id="U_ROLE" name="U_ROLE" type="text" value="User" readonly> -->
        <select class="form-control input-sm" name="U_ROLE" id="U_ROLE">
          <!-- <option value="Administrator"  >Administrator</option> -->
          <option value="User">User</option>
          <option value="Staff">Staff</option> 
        </select> 
      </div>
    </div>
  </div>


        
  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "idno"></label>

      <div class="col-md-8">
        <button class="btn btn-primary btn-sm" name="btnLogin" type="submit" ><span class="fa fa-sign-in"></span> Login</button>
        </div>
    </div>
  </div>
</form>
       
<?php 

if(isset($_POST['btnLogin'])){
  $email = trim($_POST['U_USERNAME']);
  $upass  = trim($_POST['U_PASS']);
  $urole = trim($_POST['U_ROLE']);
  $h_upass = sha1($upass);
  
  if ($email == '' OR $upass == '' OR $urole == '') {
    message("Invalid Username and Password!", "error");

        
  } else {  
  //it creates a new objects of member
    $user = new User();
    //make use of the static function, and we passed to parameters
    $res = $user::userAuthenticationWithRole($email, $h_upass,$urole);
    // var_dump($res);
    if ($res==true) { 
      message("You logon as ".$_SESSION['U_ROLE'].".","success");
      if ($_SESSION['U_ROLE']=='Staff'){
        redirect(web_root.'staff/');
      }else{
        redirect(web_root."user/");
      }
    }else{
      message("Account does not exist! Please contact Administrator.", "error");
      redirect(web_root."index.php?q=login");
    }
  }
 } 