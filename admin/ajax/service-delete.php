<?php
require_once "../../_config/dbconnect.php";
require_once "../../classes/services.class.php";


$Services   = new Services();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['actionId'])) {
        $deleted = $Services->serviceDelete($_POST['actionId']);

        if ($deleted == true) {
            echo 'true';
        }else{
            echo 'false';
        }
    }
}

?>