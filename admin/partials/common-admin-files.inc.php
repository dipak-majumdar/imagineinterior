<?php

require_once ABSPATH . "_config/adminSession.php";
require_once ABSPATH . '_config/dbconnect.php';

require_once ABSPATH . 'classes/user.class.php';
require_once ABSPATH . 'classes/admin.class.php';
require_once ABSPATH . 'classes/form.class.php';


$User          = new User();
$Admin         = new Admin();
$Form          = new Form();


$users          = $User->showUsers();
$logedAdmin     = $Admin->showAdminByEmail($_SESSION['email']);

?>