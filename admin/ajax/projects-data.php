<?php
require_once "../../_config/dbconnect.php";
require_once "../../classes/services.class.php";


$Services   = new Services();

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $allChilds = $Services->activeChildServicesByParent($_POST['parentType']);
    echo '<option selected disabled>Select Child Service</option>';
    foreach ($allChilds as $eachChild) {
        echo '<option value="'.$eachChild['id'].'">'.$eachChild['name'].'</option>';
    }
}


?>