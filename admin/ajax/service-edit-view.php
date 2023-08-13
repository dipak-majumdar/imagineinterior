<?php
require_once "../../_config/dbconnect.php";
require_once "../../classes/services.class.php";

$Services   = new Services();

$errMsg = '';
$name = '';
$dsc  = '';



  
$errMsg = '';

if (isset($_POST['updateBtn'])) {
  
  $catId  = $_POST['cat-id'];
  $name   = $_POST['catName'];
  $dsc    = $_POST['catDsc'];

  //Image Upload
  $image_name   = $_FILES["service-icon"]["name"];

  if ($image_name != null) {
    $target_dir   = "../../images/services/";
    $tempname     = $_FILES["service-icon"]["tmp_name"];
    $target_image = $target_dir . basename($_FILES["service-icon"]["name"]);

    $check = getimagesize($_FILES["service-icon"]["tmp_name"]);
    if($check !== false) {
      if(move_uploaded_file($tempname, $target_image)){

        $update  = $Services->updateService($catId, $image_name, $name, $dsc);
        if ($update == true) {
          $errMsg   = "Service Update!";
        }else {
          $errMsg   = "Updation Failed!";
        }


      }

    }else{
      $errMsg = "File is not an image.";
    }
  }else {
    $update  = $Services->updateServiceText($catId, $name, $dsc);
    if ($update == true) {
      $errMsg   = "Service Update!";
    }else {
      $errMsg   = "Updation Failed!";
    }
  }


  //view data after updation
  $show = $Services->showServiceById($catId);
  $name = $show['name'];
  $dsc  = $show['descreption'];
  $icon = $show['icon'];

}



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['id'])) {
     $catId   = $_GET['id'];

    $show = $Services->showServiceById($catId);
    $name = $show['name'];
    $dsc  = $show['descreption'];
    $icon = $show['icon'];

    // echo $url = $_SERVER['PHP_SELF'].'?id='.$catId;
    
  }

}


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
    <form class="m-1" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" enctype="multipart/form-data">

        <div class="row mt-2">
            <div class="col-4">
                <input type="file" class="dropify" name="service-icon"
                    data-default-file="../../images/services/<?php echo $icon; ?>">
            </div>
            <div class="row col-8 pe-0">
                <div class="col-12 pe-0">
                    <input type="hidden" name="cat-id" value="<?php echo $catId; ?>">
                    <div class="form-floating">
                        <input value="<?php echo $name; ?>" type="text" class="form-control" name="catName"
                            id="floatingName" placeholder="Service Name" required>
                        <label for="floatingName">Service Name</label>
                    </div>
                </div>
                <div class="col-12 pe-0">
                    <div class="form-group">
                        <textarea class="form-control editor" name="catDsc" placeholder="Service Description" style="height: 130px;"><?php echo $dsc; ?></textarea>
                    </div>
                </div>
            </div>
        </div>


        <!-- <div class="col-md-12 d-flex justify-content-center">
            <div class="col-4 mb-3">
                <input type="file" class="dropify" name="service-icon"
                    data-default-file="../../images/services/<?php echo $icon; ?>">
            </div>
        </div>


        <div class="col-md-12">
            <input type="hidden" name="cat-id" value="<?php echo $catId; ?>">
            <div class="form-floating">
                <input value="<?php echo $name; ?>" type="text" class="form-control" name="catName" id="floatingName"
                    placeholder="Service Name" required>
                <label for="floatingName">Service Name</label>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control" name="catDsc" placeholder="Service Description" id="floatingTextarea"
                    style="height: 100px;"><?php echo $dsc; ?></textarea>
                <label for="floatingTextarea">Service Description</label>
            </div>
        </div> -->

        <div class="text-end">
            <button type="submit" name="updateBtn" class="btn btn-primary">Update</button>
        </div>
    </form>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../vendors/dropify-master/dist/js/dropify.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../vendors/ckeditor/build/ckeditor.js"></script>
    <script>
    $('.dropify').dropify();

    // CKEDITOR.replace('serviceDsc');

    ClassicEditor
        .create(document.querySelector('.editor'), {

            // Editor configuration.
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(handleSampleError);

    function handleSampleError(error) {
        const issueUrl = 'https://github.com/ckeditor/ckeditor5/issues';

        const message = [
            'Oops, something went wrong!',
            `Please, report the following error on ${ issueUrl } with the build id "3nxjkchnwx9x-dh6ivg4raa9r" and the error stack trace:`
        ].join('\n');

        console.error(message);
        console.error(error);
    }
    </script>
</body>

</html>