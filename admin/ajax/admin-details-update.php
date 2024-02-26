<?php
session_start();
require_once dirname(dirname(__DIR__))."/inc/constants.inc.php";
require_once ADMPATH . 'partials/common-admin-files.inc.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // print_r($_POST);

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];

    $profileImage   = $_POST['profile-image'];
    $about          = $_POST['about'];
    $job            = $_POST['job'];
    $twitter        = $_POST['twitter'];
    $facebook       = $_POST['facebook'];
    $instagram      = $_POST['instagram'];
    $linkedin       = $_POST['linkedin'];

    $response = $Admin->updateAdminDetails($adminId, $fname, $lname, $about, $job, $phone, $twitter, $facebook, $instagram, $linkedin);
    header('Location: '.ADM_URL.'/users-profile.php?response='.$response);
    exit;
    
}




?>