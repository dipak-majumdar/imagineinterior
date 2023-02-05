<?php
require_once "../../_config/dbconnect.php";
require_once "../../classes/user.class.php";

$User   = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['userId'])) {
     $userId   = $_POST['userId'];
     $status   = $_POST['status'];

    $cancled  = $User->cancelUser($userId, $status);
    if ($cancled) {
      echo 1;
    }else {
      echo 0;
    }
    
  }

}


?>