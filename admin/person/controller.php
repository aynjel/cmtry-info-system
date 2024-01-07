<?php
require_once("../../include/initialize.php");


$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add':
		doInsert();
		break;

	case 'edit':
		doEdit();
		break;

	case 'delete':
		doDelete();
		break;
}


function doInsert()
{
	// var_dump($_POST);
	global $mydb;
	if (isset($_POST['save'])) {
		if ($_POST['FNAME'] == "" || $_POST['GRAVENO'] == "" || $_POST['LOCATION'] == "" || $_POST['BURIALDATE'] == "") {
			echo "<script>alert('Please fill up all required fields!')</script>";
			redirect('index.php');
		} else {
			// $autonumber = new Autonumber();
			// $res = $autonumber->set_autonumber('PEOPLEID');

			$p = new Person();
			// $p->PEOPLEID 	= $_POST['PEOPLEID'];
			$p->FNAME 		= $_POST['FNAME'];
			$p->CATEGORIES  = $_POST['CATEGORIES'];
			$p->BORNDATE	= $_POST['BORNDATE'];
			$p->DIEDDATE	= $_POST['DIEDDATE'];
			$p->BURIALDATE 	= $_POST['BURIALDATE'];
			$p->LOCATION 	= $_POST['LOCATION'];
			$p->GRAVENO		= $_POST['GRAVENO'];
			$p->create();

			$autonumber = new Autonumber();
			$autonumber->auto_update('PEOPLEID');

			message("New Record created successfully!", "success");
			redirect("index.php");

			// $sql = "SELECT * FROM `tblpeople` WHERE `GRAVENO`= '" . $_POST['GRAVENO'] . "'";
			// $mydb->setQuery($sql);
			// $cur = $mydb->loadResultList();

			// var_dump($cur);
			// if ($cur->GRAVENO == $_POST['GRAVENO']) {
			// 	# code...
			// 	// message("Grave number is already exists!","error");
			// 	echo "<script>alert('Grave number is already exists!')</script>";
			// 	redirect('index.php');
			// } else {

			// 	$autonumber = new Autonumber();
			// 	$res = $autonumber->set_autonumber('PEOPLEID');

			// 	$p = new Person();
			// 	$p->PEOPLEID 	= $res->AUTO;
			// 	$p->FNAME 		= $_POST['FNAME'];
			// 	$p->CATEGORIES  = $_POST['CATEGORIES'];
			// 	$p->BORNDATE	= $_POST['BORNDATE'];
			// 	$p->DIEDDATE	= $_POST['DIEDDATE'];
			// 	$p->BURIALDATE 	= $_POST['BURIALDATE'];
			// 	$p->LOCATION 	= $_POST['LOCATION'];
			// 	$p->GRAVENO		= $_POST['GRAVENO'];
			// 	$p->create();

			// 	$autonumber = new Autonumber();
			// 	$autonumber->auto_update('PEOPLEID');

			// 	message("New Record created successfully!", "success");
			// 	redirect("index.php");
			// }
		}
	}
}


function doEdit()
{


	if (isset($_POST['save'])) {

		// $borndate =  ($_POST['BORNDATE'] !='' || $_POST['BORNDATE'] !='0m/dd/yyyy') ? @date_format(date_create($_POST['BORNDATE']), "Y-m-d"): '0000-00-00';
		// $dieddate =  ($_POST['DIEDDATE'] !='' || $_POST['DIEDDATE'] !='0m/dd/yyyy') ? @date_format(date_create($_POST['DIEDDATE']), "Y-m-d") : '0000-00-00';
		$borndate =  $_POST['BORNDATE'];
		$dieddate =  $_POST['DIEDDATE'];

		$p = new Person();
		$p->FNAME 		= $_POST['FNAME'];
		// $p->LNAME 		= $_POST['LNAME'];
		// $p->MNAME 		= $_POST['MNAME'];
		$p->CATEGORIES  = $_POST['CATEGORIES'];
		$p->BORNDATE	= $borndate;
		$p->DIEDDATE	= $dieddate;
		$p->GRAVENO		= $_POST['GRAVENO'];
		$p->LOCATION 	= $_POST['LOCATION'];
		$p->BURIALDATE 	= $_POST['BURIALDATE'];
		$p->update($_POST['PEOPLEID']);


		message("Record has been updated!", "success");
		redirect("index.php");
	}
}

function doDelete()
{




	if (isset($_POST['selector']) == '') {
		message("Select the records first before you delete!", "error");
		redirect('index.php');
	} else {

		$id = $_POST['selector'];
		$key = count($id);

		for ($i = 0; $i < $key; $i++) {

			$p = new Person();
			$p->delete($id[$i]);


			message("Record has been Deleted!", "info");
			redirect('index.php');
		}
	}
}
