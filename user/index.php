<?php 
require_once("../include/initialize.php");
	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."../index.php?q=login");
     } 

$content='home.php';
if (isset($_GET['q'])){
	$view = $_GET['q'];
}else{
	$view = 'person';
	echo "<script> window.location.href = 'index.php?q=".$view."';</script>";
}
switch ($view) {
 
    case 'home' :
        $title="Home";	
        $content='home.php';		
        break;

    case 'person' :
       $title="Deceased Person";	
       $content='person.php';		
       break;

    case 'report' :
        $title="Report Issues";	
        $content='report.php';		
        break;
 
   default :
       $title="Home";	
       $content ='home.php';		
}

require_once("theme/templates.php");