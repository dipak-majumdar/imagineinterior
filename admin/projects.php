<?php
session_start();
require_once "../_config/adminSession.php";

require_once '../_config/dbconnect.php';
require_once '../inc/constants.inc.php';

require_once '../classes/projects.class.php';
require_once '../classes/services.class.php';
require_once '../classes/date-utility.class.php';

$page = $_SERVER['PHP_SELF'];

$Projects           = new Projects();
$Services           = new Services();
$DateUtility        = new DateUtility();

$allProjects   = $Projects->showProjects();
// $users = $User->showUsers();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Projects - <?php echo SITE_NAME?></title>
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
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/custom-style.css" rel="stylesheet">
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
            <h1><?php echo ucfirst(str_replace('.php', '', basename($_SERVER['PHP_SELF']))); ?></h1>
            <nav>
                <ol class="breadcrumb">
                    <?php 
                            $repWords = array('\\', '\'', '*', '?', '"', '<', '>', '|', '+', '-', '.php');
                            $locs = explode('/', str_replace($repWords, ' ', ucfirst($page)));
                            foreach ($locs as $loc) {
                                if ($loc != null) {
                                    echo '
                                    <li class="breadcrumb-item">
                                    '.ucfirst($loc).'
                                    </li>
                                    ';
                                }
                            }
                        ?>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->


        <section class="section dashboard">
            <div class="card p-2">

                <!-- Services  Section Start  -->
                <div class="card-header d-flex justify-content-between">
                    <span>Total Projects is: <?php echo count($allProjects); ?></span>
                    <a class="btn btn-sm btn-primary" href="projects-add.php">Add New</a>
                </div>

                <?php
                if (count($allProjects) > 0) {
                ?>

                <!-- responsive table start -->
                <div class="table-responsive">
                    <table class="table datatable img_table">
                        <thead>
                            <tr>
                                <th scope="col">Icon</th>
                                <th scope="col">Name</th>
                                <th scope="col">Dsc</th>
                                <th scope="col">Service</th>
                                <th scope="col">Child Service</th>
                                <th scope="col">Created</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                        foreach ($allProjects as $eachProject) {
                            $showService = $Services->showServiceById($eachProject['service_id']);
                            if (count($showService) == 0 ) {
                                $showService['name'] = '';
                            }
                            $showChildService = $Services->childServiceById($eachProject['child_service_id']);
                            $childServiceName = '';
                            if(count($showChildService) > 0 ) {
                                $childServiceName = $showChildService['name'];
                            }

                            $projectImg = $Projects->showProjectFeatureImage($eachProject['id']);
                    ?>
                            <tr class="<?php if ($eachProject['status'] == 0) {
                                echo "bg-danger text-light";
                            }?>">
                                <td class="align-middle">
                                    <img src="../images/projects/<?php echo $projectImg['image'];?>" alt="<?php echo $eachProject['name'];?>" class="td_thumnail">
                                </td>
                                <td class="align-middle"><?php echo $eachProject['name'];?></td>
                                <td class="align-middle"><?php echo substr($eachProject['dsc'], 0, 20);?>..</td>
                                <td class="align-middle"><?php echo $showService['name']; ?></td>
                                <td class="align-middle"><?php echo $childServiceName;?></td>
                                <td class="align-middle"><?php echo $DateUtility->numDate($eachProject['added_on']);?>
                                </td>
                                <td class="align-middle">
                                    <a href="projects-view.php?data=<?php echo base64_encode($eachProject['id']); ?>"
                                        class="btn btn-sm badge bg-success me-2"><i class="bi bi-eye"></i>
                                    </a>

                                    <span class="btn btn-sm badge <?php if($eachProject['status'] == 0){echo 'bg-primary'; }else{ echo 'bg-danger';}?>" id="<?php echo $eachProject['id']; ?>" onclick="updateStatus(this)">
                                        <i class="bi <?php if($eachProject['status'] == 0){echo 'bi-toggle2-off'; }else{ echo 'bi-toggle-on';}?>"></i>
                                    </span>

                                    <a href="javascript:void();" class="btn btn-sm badge bg-danger ms-2"
                                        id="<?php echo $eachProject['id'];?>" onclick="deleteProject(this)">
                                        <i class="bi bi-trash2"></i>
                                    </a>
                                </td>
                            </tr>

                            <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- responsive table end -->
                <?php
                }else {
                ?>
                <div class="border border-primary py-5">
                    <p class="fw-bold text-center">No Projects</p>
                </div>
                <?php
                }
                ?>
            </div>
            <!-- Services  Section Start -->
        </section>
    </main>
    <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../vendors/jQuery/jquery-3.6.0.js"></script>
    <script src="../vendors/ajax.custom-lib.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
    const updateStatus = (t) => {

        if (confirm("Are You Sure?")) {
            projectId = t.id;
            
            $.ajax({
                url: "ajax/project-status-update.ajax.php",
                type: "POST",
                data: {
                    projectId: projectId,
                },
                success: function(data) {
                    console.log(data)
                    if (data == 'deactivated') {

                        let aTag = document.getElementById(t.id);
                        aTag.classList.add('bg-primary');
                        aTag.classList.remove('bg-danger');


                        let icon = aTag.childNodes[1].classList;
                        icon.add("bi-toggle2-off");
                        icon.remove("bi-toggle-on");

                        let tr = aTag.parentElement.parentElement;
                        tr.classList.add('bg-danger');
                        tr.classList.add('text-light');

                    }else if (data == 'activated') {

                        let aTag = document.getElementById(t.id);
                        aTag.classList.add('bg-danger');
                        aTag.classList.remove('bg-primary');

                        let icon = aTag.childNodes[1];
                        icon.classList.add("bi-toggle-on");
                        icon.classList.remove("bi-toggle2-off");

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
    const deleteProject = (t) => {
        id = t.id;
        if (confirm("Are You Sure Want to Delete?")) {

            $.ajax({
                url: "ajax/project-delete.php",
                type: "POST",
                data: {
                    actionId: id,
                },
                success: function(response) {
                    // alert(response);
                    if (response.includes('true')) {
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