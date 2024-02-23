<?php

require_once ABSPATH . "_config/adminSession.php";
require_once ABSPATH . '_config/dbconnect.php';

require_once ABSPATH . 'classes/site.class.php';
require_once ABSPATH . 'classes/user.class.php';
require_once ABSPATH . 'classes/admin.class.php';
require_once ABSPATH . 'classes/form.class.php';


$SiteInfo      = new SiteInfo();
$User          = new User();
$Admin         = new Admin();
$Form          = new Form();

$Site           = $SiteInfo->showSiteInfo();
$users          = $User->showUsers();
$logedAdmin     = $Admin->showAdminByEmail($_SESSION['email']);

// $logedAdmin[0]['id'];
// $my = $logedAdmin[0]['fname'];
// $my = $logedAdmin[0]['lname'];
$username = $logedAdmin[0]['username'];
// $my = $logedAdmin[0]['email'];
// $my = $logedAdmin[0]['mob_no'];
// $myPass = $logedAdmin[0]['password'];
// $my = $logedAdmin[0]['modified_on'];
// $my = $logedAdmin[0]['added_on'];


$FAVICON    = $Site['favicon'];
$LOGO       = $Site['site_logo'];


?>