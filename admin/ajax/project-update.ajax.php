<?php
require_once '../../_config/dbconnect.php';
require_once '../../inc/constants.inc.php';

require_once '../../classes/projects.class.php';


$Projects           = new Projects();
$added_by           = 'admin';

// print_r($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['row-name'])) {

        if($_POST['row-name'] == 'project-name'){
            $rowName = 'name';
        }

        if($_POST['row-name'] == 'project-desc'){
            $rowName = 'dsc';
        }


        $updated = $Projects->updateSingleData(trim($_POST['projectId']), trim($rowName), trim($_POST['project-data']));
        if ($updated) {
            echo 'updated';
        }
    }

    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'updateAction') {

            $projectId = trim($_POST['projectId']);
            $updateValue = trim($_POST['updateValue']);

            if ($_POST['updateName'] == 'serviceName') {
                $updateRow = 'service_id';
            }

            if ($_POST['updateName'] == 'childServiceName') {
                $updateRow = 'child_service_id';
            }

            $updated = $Projects->updateSingleData($projectId, $updateRow, $updateValue);
            if ($updated) {
                echo 'updated';
            }
        }
    }

}

?>