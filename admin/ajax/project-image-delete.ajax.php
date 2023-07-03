<?php
session_start();
require_once '../../inc/constants.inc.php';

require_once ABSPATH . "_config/adminSession.php";
require_once ABSPATH . '_config/dbconnect.php';

require_once ABSPATH . 'classes/admin.class.php';
require_once ABSPATH . 'classes/form.class.php';

require_once ABSPATH . 'classes/projects.class.php';

$Admin              = new Admin();
$Form               = new Form();

$Projects           = new Projects();

if (isset($_POST)) {
    $projectId  = $_POST['projectId'];
    $imageName  = $_POST['imageName'];
    
    echo trim($Projects->deleteProjectImageByOne($projectId, $imageName));
     
}
?>