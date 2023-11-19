<?php 
require_once '../include/initialize.php';
// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
@session_start();

// 2. Unset all the session variables
unset( $_SESSION['USERID'] );
unset( $_SESSION['U_NAME'] );
unset( $_SESSION['U_USERNAME'] );
unset( $_SESSION['U_PASS'] );
unset( $_SESSION['U_ROLE'] ); 
// $_SESSION['message_logout'] = "You have successfully logout.";
// 4. Destroy the session
// session_destroy();
redirect(web_root."index.php?q=login");
?>