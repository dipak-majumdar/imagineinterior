<?php
session_start();
require_once dirname(__DIR__) . "/inc/constants.inc.php";
require_once ADMPATH . 'partials/common-admin-files.inc.php';

require_once ABSPATH . "classes/services.class.php";
require_once ABSPATH . "classes/faq.class.php";
require_once ABSPATH . "classes/status.class.php";
require_once ABSPATH . "classes/utility.class.php";
require_once ABSPATH . "classes/utilityImage.class.php";
require_once ABSPATH . "classes/date-utility.class.php";


$Services       = new Services();
$Faq            = new Faq;
$Status         = new Status();
$Utility        = new Utility();
$UtilityImage   = new UtilityImage;
$DateUtil       = new DateUtility();


$errMsg   = '';

$icon       = '';
$name       = '';
$dsc        = '';
$content    = '';
$slug       = '';
$metaTitle  = '';
$metaDsc    = '';

if (isset($_POST['updateBtn'])) {

  $name         = $_POST['catName'];
  $dsc          = $_POST['catDsc'];
  $content      = $_POST['content'];
  $slug         = $_POST['slug'];
  $metaTitle    = $_POST['meta-title'];
  $metaDsc      = $_POST['meta-dsc'];

  if (!empty($slug)) {
    $slug    = $Utility->slugGenerator($slug);
  }elseif (!empty($metaTitle)){
    $slug    = $Utility->slugGenerator($metaTitle);
  }else {
    $slug    = $Utility->slugGenerator($name);
  }
  
  $uploadedFile = $UtilityImage->uploadImage($_FILES["service-icon"], IMGPATH."services/");
  $uploadedFile = json_decode($uploadedFile);

    if($uploadedFile->status === true){
        $fileName = $uploadedFile->filename;
        $serviceId  = $Services->addService($name, $dsc, $content, $slug, $metaTitle, $metaDsc, $fileName);
            
        $result = $Utility->isNumericId($serviceId);

        if ($result) {
            if (isset($_POST['question']) && isset($_POST['answer'])) {
        
                $added = $Faq->getServiceFaqs($serviceId, $_POST['question'], $_POST['answer']);
                if ($added) {
                    $errMsg   = "Service Added!";
                }else {
                    $errMsg   = "Service Added But Failed to Add Faqs!";
                }
            }else {
                $errMsg   = "Service Added But Faqs Not Found!";
            }
        }else {
        $errMsg   = "Insertion Failed!";
        }
    }else {
    $errMsg = $uploadedFile->msg;
    }

}

if (!empty($serviceId)) {
  
  //view data after updation
  $show = $Services->showServiceById($serviceId);
  // print_r($show);
  $icon        = $show['icon'];
  if (!empty($icon)) {
    $icon = 'data-default-file="'.IMGURL.'services/'.$icon.'"';
  }


  $name        = $show['name'];
  $dsc         = $show['descreption'];
  $content     = $show['content'];;
  $slug        = $show['slug'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Service</title>
    <!-- Favicons -->
    <link href="<?= IMGURL.'logo/'.$FAVICON;?>" rel="icon">
    <link href="<?= IMGURL.'logo/'.$FAVICON;?>" rel="apple-touch-icon">


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
            <section class="col-12 col-lg-9 p-0 p-lg-4 m-0 mb-3 mb-lg-0">

                <input value="<?= $name; ?>" type="text" class="form-control shadow-none border-0 fw-bolder fs-3 mb-2"
                    name="catName" id="service-name" placeholder="Service Name" required>

                <div class="form-group">
                    <textarea id="service-desc" class="form-control shadow-none border-0 fs-5" name="catDsc"
                        placeholder="Service Description" style="min-height: 100px;"
                        maxlength="300"><?= $dsc; ?></textarea>
                </div>

                <div class="form-group">
                    <textarea class="form-control editor" name="content"
                        style="min-height: 500px;"><?= $content; ?></textarea>
                </div>

                <div class="faq_sqction border mt-2">
                    <div>
                        <input type="text" class="form-control shadow-none border-0 fs-5 fw-semibold" id=""
                            name="question[]" placeholder="Question">
                        <textarea class="form-control shadow-none border-0" id="" rows="3" name="answer[]"
                            placeholder="Answer"></textarea>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-2 pe-md-1" id="buttonContainer">
                        <button class="btn btn-sm btn-outline-primary" type="button" onclick="addNewFaq()">Add
                            More</button>
                    </div>
                </div>

            </section>
            <!-- main section start -->


            <!-- sidebar section start -->
            <section class="col-3 card px-3 p-2">

                <div class="mb-4">
                    <input type="file" class="dropify" name="service-icon" <?= $icon; ?>
                        accept="image/x-png,image/gif, image/jpeg, image/jpg">
                </div>

                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="slug-heading">
                            <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse"
                                data-bs-target="#slug-collapse" aria-expanded="true" aria-controls="slug-collapse">
                                Slug
                            </button>
                        </h2>
                        <div id="slug-collapse" class="accordion-collapse collapse show" aria-labelledby="slug-heading"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <input type="text" id="slug"
                                    class="form-control shadow-none border-start-0 border-top-0 border-end-0 ms-1 ps-0"
                                    name="slug" style="height: 20px;">
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="meta-title-heading">
                            <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse"
                                data-bs-target="#meta-title-collapse" aria-expanded="true"
                                aria-controls="meta-title-collapse">
                                Meta Title
                            </button>
                        </h2>
                        <div id="meta-title-collapse" class="accordion-collapse collapse show"
                            aria-labelledby="meta-title-heading" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <input type="text"
                                    class="form-control shadow-none border-start-0 border-top-0 border-end-0 ms-1 ps-0"
                                    maxlength="155" name="meta-title">
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="meta-dsc-heading">
                            <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse"
                                data-bs-target="#meta-dsc-collapse" aria-expanded="true"
                                aria-controls="meta-dsc-collapse">
                                Meta Description
                            </button>
                        </h2>
                        <div id="meta-dsc-collapse" class="accordion-collapse collapse show"
                            aria-labelledby="meta-dsc-heading" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <textarea
                                    class="form-control shadow-none border-start-0 border-top-0 border-end-0 ms-1 ps-0"
                                    name="meta-dsc" rows="15" maxlength="355"
                                    style="height: 12rem !important"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

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


    function addNewFaq() {

        // Create a new div element
        var newDiv = document.createElement('div');
        newDiv.innerHTML = `
            <input type="text" class="form-control shadow-none border-0 fs-5 fw-semibold" id="" name="question[]" placeholder="Question">
            <textarea class="form-control shadow-none border-0" id="" rows="3" name="answer[]" placeholder="Answer"></textarea>
        `;

        // Insert the new div above the existing button container
        var buttonContainer = document.querySelector('#buttonContainer');
        buttonContainer.parentNode.insertBefore(newDiv, buttonContainer);

    }
    </script>
</body>

</html>