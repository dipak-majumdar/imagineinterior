<?php
session_start();
require_once '../inc/constants.inc.php';

require_once "../_config/adminSession.php";
require_once '../_config/dbconnect.php';

require_once '../classes/admin.class.php';
require_once '../classes/form.class.php';

require_once '../classes/user.class.php';
require_once '../classes/date-utility.class.php';

require_once ADMPATH . 'partials/common-admin-files.inc.php';

$Admin          = new Admin();
$Form           = new Form();

$User           = new User();
$DateUtility    = new DateUtility();

$logedAdmin = $Admin->showAdminByEmail($_SESSION['email']);

$users   = $User->showUsers();
$queries = $Form->showQueryForms();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Query Form - <?php echo SITE_NAME?></title>
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
                            Pending Query:
                            <span class="badge bg-warning mb-2">
                                <?php echo count($Form->showQueriesByStatus('0'))?>
                            </span>
                        </span>
                        <span>
                            Solved Query:
                            <span class="badge bg-primary mb-2">
                                <?php echo count($Form->showQueriesByStatus('1'))?>
                            </span>
                        </span>
                    </span>
                </div>
                <div class="card-body px-0">
                    <?php
                    foreach ($queries as $query) {
                        if ($query['status'] == 0) {
                            $status = 'Pending';
                            $statusBg = 'warning';
                        }else {
                            $status = 'Checked';
                            $statusBg = 'primary';
                        }
                    ?>
                    <div class="chat_body border-bottom bg-light rounded pt-2 px-2 my-1" data-bs-toggle="modal" data-bs-target="#chatDetailsModal"
                        onclick="viewContact('<?php echo $query['id']; ?>', '<?php echo $query['contact_no']; ?>', '<?php echo $query['email']; ?>',)">
                        <div class="row">
                            <div class="col-sm-9 order-2 order-sm-1">
                                <h4><?php echo $query['name']; ?><span
                                        class="ms-1 small_text"><?php echo $DateUtility->numDate($query['added_on']); ?></span>
                                </h4>
                                <p>
                                    <span class="me-3">Designed For: <b><?php echo $query['design_for']; ?></b></span>
                                    <span>Budget: <b><?php echo $query['budget']; ?></b></span>
                                </p>
                            </div>
                            <div class="col-sm-3 order-1 order-sm-3">
                                <div class="text-end">
                                    <span id="status<?php echo $query['id']; ?>"
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
                    <h5 class="modal-title" id="exampleModalLabel">Contact Details</h5>
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
    <!-- <script src="../plugins/jQuery/jquery-3.6.0.js"></script> -->
    <script src="../js/jquery.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
    // delete categories 
    const viewContact = (id, mob, email) => {

        let appendData = `<a href="tel:${mob}" class="query_mob"><i class="bi bi-telephone-fill me-2"></i>${mob}</a>
        <br>
        <a href="mailto:${email}" class="query_mail"><i class="bi bi-envelope-fill me-2"></i>${email}</a>`;

        document.getElementById('appendBody').innerHTML = appendData;

        $.ajax({
            url: "ajax/query-update.php",
            type: "POST",
            data: {
                update: 'checked',
                id: id,
            },
            success: function(response) {
                if (response.includes('false')) {
                    alert('Soething is wrong!');
                } else {
                    document.getElementById(`status${id}`).classList.remove('bg-warning');
                    document.getElementById(`status${id}`).classList.add('bg-primary');
                    document.getElementById(`status${id}`).innerText = 'Checked';

                }
            }
        });
    }
    </script>

</body>

</html>