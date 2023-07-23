<?php
require_once dirname(__DIR__).'/inc/constants.inc.php';
require_once ABSPATH . '/_config/dbconnect.php';
require_once ABSPATH . '/classes/contact.class.php';

$Contact    = new Contact();


if (isset($_POST['subscriber'])) {
    // print_r($_POST);
    if (!empty($_POST['subscriber'])) {
        $subscribed = $Contact->addSubscriber($_POST['subscriber']);
        if ($subscribed == 1) {
            echo 'Thank You!';
        }else {
            echo 'Something is wrong!';
        }
    }else {
        echo 'Please enter your email!';
    }
}else {
    echo 'no request';
}






?>