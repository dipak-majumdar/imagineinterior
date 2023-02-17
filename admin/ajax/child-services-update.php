<?php
require_once "../../inc/constants.inc.php";
require_once ABSPATH . '_config/dbconnect.php';
require_once ABSPATH . 'classes/services.class.php';

$Services   = new Services();

$childServiceId   = $_GET['id'];
$cServ            = $Services->childServiceById($childServiceId);

$errMsg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['addBtn'])) {

    $parentId   = $_POST['parentId'];
    $name   = $_POST['childServiceName'];
    $dsc    = $_POST['childServiceDsc'];

    $target_dir   = "../../images/services/";

    
    $image_name   = $_FILES["service-icon"]["name"];
    $tempname     = $_FILES["service-icon"]["tmp_name"];
    $target_image = $target_dir . basename($_FILES["service-icon"]["name"]);

    $image_name2   = $_FILES["feature-image"]["name"];
    $tempname2     = $_FILES["feature-image"]["tmp_name"];
    $target_image2 = $target_dir . basename($_FILES["feature-image"]["name"]);
    

    if ($tempname != null) {
      $check = getimagesize($tempname);
      if($check !== false) {
        if(move_uploaded_file($tempname, $target_image)){
          // Newly inserted image name
          $iconName = $image_name;
        }else{
          $errMsg = "Failed to update feature image.";
        }
      }else{
        $errMsg = "Icon is not an valid image.";
      }
    }else {
      // old image name set
      $iconName = $cServ['icon'];
    }


    if ($tempname2 != null) {
      $check2 = getimagesize($tempname2);
      if($check2 !== false) {
        if(move_uploaded_file($tempname2, $target_image2)){
          // Newly inserted image name
          $featureImage = $image_name2;
        }else{
          $errMsg = "Failed to update feature image.";
        }
      }else{
        $errMsg = "Feature image is not an valid image.";
      }
    }else {
      // old image name set
      $featureImage = $cServ['feature_image'];
    }


    $updated  = $Services->updateChildService($childServiceId, $parentId, $name, $dsc, $iconName, $featureImage);
    if ($updated) {
        $errMsg   = "Updated!";
        $Services->incrServiceChild($parentId);
    }else {
      $errMsg   = "Updation Failed! =>".$_FILES['service-icon']['error'];
    }


  }
}


$allServices = $Services->showServices();
$childService = $Services->childServiceById($childServiceId);

$imgPath = "../../images/services/"; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../vendors/dropify-master/dist/css/dropify.min.css">
    <link rel="stylesheet" href="../../css/main-css/bootstrap.css">

</head>

<body class="p-2">
    <?php
  if ($errMsg != null) {
    echo '<div class="text-center text-primary bg-warning border-start border-primary border-4 mb-4 py-1 fw-semibold">
          '.$errMsg.'
          </div>';
  }
  ?>


    <form class="row g-3" action="<?php echo $_SERVER['REQUEST_URI']?>" method="post" enctype="multipart/form-data">

        <div class="col-md-12 d-flex justify-content-center">
            <div class="col-5 mb-3">
                <input type="file" class="dropify feature-image" name="feature-image"
                    data-default-file="<?php echo $imgPath.$childService['feature_image'];?>" data-allowed-file-extensions="png jpg jpeg gif">
            </div>
        </div>


        <div class="col-md-12">
            <div class="row  w-100 ms-0 ps-1 py-2" style="border: 1px solid #b8b8ed">
                <div class="col-2">
                    <input type="file" class="dropify" name="service-icon" id="service-icon"
                        data-default-file="<?php echo $imgPath.$childService['icon'];?>" data-height="80"
                        onchange="getUplodedData(this)" data-allowed-file-extensions="png jpg jpeg gif">
                </div>

                <div class="col-9" onclick="clickElement('service-icon')">
                    <label class="opacity-50 ">Sub Service Icon</label>
                    <p class="mb-0 iconName"><?php echo $childService['icon']; ?></p>
                    <?php
                      $rawSize =  filesize($imgPath.$childService['icon']);
                      $fSExt = array('Bytes', 'KB', 'MB', 'GB');
                      $i = 0;
                      while ($rawSize > 900) {
                        $rawSize /= 1024;
                        $i++;
                      }
                      $exactSize = (round($rawSize * 100) / 100);
                      $exactSize = $exactSize.' '.$fSExt[$i]
                    ?>
                    <p class="iconSize"><?php echo $exactSize; ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" name="parentId"
                    aria-label="Floating label select Parent service" required>
                    <option selected disabled>Select Main Service</option>
                    <?php
                      foreach ($allServices as $eachSearvice) {
                        if($childService['parent_id'] == $eachSearvice['id']){
                          $selected = 'selected';
                        }else {
                          $selected = '';
                        }
                        echo '<option value="'.$eachSearvice['id'].'" '.$selected.'>'.$eachSearvice['name'].'</option>';
                      }
                    ?>
                </select>
                <label for="floatingSelect">Parent Service</label>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-floating">
                <input type="text" class="form-control" name="childServiceName" id="floatingName"
                    placeholder="Service Name" required value="<?php echo $childService['name']; ?>" required>
                <label for="floatingName">Child Service Name</label>
            </div>
        </div>


        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control" name="childServiceDsc" placeholder="Service Description"
                    id="floatingTextarea" style="height: 100px;"
                    maxlength="80"><?php echo $childService['dsc']; ?></textarea>
                <label for="floatingTextarea">Description</label>
            </div>
        </div>

        <div class="text-end">
            <button type="submit" name="addBtn" class="btn btn-primary">Save</button>
        </div>
    </form>

    <script src="../../js/jquery.min.js"></script>
    <script src="../../vendors/dropify-master/dist/js/dropify.min.js"></script>
    <script>
    $('.feature-image').dropify({
        messages: {
            'default': 'Upload Featutre Image',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong happended.'
        }
    });
    $('.dropify').dropify({
        messages: {
            'default': '',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong happended.'
        }
    });

    const getUplodedData = (uploadedfile) => {
        var file = uploadedfile.files[0];
        var filename = file.name;
        var filesize = file.size;


        var fSExt = new Array('Bytes', 'KB', 'MB', 'GB'),
            i = 0;
        while (filesize > 900) {
          filesize /= 1024;
            i++;
        }
        var exactSize = (Math.round(filesize * 100) / 100) + ' ' + fSExt[i];

        document.querySelector('.iconName').innerText = filename;
        document.querySelector('.iconSize').innerText = exactSize;

    }
    const clickElement = (elemId) =>{
      document.getElementById(elemId).click();
    }
    </script>
    <script src="../../js/main-js/bootstrap.js"></script>
</body>

</html>