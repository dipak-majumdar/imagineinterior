<?php
session_start();
require_once '../inc/constants.inc.php';

require_once "../_config/adminSession.php";
require_once '../_config/dbconnect.php';

require_once '../classes/admin.class.php';
require_once '../classes/form.class.php';

require_once '../classes/projects.class.php';
require_once '../classes/services.class.php';
require_once '../classes/date-utility.class.php';


$projectId = base64_decode($_GET['data']);

$Admin              = new Admin();
$Form               = new Form();

$Projects           = new Projects();
$Services           = new Services();
$DateUtility        = new DateUtility();

$page = $_SERVER['PHP_SELF'];

$logedAdmin = $Admin->showAdminByEmail($_SESSION['email']);

$project    = $Projects->showProjectById($projectId);
$projectImg = $Projects->showProjectImageByPId($projectId);

$allServices = $Services->showServices();
$childServices = $Services->activeChildServicesByParent($project['service_id']);
// $users = $User->showUsers();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $project['name']; ?> - <?php echo SITE_NAME?></title>
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
    <!-- <link rel="stylesheet" href="../css/main-css/bootstrap.css"> -->
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/custom-style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">

    <link rel="stylesheet" href="../vendors/dropify-master/dist/css/dropify.css">


    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> -->
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

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
            <h1>Edit Project Details</h1>
            <!-- <h1><?php echo ucfirst(str_replace('.php', '', basename($_SERVER['PHP_SELF']))); ?></h1> -->
            <!-- <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">
                        <?php echo str_replace(str_split('\\:*?"<>|+'), ' ', ucfirst($page)); ?>
                    </li>
                </ol>
            </nav> -->
        </div>
        <!-- End Page Title -->


        <section class="section dashboard">
            <div class="card p-2">
                <div class="container">
                    <div class="row">
                        <?php
                        // print_r(ACCEPTEXTENSION);
                        
                        foreach ($projectImg as $eachImg) {
                            
                            // $imgname =  pathinfo($eachImg['image'],PATHINFO_FILENAME);
                            // $fullPath = '../images/projects/Agatha_Study_Desk_0-39994920.jpg';
                            // if (file_exists($fullPath)) {
                            //             echo $fullPath;
                            //             exit;
                            //         }
                            // foreach (ACCEPTEXTENSION as $ext) {
                            //     // echo $imgname,$ext;
                            //      $projImgsPath   = IMGURL."projects/{$imgname}{$ext}";
                            //     // $projImgsPath   = "../images/projects/.{$imgname}{$ext}";
                            //     echo '<img src="'.$projImgsPath.'" alt="">';

                            //      echo '<br><br>';
                            //     if (file_exists($projImgsPath)) {
                            //         echo $projImgsPath;
                            //         exit;
                            //     }
                            // }
                            // <?php echo IMGURL; projects/
                        ?>
                        <div class="col-md-4">
                            <div class="p-3">
                                <input type="file" class="dropify" data-default-file="../images/projects/<?php echo $eachImg['image']; ?>">
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="col-md-12">
                            <div class="mt-4 mb-2">
                                <label for="" class="form-label">Projet Name <span class="badge bg-danger mouse-pointer"
                                        data-bs-toggle="modal" data-bs-target="#editModal"
                                        onclick="getModal('projectName')">Edit</span></label>
                                <br>
                                <h5 id="projectName" class="ms-3"><?php echo $project['name']; ?></h5>
                            </div>

                            <div class="mb-2">
                                <label for="" class="form-label">Service Name: <i
                                        class="fa-regular fa-circle-exclamation text-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Click on the service name to change"></i></label>
                                <br>
                                <select class="form-control border-0 fs-5" name="serviceName" id="serviceName"
                                    style="width:inherit !important;"
                                    onchange="updateProject2(<?php echo $projectId; ?>, this)">
                                    <?php
                                    foreach ($allServices as $eachService) {
                                        $selected = '';
                                        if ($eachService["id"] == $project['service_id']) {
                                            $selected = 'selected';
                                        }
                                        echo '<option value="'.$eachService["id"].'" '.$selected.'>'.$eachService["name"].'</option>';
                                }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-2">
                                <label for="" class="form-label">Child Service Name: <i
                                        class="fa-regular fa-circle-exclamation text-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Click on the service name to change"></i></span></label>
                                <br>
                                <select class="form-control border-0 fs-5" name="childServiceName" id="childServiceName"
                                    style="width:inherit !important;"
                                    onchange="updateProject2(<?php echo $projectId; ?>, this)">
                                    <?php
                                    foreach ($childServices as $eachService) {
                                        $selected = '';
                                        if ($eachService["id"] == $project['child_service_id']) {
                                            $selected = 'selected';
                                        }
                                        echo '<option value="'.$eachService["id"].'" '.$selected.'>'.$eachService["name"].'</option>';
                                }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-2">
                                <label for="" class="form-label">Projet Description <span class="badge bg-danger mouse-pointer"
                                        data-bs-toggle="modal" data-bs-target="#editModal"
                                        onclick="getModal('projectDsc')">Edit</span></label>
                                <br>
                                <h5 id="projectDsc" class="ms-3"><?php echo $project['dsc']; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- Services  Section Start -->

        </section>
    </main>
    <!-- End #main -->



    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <form action="" method="post" id="update-form">
                        <input type="hidden" name="projectId" value="<?php echo $projectId;?>">
                        <div id="modal-form">

                        </div>
                    </form>
                    <button class="btn btn-primary btn-sm mt-3" onclick="UpdateProject()">Update</button>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <!-- <script src="assets/vendor/apexcharts/apexcharts.min.js"></script> -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="assets/vendor/simple-datatables/simple-datatables.js"></script> -->
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../vendors/jQuery/jquery-3.6.0.js"></script>
    <script src="../vendors/ajax.custom-lib.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="../vendors/x-editable/core/x-editable.js"></script>

    <script src="../vendors/dropify-master/dist/js/dropify.min.js"></script>
    <script>
    // $('.dropify').dropify();

    $('.dropify').dropify({
        messages: {
            'default': 'Upload project image',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong happended.'
        }
    });

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    </script>
    <script>
    const getModal = (id) => {
        modal = document.getElementById('modal-form');
        data = document.getElementById(id).innerText;

        if (id == 'projectDsc') {
            modal.innerHTML =
                `<textarea class="form-control" name="project-data" id="" cols="30" rows="10"></textarea>
                <input type="hidden" name="row-name" value="project-desc">`;
        } else {
            modal.innerHTML = `<input type="text" name="project-data" class="form-control">
                                <input type="hidden" name="row-name" value="project-name">`;
        }
        modal.childNodes[0].value = data;
    }

    const clickSec = (id) => {
        // document.getElementById(id).click();
        // alert(id);
        document.getElementById(id).click();
    }

    const UpdateProject = () => {

        if (confirm("Are You Sure?")) {
            // catId = t.id;

            $.ajax({
                url: "ajax/project-update.ajax.php",
                type: "POST",
                data: $('#update-form').serialize(),
                encode: true,
                success: function(response) {
                    // console.log(response.trim());
                    if (response.trim() == 'updated') {
                        location.reload();
                    }
                }
            });
        }
    }

    const updateProject2 = (projectId, t) => {

        if (confirm("Are You Sure?")) {
            $.ajax({
                url: "ajax/project-update.ajax.php",
                type: "POST",
                data: {
                    action: 'updateAction',
                    projectId: projectId,
                    updateName: t.name,
                    updateValue: t.value
                },
                success: function(response) {
                    // console.log(response);
                    if (response.trim() == 'updated') {
                        location.reload();
                    }
                }
            });
        }
    }

    const activeCat = (t) => {

        if (confirm("Are You Sure?")) {
            catId = t.id;

            $.ajax({
                url: "ajax/service-cancel.php",
                type: "POST",
                data: {
                    catId: catId,
                    status: 1
                },
                success: function(data) {
                    if (data == 1) {
                        let aTag = document.getElementById(t.id);
                        aTag.classList.add('bg-danger');
                        aTag.classList.remove('bg-primary');
                        aTag.setAttribute("onClick", "cancelCat(this);");

                        let icon = aTag.childNodes[0].classList;

                        icon.add("bi-toggle-on");
                        icon.remove("bi-toggle2-off");

                        let tr = aTag.parentElement.parentElement;
                        tr.classList.remove('bg-danger');
                        tr.classList.remove('text-light');

                    } else {
                        alert('Updation Failed!');
                    }
                }
            });
        }
    }


    // delete categories 
    const catDel = (t) => {
        quesId = t.id;
        if (confirm("Are You Sure Want to Delete?")) {

            $.ajax({
                url: "ajax/category-delete.php",
                type: "POST",
                data: {
                    quesId: quesId,
                },
                success: function(data) {

                    if (data.includes('true')) {
                        let aTag = document.getElementById(t.id);

                        let tr = aTag.parentElement.parentElement;
                        tr.style.display = 'none';
                    } else {
                        alert('Can Not Deleted!');
                    }
                }
            });
        }
    }
    </script>

</body>

</html>