<?php
require_once "../../_config/dbconnect.php";
require_once "../../classes/projects.class.php";


$Projects   = new Projects();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['actionId'])) {
        $deleted = $Projects->deleteProject($_POST['actionId']);

        if ($deleted == true) {
            echo 'true';
        }else{
            echo 'false';
        }
    }
}

?>