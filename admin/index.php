<?php
require_once("../include/initialize.php");
if (!isset($_SESSION['USERID'])) {
	redirect(web_root . "admin/login.php");
}

if ($_SESSION['U_ROLE'] === "User") {
	redirect(web_root . "user/");
}

if ($_SESSION['U_ROLE'] === "Staff") {
	redirect(web_root . "staff/");
}

$content = 'home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
	case '1':
		$title = "Administrator Panel";
		$content = 'home.php';
		break;
	default:
		$title = "Administrator Panel";
		$content = 'home.php';
}

require_once("theme/templates.php");
