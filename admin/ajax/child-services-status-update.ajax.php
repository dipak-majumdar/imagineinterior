<?php
require_once "../../inc/constants.inc.php";
require_once ABSPATH . '_config/dbconnect.php';
require_once ABSPATH . 'classes/services.class.php';

$Services   = new Services();

$childServiceId = $_POST['childId'];
$childService = $Services->childServiceById($childServiceId);

if ($childService['status'] == 1) {
  $updated = $Services->updateChildStatus($childServiceId, 0);
  if ($updated) {
    echo 'deactivated';
  }
}
 
if ($childService['status'] == 0) {
  $updated = $Services->updateChildStatus($childServiceId, 1);
  if ($updated) {
    echo 'activated';
  }
}
?>
