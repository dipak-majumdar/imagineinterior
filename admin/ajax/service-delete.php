<?php
require_once "../../_config/dbconnect.php";
require_once "../../classes/services.class.php";
require_once "../../classes/faq.class.php";



$Services   = new Services();
$Faq        =  new Faq;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['actionId'])) {
        $deleted = $Services->serviceDelete($_POST['actionId']);

        if ($deleted == true) {
            $Faq->deleteFaqsByServiceId($serviceId);
            echo 'true';
        }else{
            echo 'false';
        }
    }
}

?>