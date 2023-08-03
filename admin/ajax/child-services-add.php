<?php
require_once "../../_config/dbconnect.php";
require_once "../../classes/services.class.php";

$Services   = new Services();

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


    

    $check = getimagesize($_FILES["service-icon"]["tmp_name"]);
    $check2 = getimagesize($_FILES["feature-image"]["tmp_name"]);

    if($check !== false) {
      if(move_uploaded_file($tempname, $target_image)){

        if($check2 !== false) {
          if(move_uploaded_file($tempname2, $target_image2)){

            $added  = $Services->addChildService($parentId, $name, $dsc, $image_name, $image_name2);
            if ($added) {
              $errMsg   = "Category Added!";
              $Services->incrServiceChild($parentId);
            }else {
              $errMsg   = "Insertion Failed! =>".$_FILES['service-icon']['error'];
            }
          }else{
            $errMsg = "Failed to upload feature image.";
          }
        }else{
          $errMsg = "Feature image is not an image.";
        }
          
      }else{
        $errMsg = "Failed to upload icon.";
      }

    }else{
      $errMsg = "Icon is not an image.";
    }



  }
}


$allServices = $Services->showServices();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> -->
    <link rel="stylesheet" href="../../vendors/dropify-master/dist/css/dropify.min.css">

    <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
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

    <form class="row g-3" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">


        <!-- <div class="col-md-12 d-flex justify-content-center">
            <div class="col-6 mb-3">
                <input type="file" class="dropify" name="service-icon">
            </div>
        </div> -->

        <div class="col-md-12 d-flex justify-content-center">
            <div class="col-6 mb-3">
                <input type="file" class="dropify feature-image" name="feature-image">
            </div>
        </div>

        <!-- ==================================================== -->

        <div class="col-md-12">
            <div class="row  w-100 ms-0 ps-1 py-2" style="border: 1px solid #b8b8ed">
                <div class="col-2">
                    <!-- <input type="file" class="dropify" name="service-icon" id="service-icon"
                        data-default-file="" data-height="80"
                        onchange="getUplodedData(this)" data-allowed-file-extensions="png jpg jpeg gif"> -->
                    <input type="file" class="dropify" data-height="80" name="service-icon">

                </div>

                <div class="col-9" onclick="clickElement('service-icon')">
                    <label class="opacity-50">Sub Service Icon</label>
                    <p class="mb-0 iconName dropify-filename-inner"></p>
                    <!-- <p class="mb-0 iconName"><?php //echo $childService['icon']; ?></p> -->
                    <?php
                      // $rawSize =  filesize($imgPath.$childService['icon']);
                      // $fSExt = array('Bytes', 'KB', 'MB', 'GB');
                      // $i = 0;
                      // while ($rawSize > 900) {
                      //   $rawSize /= 1024;
                      //   $i++;
                      // }
                      // $exactSize = (round($rawSize * 100) / 100);
                      // $exactSize = $exactSize.' '.$fSExt[$i]
                    ?>
                    <!-- <p class="iconSize"><?php //echo $exactSize; ?></p> -->
                    <p class="iconSize"></p>
                </div>
            </div>
        </div>

        <!-- ==================================================== -->

        <div class="col-md-12">
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" name="parentId"
                    aria-label="Floating label select Parent service">
                    <option selected disabled>Select Main Service</option>
                    <?php
                      foreach ($allServices as $eachSearvice) {
                        echo '<option value="'.$eachSearvice['id'].'">'.$eachSearvice['name'].'</option>';
                      }
                    ?>
                </select>
                <label for="floatingSelect">Parent Service</label>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-floating">
                <input type="text" class="form-control" name="childServiceName" id="floatingName"
                    placeholder="Service Name" required>
                <label for="floatingName">Child Service Name</label>
            </div>
        </div>


        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control" name="childServiceDsc" placeholder="Service Description"
                    id="floatingTextarea" style="height: 100px;" maxlength="150"></textarea>
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
            'default': 'Icon Here',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong happended.',
        }
    });

    </script>
    <script src="../../js/main-js/bootstrap.js"></script>
</body>

</html>