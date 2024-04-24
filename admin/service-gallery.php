<?php
session_start();
require_once '../inc/constants.inc.php';

require_once "../_config/adminSession.php";
require_once '../_config/dbconnect.php';

require_once '../classes/admin.class.php';
require_once '../classes/form.class.php';

require_once '../classes/services.class.php';
require_once '../classes/date-utility.class.php';

require_once ADMPATH . 'partials/common-admin-files.inc.php';

$serviceId = base64_decode($_GET['id']);

$Admin              = new Admin();

$Services           = new Services();
$DateUtility        = new DateUtility();

$page = $_SERVER['PHP_SELF'];

$logedAdmin = $Admin->showAdminByEmail($_SESSION['email']);

// ======================================================================

$imageResponse = $Services->showServiceGallery($serviceId);
// print_r($imageResponse);
$projectDetails = $Services->showServiceById($serviceId);

$serviceName = $projectDetails['name'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    print_r($_REQUEST);
    exit;
}
// exit;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $serviceName; ?> - <?= SITE_NAME ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= IMGURL . 'logo/' . $FAVICON; ?>" rel="icon">
    <link href="<?= IMGURL . 'logo/' . $FAVICON; ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/custom-style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">

    <link rel="stylesheet" href="../vendors/dropify-master/dist/css/dropify.css">


</head>

<body>

    <!-- ======= Header ======= -->
    <?php require_once 'partials/top-bar.php'; ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php require_once 'partials/sidebar.php'; ?>
    <!-- ====== End Sidebar ===== -->

    <main id="main" class="main">

        <section class="section dashboard">
            <div class="card p-2">
                <div class="container">
                    <div class="py-3">
                        <form class="row" action="" method="post">
                            <?php
                            if ($imageResponse['status'] == 1) :
                                $serviceImages = $imageResponse['result'];
                                $ig = 0;
                                foreach ($serviceImages as $eachImg) {
                            ?>
                                    <div class="col-md-4">
                                        <div class="p-3">

                                            <input type="file" class="dropify" data-default-file="../images/services/<?= $eachImg; ?>" value="<?= $eachImg; ?>" name="projectImage<?= $ig++ ?>">
                                        </div>
                                    </div>
                            <?php
                                }
                            else :
                                echo '<div class="p-3">
                                        <p class="text-center fw-bold text-primary"> ' . $serviceName . ' Galery Does Not Have Any Images!</p>
                                    </div>';

                            endif;

                            ?>
                            <div class="text-center">
                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#imageUpdateModal" onclick="imageUpdateModal(<?= $serviceId; ?>)">
                                    Add Image
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Services  Section Start -->

        </section>
    </main>
    <!-- End #main -->


    <!-- Image Update Modal Start-->
    <div class="modal fade" id="imageUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="imageUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageUpdateModalLabel">Add More Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="imageUpdateModalBody">
                    <div class="dropify"></div>

                </div>
            </div>
        </div>
    </div>
    <!-- Image Update Modal End -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../vendors/jQuery/jquery-3.6.0.js"></script>
    <script src="../vendors/ajax.custom-lib.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="../vendors/dropify-master/dist/js/dropify.min.js"></script>

    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Upload project image',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        const imageUpdateModal = (id) => {
            modal = document.getElementById('imageUpdateModalBody');
            let viewUrl = `ajax/service-gallery-update.php?id=${id}`;
            // alert(viewUrl);
            modal.innerHTML =
                `<iframe width="99%" height="250px" frameborder="0" allowtransparency="true" src="${viewUrl}"></iframe>`;
        }


        var drEvent = $('.dropify').dropify();

        // drEvent.on('dropify.beforeClear', function(event, element) {
        //     imgBox = this.parentElement.parentElement.parentElement;

        //     let imgName = element.file.name;
        //     let text = "Do you really want to delete \"" + imgName + "\" ?";
        //     if (confirm(text) == true) {

        //         $.ajax({
        //             url: "ajax/project-image-delete.ajax.php",
        //             type: "POST",
        //             data: {
        //                 projectId: <?= $serviceId ?>,
        //                 imageName: imgName
        //             },
        //             success: function(response) {
        //                 console.log(response);
        //                 if (response == 1) {
        //                     imgBox.classList.add("d-none")
        //                 }
        //             }
        //         });
        //     }
        // });

        drEvent.on('dropify.beforeClear', function(event, element) {
            let imgBox = this.parentElement.parentElement.parentElement;

            let imgName = element.file.name;
            let confirmationMessage = `Do you really want to delete "${imgName}"?`;

            if (confirm(confirmationMessage)) {
                $.ajax({
                    url: "ajax/project-image-delete.ajax.php",
                    type: "POST",
                    data: {
                        projectId: <?= $serviceId ?>,
                        imageName: imgName
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == 1) {
                            imgBox.classList.add("d-none");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error:", error);
                        // Handle error here, such as showing a message to the user
                    }
                });
            }
        });
    </script>

</body>

</html>