<?php 
require_once("../include/initialize.php");
	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."../index.php?q=login");
     } 

$content='home.php';
if (isset($_GET['q'])){
	$view = $_GET['q'];
}else{
	$view = 'map';
	echo "<script> window.location.href = 'index.php?q=".$view."';</script>";
}
switch ($view) {

    // case 'person' :
    //    $title="Deceased Person";	
    //    $content='person.php';		
    //    break;

    case 'person-info' :
        $title="Deceased Person";	
        $content='person-info.php';		
        break;

    case 'map-info' :
        $title="Deceased Persons Map";	
        $content='map-info.php';		
        break;

    case 'reserve-plot-form' :
        $title="Reserve Plot";	
        $content='reserve-plot-form.php';		
        break;

    case 'map' :
        $title="Deceased Persons Map";	
        $content='map.php';		
        break;

    case 'report' :
        $title="Report Issues";	
        $content='report.php';		
        break;

    case 'view-reserve' :
        $title="Reserve Plot";	
        $content='reserved-plot.php';		
        break;
 
   default :
       $title="Home";	
       $content ='map.php';		
}

require_once("theme/templates.php");