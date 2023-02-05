<?php
require_once "_config/dbconnect.php";
require_once "classes/services.class.php";

$Services   = new Services();

$errMsg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['addBtn'])) {

    $parentId   = $_POST['parentId'];
    $name   = $_POST['childServiceName'];
    $dsc    = $_POST['childServiceDsc'];

    $target_dir   = "./images/services/";
    $image_name   = $_FILES["service-icon"]["name"];
    $tempname     = $_FILES["service-icon"]["tmp_name"];
    $target_image = $target_dir . basename($_FILES["service-icon"]["name"]);

    $check = getimagesize($_FILES["service-icon"]["tmp_name"]);

    if($check !== false) {
      if(move_uploaded_file($tempname, $target_image)){
        $added  = $Services->addChildService($parentId, $name, $dsc, $image_name);
        echo $added;
        if ($added) {
          $errMsg   = "Category Added!";
          $Services->incrServiceChild($parentId);
        }else {
          $errMsg   = "Insertion Failed! =>".$_FILES['service-icon']['error'];
        }
      }

    }else{
      $errMsg = "File is not an image.";
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
    <link rel="stylesheet" href="vendors/dropify-master/dist/css/dropify.min.css">

    <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
    <link rel="stylesheet" href="css/main-css/bootstrap.css">

</head>

<body class="p-2">
    <?php
  if ($errMsg != null) {
    echo '<div class="text-center text-primary bg-warning border-start border-primary border-4 mb-4 py-1 fw-semibold">
          '.$errMsg.'
          </div>';
  }
  ?>
    <!-- <form action="<?php echo $_SERVER['PHP_SELF']?>" class="dropzone" id="my-awesome-dropzone"> 
    <input type="file">
  
  </form> -->

    <form class="row g-3" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">


        <div class="col-md-12 d-flex justify-content-center">
            <div class="col-6 mb-3">
                <input type="file" class="dropify" name="service-icon">
            </div>
        </div>

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
                    id="floatingTextarea" style="height: 100px;" maxlength="80"></textarea>
                <label for="floatingTextarea">Description</label>
            </div>
        </div>

        <div class="text-end">
            <button type="submit" name="addBtn" class="btn btn-primary">Save</button>
        </div>
    </form>

    <script src="./js/jquery.min.js"></script>
    <script src="./vendors/dropify-master/dist/js/dropify.min.js"></script>
    <script>
    $('.dropify').dropify({
        messages: {
            'default': 'Upload Your Service Icon Here',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong happended.'
        }
    });
    </script>
    <script src="./js/main-js/bootstrap.js"></script>
</body>

</html>