<?php
require_once("include/initialize.php");
if (isset($_SESSION['U_ROLE'])) {
	if ($_SESSION['U_ROLE'] === 'User') {
		redirect(web_root . "user");
	}

	if ($_SESSION['U_ROLE'] === 'Staff') {
		redirect(web_root . "staff");
	}

	if ($_SESSION['U_ROLE'] === 'Administrator') {
		redirect(web_root . "admin/person/index.php");
	}
}

$content = 'home.php';
// q=home by default
if (isset($_GET['q'])) {
	$view = $_GET['q'];
} else {
	$view = 'home';
	echo "<script> window.location.href = 'index.php?q=" . $view . "';</script>";
}


switch ($view) {

	case 'contact':
		$title = "Contact Us";
		$content = 'contact.php';
		break;

	case 'about':
		$title = "About Us";
		$content = 'about.php';
		break;

	case 'person':
		$title = "Deceased Person";
		$content = 'person.php';
		break;

	case 'login':
		$title = "Login";
		$content = 'login.php';
		break;

	case 'register':
		$title = "Register";
		$content = 'register.php';
		break;

	default:
		$title = "Home";
		$content = 'home.php';
}




require_once("theme/templates.php");
