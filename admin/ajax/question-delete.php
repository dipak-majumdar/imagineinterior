<?php
require_once "../../_config/dbconnect.php";
require_once "../../classes/questions.class.php";


$Question   = new Question();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['quesId'])) {
        $deleted = $Question->delQues($_POST['quesId']);

        if ($deleted == true) {
            echo 'true';
        }else{
            echo 'false';
        }
    }
}

?>