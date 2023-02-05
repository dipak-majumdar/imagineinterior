<?php
require_once '../../_config/dbconnect.php';
require_once '../../inc/constants.inc.php';

require_once '../../classes/projects.class.php';
require_once '../../classes/services.class.php';



$Projects           = new Projects();
$Services           = new Services();
$added_by           = 'admin';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['addProjectData'])) {
        // print_r($_POST);
        $projectName         = $_POST['projectName'];
        $service_id          = $_POST['serviceTypeId'];
        $child_service_id    = $_POST['childTypeId'];
        $projectdsc          = $_POST['projectDsc'];

        // Update project numbers in services 
        // $projectNos = $Services->showServiceSingleData('projects_nos', $service_id);
        $Services->incrServiceproject($service_id);
        

        // Update project numbers in child services 
        // $projectNos2 = $Services->showChildServiceSingleData('projects_nos', $child_service_id);
        // $Services->updateChildServiceSingleVal('projects_nos', $projectNos2['projects_nos']+1, $child_service_id);
        $Services->incrChildServiceProject($child_service_id);


        $projectId = $Projects->addProject($service_id, $child_service_id, $projectName, $projectdsc, 1, $added_by);
        if ($projectId) {
            echo $projectId;
        }
    }

}

?>