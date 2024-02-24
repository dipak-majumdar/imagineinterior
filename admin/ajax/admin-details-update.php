<?php
session_start();
require_once dirname(dirname(__DIR__))."/inc/constants.inc.php";
require_once ADMPATH . 'partials/common-admin-files.inc.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $response = $Admin->updateAdminDetails($adminId, $_POST['about'], $_POST['job'], $_POST['phone'], $_POST['email'], $_POST['twitter'], $_POST['facebook'], $_POST['instagram'], $_POST['linkedin']);
    header('Location: '.ADM_URL.'/users-profile.php?response='.$response);
    exit;
}




?>