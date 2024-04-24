<?php
session_start();
require_once '../../inc/constants.inc.php';

require_once ABSPATH . "_config/adminSession.php";
require_once ABSPATH . '_config/dbconnect.php';

require_once ABSPATH . 'classes/admin.class.php';
require_once ABSPATH . 'classes/form.class.php';

$Admin              = new Admin();
$Form               = new Form();

if (isset($_GET['id'])) {
    $serviceId = $_GET['id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <!-- Vendor CSS Files -->
    <link href="<?= ADM_URL ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <main>

        <section class="">
            <!-- Services  Section Start  -->
            <div class="">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" class="dropzone" id="image-form" name="image-form">
                    <input type="hidden" id="serviceId" name="serviceId" value="<?= $serviceId; ?>">
                </form>
                <div id="content"></div>
            </div>

            <!-- start right side  -->
            <div class="col-12">
                <div class="text-center mt-4">
                    <button type="button" class="btn btn-primary" onclick="addNewImages()">Save
                        Project</button>
                </div>
            </div>
            <!-- Services  Section Start -->
        </section>

    </main>
    <!-- End #main -->

    <!-- Vendor JS Files -->
    <script src="<?= ADM_URL ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= ADM_URL ?>/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= URL ?>/vendors/jQuery/jquery-3.6.0.js"></script>
    <script src="<?= URL ?>/vendors/ajax.custom-lib.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= ADM_URL ?>/assets/js/main.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
        let imageForm = document.getElementById('image-form');
        let dataForm = document.getElementById('data-form');

        Dropzone.autoDiscover = false;


        var myDropzone = new Dropzone("#image-form", {
            url: "gallery-image-upload.php",
            parallelUploads: 30,
            uploadMultiple: true,
            acceptedFiles: '.png,.jpg,.jpeg,.gif',
            autoProcessQueue: false,
            success: function(file, response) {
                if (response.includes('true')) {
                    $('#content .message').hide();
                    $('#content').append('<div class="message success">Images Uploaded Successfully.</div>');
                    location.reload();
                } else {
                    $('#content').append('<div class="message error">Images Can\'t Uploaded.</div>');
                }
            },
            error: function(file, errorMessage, xhr) {
                // Handle error here
                alert(errorMessage); // Log the error message to the console
                $('#content').append('<div class="message error">Error uploading image: ' + errorMessage + '</div>');
            }
        });

        const addNewImages = () => {
            myDropzone.processQueue();
        }
    </script>

</body>

</html>