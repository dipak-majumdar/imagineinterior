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

$FAVICON    = $Site['favicon'];
$LOGO       = $Site['site_logo'];


?>