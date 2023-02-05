<?php
require_once "../../_config/dbconnect.php";
require_once "../../classes/services.class.php";

$Services   = new Services();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['catId'])) {
     $catId   = $_POST['catId'];
     $status   = $_POST['status'];

    $cancled  = $Services->cancelService($catId, $status);
    if ($cancled) {
      echo 1;
    }else {
      echo 0;
    }
    
  }

}


?>