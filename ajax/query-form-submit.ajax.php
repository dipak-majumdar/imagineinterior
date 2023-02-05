<?php
require_once '../inc/constants.inc.php';

require_once ABSPATH.'inc/reqHeader.php';
require_once ABSPATH.'classes/form.class.php';

$Form   = new Form();



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name       = $_POST['name'];
    $contact    = $_POST['contact'];
    $email      = $_POST['email'];
    $designFor  = $_POST['design-for'];
    $budget     = $_POST['budget'];
    
    $submited = $Form->addQueryForm($name, $contact, $email, $designFor, $budget);

    if ($submited) {
        // header('Location: '.ABSPATH.'?action=1');
        header('Location: ../index.php?qform=1');
        exit;
    }
}
?>
