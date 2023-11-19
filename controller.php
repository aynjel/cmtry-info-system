<?php
require_once ("include/initialize.php");

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'register' :
		doInsert();
		break; 

	case 'login' :
		doLogin();
		break;
}
   
function doInsert(){
	if(isset($_POST['save'])){


	if ($_POST['U_NAME'] == "" OR $_POST['U_USERNAME'] == "" OR $_POST['U_PASS'] == "") {
		$messageStats = false;
		message("All field is required!","error");
		redirect('index.php?view=add');
	}else{	
		$user = New User();
		// $user->USERID 		= $_POST['user_id'];
		$user->U_NAME 		= $_POST['U_NAME'];
		$user->U_USERNAME		= $_POST['U_USERNAME'];
		$user->U_PASS			=sha1($_POST['U_PASS']);
		$user->U_ROLE			=  $_POST['U_ROLE'];
		$user->create();

					// $autonum = New Autonumber(); 
					// $autonum->auto_update(2);

		message("New [". $_POST['U_NAME'] ."] created successfully!", "success");
		redirect("index.php?q=register");
		
	}
	}

}

function doLogin(){
	if(isset($_POST['submit'])){
		$email = trim($_POST['U_USERNAME']);
		$upass  = trim($_POST['U_PASS']);
		$urole = trim($_POST['U_ROLE']);
		$h_upass = sha1($upass);

		$user = new User();
		$res = $user::userAuthentication($email,$h_upass);
		
		if ($res==true) {  
			message("You logon as ".$_SESSION['U_ROLE'].".","success");
			if ($_SESSION['U_ROLE']=='Staff'){
				redirect(web_root."staff/");
			}else{
				redirect(web_root."user/");
			}
		}else{
			message("Account does not exist! Please contact Administrator.", "error");
			redirect(web_root."index.php?q=login");
		}
	}
}