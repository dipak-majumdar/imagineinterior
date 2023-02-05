<?php
require_once "../../_config/dbconnect.php";
require_once "../../classes/user.class.php";


$User   = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['userId'])) {

        $deleted = $User->delUser($_POST['userId']);

        if ($deleted == true) {
            echo 'true';
        }else{
            echo 'false';
        }
    }
}

?>