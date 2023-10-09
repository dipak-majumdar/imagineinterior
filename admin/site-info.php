<?php
session_start();

require_once "../inc/constants.inc.php";

require_once "../_config/adminSession.php";
require_once '../_config/dbconnect.php';


require_once '../classes/admin.class.php';
require_once '../classes/form.class.php';


require_once '../classes/services.class.php';
require_once '../classes/site.class.php';

$Admin      = new Admin();
$Form       = new Form();

$SiteInfo   = new SiteInfo();
$Services   = new Services();

require_once "partials/common-admin-files.inc.php";
$logedAdmin = $Admin->showAdminByEmail($_SESSION['email']);

$defaultLogo    = '';
if ($LOGO != null) {
    $defaultLogo = 'data-default-file="../images/logo/'.$LOGO.'"';;
}

$defaultFavicon    = '';
if ($FAVICON != null) {
    $defaultFavicon = 'data-default-file="../images/logo/'.$FAVICON.'"';;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Site Info - <?php echo SITE_NAME; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= IMGURL.'logo/'.$FAVICON;?>" rel="icon">
    <link href="<?= IMGURL.'logo/'.$FAVICON;?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!-- <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"> -->
    <!-- <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet"> -->
    <!-- <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet"> -->
    <!-- <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet"> -->
    <!-- <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/custom-style.css" rel="stylesheet">

    <link rel="stylesheet" href="../vendors/dropify-master/dist/css/dropify.min.css">
</head>

<body>

    <!-- ======= Header ======= -->
    <?php require_once 'partials/top-bar.php';?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php require_once 'partials/sidebar.php';?>
    <!-- ====== End Sidebar ===== -->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card image-card">
                        <div class="card-body pt-4">
                            <!-- <h5 class="card-title">Site Logo</h5> -->
                            <form action="ajax/site-update.ajax.php" method="post" id="logo-form"
                                enctype="multipart/form-data">
                                <input type="file" class="dropify" name="site-logo" id="site-logo"
                                    <?php echo $defaultLogo;?> data-height="143">
                                <div class="d-flex justify-content-around mt-3">
                                    <button class="btn btn-sm btn-light border border-primary">Change</button>
                                    <button class="btn btn-sm btn-light border border-success">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Sales Card -->

                <!-- Sales Card -->
                <div class="col-xxl-3 col-md-3 pt-2 pt-md-0">
                    <div class="card info-card image-card">
                        <div class="card-body pt-4">
                            <form action="ajax/site-update.ajax.php" method="post" enctype="multipart/form-data">
                                <input type="file" class="dropify" name="site-favicon" id="site-favicon"
                                    <?php echo $defaultFavicon;?> data-height="143">
                                <div class="d-flex justify-content-around mt-3">
                                    <button class="btn btn-sm btn-light border border-primary">Change</button>
                                    <button class="btn btn-sm btn-light border border-success">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Sales Card -->

                <!-- Site Title Form Start -->
                <div class="col-md-5 pt-2 pt-md-0">
                    <div class="card info-card sales-card pt-3">
                        <div class="card-body">
                            <div class="contact">
                                <form action="ajax/site-update.ajax.php" method="post" class="php-email-form">
                                    <div class="mb-3">
                                        <label for="site-title" class="form-label">Site Title</label>
                                        <input type="text" class="form-control" name="site-title"
                                            value="<?php echo $Site['site_title']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="site-tagline" class="form-label">Site Tagline</label>
                                        <input type="text" class="form-control" name="site-tagline"
                                            value="<?php echo $Site['site_tagline']; ?>">
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-sm btn-primary" name="update-names">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Site Title Form End -->



                <!-- Site Title Form Start -->
                <div class="col-12 pt-2 pt-md-0">
                    <div class="card info-card sales-card pt-3">
                        <div class="card-body">
                            <div class="contact">
                                <form action="ajax/site-update.ajax.php" method="post" class="php-email-form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="contact1" class="form-label">Contact 1</label>
                                                    <input type="number" class="form-control" name="contact1"
                                                        value="<?php echo $Site['contact1']; ?>">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="contact2" class="form-label">Contact 2</label>
                                                    <input type="number" class="form-control" name="contact2"
                                                        value="<?php echo $Site['contact2']; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" name="email"
                                                value="<?php echo $Site['email']; ?>">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="address1" class="form-label">Address Line 1</label>
                                            <input type="text" class="form-control" name="address1"
                                                value="<?php echo $Site['address1']; ?>">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="address2" class="form-label">Address Line 2</label>
                                            <input type="text" class="form-control" name="address2"
                                                value="<?php echo $Site['address2']; ?>">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" class="form-control" name="city"
                                                value="<?php echo $Site['city']; ?>">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="state" class="form-label">State</label>
                                            <input type="text" class="form-control" name="state"
                                                value="<?php echo $Site['state']; ?>">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="pin" class="form-label">PIN</label>
                                            <input type="text" class="form-control" name="pin"
                                                value="<?php echo $Site['pin']; ?>">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="country" class="form-label">Country</label>
                                            <input type="text" class="form-control" name="country"
                                                value="<?php echo $Site['country']; ?>">
                                        </div>
                                    </div>

                                    <div class="text-center text-md-end">
                                        <button class="btn btn-sm btn-primary" name="update-contact" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Site Title Form End -->


            </div>
        </section>

    </main>
    <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <!-- <script src="assets/vendor/apexcharts/apexcharts.min.js"></script> -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="assets/vendor/chart.js/chart.min.js"></script> -->
    <!-- <script src="assets/vendor/echarts/echarts.min.js"></script> -->
    <!-- <script src="assets/vendor/quill/quill.min.js"></script> -->
    <!-- <script src="assets/vendor/simple-datatables/simple-datatables.js"></script> -->
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../vendors/ajax.custom-lib.js"></script>
    <script src="../vendors/dropify-master/dist/js/dropify.min.js"></script>
    <script>
    $('.dropify').dropify({
        messages: {
            'default': 'Upload the Logo here',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong happended.'
        }
    });

    $('#site-favicon').dropify({
        messages: {
            'default': 'Upload site favicon here',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong happended.'
        }
    });

    // const updateLogo = () => {
    //         alert('Hi');

    // $.ajax({
    //     type: "POST",
    //     url: "ajax/site-update.ajax.php",
    //     data: $("#logo-form").serialize(),
    //     dataType: "json",
    //     encode: true,
    // }).success(function(data) {
    //     console.log(data);
    //     alert(data)
    // });





    // $.ajax({
    //     url: "ajax/category-cancel.php",
    //     type: "POST",
    //     data: $("#logo-form").serialize(),
    //     success: function(data) {
    //         if (data == 1) {
    //             let aTag = document.getElementById(t.id);
    //             aTag.classList.remove('bg-danger');
    //             aTag.classList.add('bg-primary');

    //             aTag.setAttribute("onClick", "activeCat(this);");


    //             let icon = aTag.childNodes[0].classList;

    //             icon.remove("bi-toggle-on");
    //             icon.add("bi-toggle2-off");

    //             // console.log(icon);
    //             let tr = aTag.parentElement.parentElement;
    //             tr.classList.add('bg-danger');
    //             tr.classList.add('text-light');

    //         } else {
    //             alert('Updation Failed!');
    //         }
    //     }
    // });
    // }
    </script>

</body>

</html>