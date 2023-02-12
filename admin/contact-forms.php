<?php
session_start();
require_once "../_config/adminSession.php";

require_once '../_config/dbconnect.php';
require_once '../inc/constants.inc.php';

require_once '../classes/user.class.php';
require_once '../classes/form.class.php';
require_once '../classes/date-utility.class.php';


$User           = new User();
$Form           = new Form();
$DateUtility    = new DateUtility();

$users   = $User->showUsers();
$contacts = $Form->showContactForms();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Contact Form - <?php echo SITE_NAME?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
    .small_text {
        font-size: 12px;
    }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <?php require_once 'partials/top-bar.php';?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php require_once 'partials/sidebar.php';?>
    <!-- ====== End Sidebar ===== -->

    <main id="main" class="main">

        <section class="section dashboard">
            <div class="card p-2">
                <div class="card-header border-0 d-flex justify-content-between">
                    <span>
                        <span>
                            Pending Contacts:
                            <span class="badge bg-warning mb-2">
                                <?php echo count($Form->showContactByStatus(0))?>
                            </span>
                        </span>
                        <span>
                            Solved Contacts:
                            <span class="badge bg-primary mb-2">
                                <?php echo count($Form->showContactByStatus(1))?>
                            </span>
                        </span>
                    </span>
                </div>
                <div class="card-body px-0">
                    <?php
                    foreach ($contacts as $eachContact) {
                        if ($eachContact['status'] == 0) {
                            $status     = 'Pending';
                            $statusBg   = 'warning';
                            $bodyBg     = 'bg-light';
                        }else {
                            $status     = 'Checked';
                            $statusBg   = 'primary';
                            $bodyBg     = '';
                        }
                    ?>
                    <div class="chat_body border-bottom rounded pt-2 px-2 my-1 <?php echo $bodyBg; ?>"
                        data-bs-toggle="modal" data-bs-target="#chatDetailsModal"
                        id="contact-body<?php echo $eachContact['id'];?>"
                        onclick="viewContact('<?php echo $eachContact['id']; ?>', '<?php echo $eachContact['contact_no']; ?>', '<?php echo $eachContact['email']; ?>', '<?php echo $eachContact['message']; ?>')">
                        <div class="row">
                            <div class="col-sm-9 order-2 order-sm-1">
                                <h4><?php echo $eachContact['name']; ?><span
                                        class="ms-1 small_text"><?php echo $DateUtility->numDate($eachContact['added_on']); ?></span>
                                </h4>
                                <p>
                                    <span class="me-3">Contact: <b><?php echo $eachContact['contact_no']; ?></b></span>
                                    <span>Message: <?php echo substr($eachContact['message'], 0, 30); ?></span>
                                </p>
                            </div>
                            <div class="col-sm-3 order-1 order-sm-3">
                                <div class="text-end">
                                    <span id="status<?php echo $eachContact['id']; ?>"
                                        class="badge bg-<?php echo $statusBg;?> mb-2"><small><?php echo $status;?></small></span>
                                    <div class="d-flex justify-content-end">
                                        <button
                                            class="btn btn-sm btn-outline-primary pt-0 pb-0 d-none d-sm-block">View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- Modal -->
    <div class="modal fade" id="chatDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Message and Contact Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ps-4" id="appendBody">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../js/jquery.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
    // delete categories 
    const viewContact = (id, mob, email, message) => {

        let appendData = `<p>${message}</p>

        <p class="d-md-flex justify-content-between">
            <a href="tel:${mob}" class="query_mob d-block d-md-inline"><i class="bi bi-telephone-fill me-2"></i>${mob}</a>
            <a href="mailto:${email}" class="query_mail d-block d-md-inline"><i
            class="bi bi-envelope-fill me-2"></i>${email}</a>
        </p>`;

        document.getElementById('appendBody').innerHTML = appendData;

        $.ajax({
            url: "ajax/contact-form-update.ajax.php",
            type: "POST",
            data: {
                update: 'checked',
                id: id,
            },
            success: function(response) {
                // alert(response);
                if (response.includes('true')) {
                    document.getElementById(`contact-body${id}`).classList.remove('bg-light');
                    document.getElementById(`status${id}`).classList.remove('bg-warning');
                    document.getElementById(`status${id}`).classList.add('bg-primary');
                    document.getElementById(`status${id}`).innerText = 'Checked';
                } else {
                    alert('Soething is wrong!');

                }
            }
        });
    }
    </script>

</body>

</html>