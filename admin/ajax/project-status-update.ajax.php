<?php
require_once '../../_config/dbconnect.php';
require_once '../../inc/constants.inc.php';

require_once '../../classes/projects.class.php';


$Projects           = new Projects();
$added_by           = 'admin';

// print_r($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['projectId'])) {

      $project = $Projects->showProjectById($_POST['projectId']);

      if (count($project) > 0) {
        if ($project['status'] == 1) {
          $updated = $Projects->updateSingleData(trim($_POST['projectId']), 'status', 0);
          if ($updated) {
            echo 'deactivated';
          }
        }
        
        if ($project['status'] == 0) {
          $updated = $Projects->updateSingleData(trim($_POST['projectId']), 'status', 1);
          if ($updated) {
            echo 'activated';
          }
        }
      }else {
        echo "No Project Found";
      }

    }

}

?>