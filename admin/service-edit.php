<?php
require_once dirname(__DIR__) . "/inc/constants.inc.php";
require_once ABSPATH . "/_config/dbconnect.php";
require_once ABSPATH . "classes/services.class.php";
require_once ABSPATH . "classes/status.class.php";
require_once ABSPATH . "classes/date-utility.class.php";


$Services   = new Services();
$Status     = new Status();
$DateUtil   = new DateUtility();


$errMsg   = '';
$name     = '';
$dsc      = '';
$content  = '';
$slug     = '';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['id'])) {
    $catId   = $_GET['id'];
  }
}


$errMsg = '';

if (isset($_POST['updateBtn'])) {

  $catId    = $_POST['cat-id'];
  $name    = $_POST['catName'];
  $dsc     = $_POST['catDsc'];
  $content = $_POST['content'];
  $slug    = $_POST['slug'];

  //Image Upload
  $image_name   = $_FILES["service-icon"]["name"];

  if ($image_name != null) {
    $target_dir   = "../images/services/";
    $tempname     = $_FILES["service-icon"]["tmp_name"];
    $target_image = $target_dir . basename($_FILES["service-icon"]["name"]);

    $check = getimagesize($_FILES["service-icon"]["tmp_name"]);
    if ($check !== false) {
      if (move_uploaded_file($tempname, $target_image)) {

        $update  = $Services->updateService($catId, $image_name, $name, $dsc, $slug);
        $Services->updateServiceContent($catId, $content);
        if ($update == true) {
          $errMsg   = "Service Update!";
        } else {
          $errMsg   = "Updation Failed!";
        }
      }
    } else {
      $errMsg = "File is not an image.";
    }
  } else {
    // echo $content; exit;
    $update  = $Services->updateServiceText($catId, $name, $dsc);
    $Services->updateServiceContent($catId, $content);
    if ($update == true) {
      $errMsg   = "Service Update!";
    } else {
      $errMsg   = "Updation Failed!";
    }
  }
}



//view data after updation
$show = $Services->showServiceById($catId);
$icon        = $show['icon'];
$name        = $show['name'];
$dsc         = $show['descreption'];
$content     = $show['content'];;
$slug        = $show['slug'];
$status      = $show['status'];
$childNos    = $show['child_services'];
$projectNos  = $show['projects_nos'];
$created     = $show['created'];
$edited      = $show['edited'];

$created  = $DateUtil->numDate($created);
$edited  = $DateUtil->numDate($edited);
$status   = $Status->getStatusName($status);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="<?= URL ?>vendors/dropify-master/dist/css/dropify.min.css">
  <link rel="stylesheet" href="<?= URL ?>css/main-css/bootstrap.css">
</head>

<body class="py-2 px-4">
  <form class="m-1" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" enctype="multipart/form-data">


    <div class="row px-4 mb-2">
      <div class="col-2">
        <a href="<?= ADM_URL.'services.php'?>" class="btn btn-secondary">Back</a>
      </div>
      <div class="col-7">
        <?php
        if ($errMsg != null) {
          echo '<div class="text-center text-primary bg-warning border-start border-primary border-4 mb-4 py-1 fw-semibold">' . $errMsg . '</div>';
        }
        ?>
      </div>
      <div class="col-3 text-end">
        <button type="submit" name="updateBtn" class="btn btn-primary">Update</button>
      </div>
    </div>

    <!-- Row Start  -->
    <div class="row px-4">
      <!-- main section start -->
      <section class="row col-9 p-4 m-0">
        <div class="mb-2">
          <input type="hidden" name="cat-id" value="<?= $catId; ?>">
          <div class="form-group">
            <label for="service-name">Service Name</label>
            <input value="<?php echo $name; ?>" type="text" class="form-control shadow-none border-top-0 border-end-0" name="catName" id="service-name" placeholder="Service Name" required>
          </div>
        </div>

        <div class="">
          <div class="form-group">
            <label for="service-desc">Service Name</label>
            <textarea id="service-desc" class="form-control shadow-none border-top-0 border-end-0" name="catDsc" placeholder="Service Description" style="min-height: 100px;" maxlength="300"><?= $dsc; ?></textarea>
          </div>
        </div>

        <div class="mt-4">
          <div class="form-group">
            <textarea class="form-control editor" name="content" style="min-height: 500px;"><?= $content; ?></textarea>
          </div>
        </div>
      </section>
      <!-- main section start -->


      <!-- sidebar section start -->
      <section class="col-3 card px-3 p-2">
        <p class="text-secondary">
          <span class="fw-semibold">Status:</span>
          <span class="badge text-bg-primary"><?= $status ?></span>
        </p>

        <p class="text-secondary">
          <span class="fw-semibold">Child Services:</span>
          <span class="badge text-bg-secondary"><?= $childNos ?></span>
        </p>

        <p class="text-secondary">
          <span class="fw-semibold">Total Projects: </span>
          <span class="badge text-bg-secondary"><?= $projectNos ?></span>
        </p>

        <div class="d-flex mb-4">
          <label for="slug" class="text-secondary fw-semibold mb-0">Slug: </label>
          <input type="text" id="slug" class="form-control text-primary shadow-none border-start-0 border-top-0 border-end-0 ms-1 ps-0" name="slug" value="<?= $slug ?>" style="height: 20px;">
        </div>
        <div class="mb-4">
          <input type="file" class="dropify" name="service-icon" data-default-file="<?= IMGURL ?>services/<?php echo $icon; ?>">
        </div>

        <p class="text-secondary fw-semibold">Added On: <?= $created ?></p>
        <p class="text-secondary fw-semibold">Last Update: <?= $edited ?></p>

      </section>
      <!-- sidebar section End -->

    </div>
    <!-- Row End  -->

    <!-- <div class="text-end">
            <button type="submit" name="updateBtn" class="btn btn-primary">Update</button>
        </div> -->
  </form>
  <script src="<?= URL ?>js/jquery.min.js"></script>
  <script src="<?= URL ?>vendors/dropify-master/dist/js/dropify.min.js"></script>
  <script src="<?= URL ?>js/bootstrap.js"></script>
  <script src="<?= URL ?>vendors/ckeditor/build/ckeditor.js"></script>
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