

<?php
require_once '../inc/constants.inc.php';

require_once ABSPATH.'inc/reqHeader.php';
require_once ABSPATH.'classes/form.class.php';

$Form   = new Form();



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name       = $_POST['name'];
    $contactNo  = $_POST['contact-no'];
    $email      = $_POST['email'];
    $message    = $_POST['msg'];
    
    $submited = $Form->addContactForm($name, $contactNo, $email, $message, 0);
    // var_dump($submited);
    if ($submited) {
        // header('Location: '.ABSPATH.'?action=1');
        header('Location: ../index.php?cform=1');
        exit;
    }
}
?>