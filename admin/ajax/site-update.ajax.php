<?php
require_once "../../_config/dbconnect.php";

require_once "../../classes/site.class.php";


$SiteInfo   = new SiteInfo();



// ========== Site logo Upload ==========
if (isset($_FILES['site-logo'])) {

    $target_dir   = "../../images/logo/";
    $image_name   = $_FILES["site-logo"]["name"];
    $tempname     = $_FILES["site-logo"]["tmp_name"];
    $target_image = $target_dir . basename($_FILES["site-logo"]["name"]);

    $check = getimagesize($_FILES["site-logo"]["tmp_name"]);
    if($check !== false) {
        if(move_uploaded_file($tempname, $target_image)){
            $uploaded = $SiteInfo->updateSiteData1('site_logo', $image_name);
            if ($uploaded) {
                header("Location: ../site-info.php");
                exit;
            }else {
                echo 'ERROR => Failed to Upload.';
            }
        }else {
          $errMsg   = "Insertion Failed! =>".$_FILES['site-logo']['error'];
        }
    }
}



// ========== Site Favicon Upload ==========
if (isset($_FILES['site-favicon'])) {

    $target_dir   = "../../images/logo/";
    $image_name   = $_FILES["site-favicon"]["name"];
    $tempname     = $_FILES["site-favicon"]["tmp_name"];
    $target_image = $target_dir . basename($_FILES["site-favicon"]["name"]);

    $check = getimagesize($_FILES["site-favicon"]["tmp_name"]);
    if($check !== false) {
        if(move_uploaded_file($tempname, $target_image)){
            $uploaded = $SiteInfo->updateSiteData1('favicon', $image_name);
            if ($uploaded) {
                header("Location: ../site-info.php");
                exit;
            }else {
                echo 'ERROR => Failed to Upload.';
            }
        }else {
          $errMsg   = "Insertion Failed! =>".$_FILES['site-favicon']['error'];
        }
    }
}




// ========== Site Favicon Upload ==========
if (isset($_POST['update-names'])) {

    $uploaded = $SiteInfo->updateSiteData2('site_title', $_POST['site-title'], 'site_tagline', $_POST['site-tagline']);
    if($uploaded){
        header("Location: ../site-info.php");
        exit;
    }else {
        echo 'ERROR => Failed to Upload.';
    }
}




// ========== Site Favicon Upload ==========
if (isset($_POST['update-contact'])) {

    $contact1   = $_POST['contact1'];
    $contact2   = $_POST['contact2'];
    $email      = $_POST['email'];
    $address1   = $_POST['address1'];
    $address2   = $_POST['address2'];
    $city       = $_POST['city'];
    $state      = $_POST['state'];
    $pin        = $_POST['pin'];
    $country    = $_POST['country'];


    $updated = $SiteInfo->updateSiteAddress($contact1, $contact2, $email, $address1, $address2, $city, $state, $pin, $country);
    if($updated){
        header("Location: ../site-info.php");
        exit;
    }else {
        echo 'ERROR => Failed to Upload.';
    }
}
?>