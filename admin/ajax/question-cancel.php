<?php
require_once "../../_config/dbconnect.php";
require_once "../../classes/questions.class.php";

$Question   = new Question();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['quesId'])) {
     $quesId   = $_POST['quesId'];
     $status   = $_POST['status'];

    $cancled  = $Question->cancelQues($quesId, $status);
    if ($cancled) {
      echo 1;
    }else {
      echo 0;
    }
    
  }

}


?>