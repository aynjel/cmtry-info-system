<?php
require_once("../include/initialize.php");
if (!isset($_SESSION['USERID'])) {
    redirect(web_root . "../index.php?q=login");
}

if ($_SESSION['U_ROLE'] === "Administrator") {
    redirect(web_root . "admin/person/index.php");
}

if ($_SESSION['U_ROLE'] === "User") {
    redirect(web_root . "user/");
}

$content = 'home.php';
if (isset($_GET['q'])) {
    $view = $_GET['q'];
} else {
    $view = 'map';
    echo "<script> window.location.href = 'index.php?q=" . $view . "';</script>";
}
switch ($view) {

    case 'person-info':
        $title = "Burial";
        $content = 'person-info.php';
        break;

    case 'map-info':
        $title = "Map";
        $content = 'map-info.php';
        break;

    case 'report':
        $title = "Report Issues";
        $content = 'report.php';
        break;

    case 'person-view':
        $title = "View Burial";
        $content = 'person-view.php';
        break;

    case 'person-edit':
        $title = "Edit Burial";
        $content = 'person-edit.php';
        break;

    case 'person-delete':
        $title = "Delete Burial";
        $content = 'person-delete.php';
        break;

    default:
        $title = "Manage Burial";
        $content = 'home.php';
}
require_once("theme/templates.php");
