<?php
session_start();
require_once '../inc/constants.inc.php';

require_once ABSPATH . "_config/adminSession.php";
require_once ABSPATH . '_config/dbconnect.php';

require_once ABSPATH . 'classes/admin.class.php';
require_once ABSPATH . 'classes/form.class.php';

require_once ABSPATH . 'classes/projects.class.php';
require_once ABSPATH . 'classes/services.class.php';
require_once ABSPATH . 'classes/date-utility.class.php';

$Admin              = new Admin();
$Form               = new Form();

$Projects           = new Projects();
$Services           = new Services();
$DateUtility        = new DateUtility();

$page = $_SERVER['PHP_SELF'];

$logedAdmin = $Admin->showAdminByEmail($_SESSION['email']);

$activeService   = $Services->activeServices();
// $users = $User->showUsers();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['addProjectBtn'])) {
        $_POST['type-id'];
        $_POST['projectName'];
        $_POST['projectDsc'];

        $Projects->addProject($type_id, $name, $dsc, $status, $added_on, $added_by);
    }

}

//     $ds          = '/';  //1
// $storeFolder = 'assets';   //2
 
// if (!empty($_FILES)) {
//     $tempFile = $_FILES['file']['tmp_name'];          //3             
//     $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
//     $targetFile =  $targetPath. $_FILES['file']['name'];  //5
//     move_uploaded_file($tempFile,$targetFile); //6
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>New Project - <?php echo SITE_NAME?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo FAVICON_PATH;?>" rel="icon">
    <link href="<?php echo APPL_FAV_PATH;?>" rel="apple-touch-icon">


    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

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
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">
                        <?php echo str_replace(str_split('\\:*?"<>|+'), ' ', ucfirst($page)); ?>
                    </li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->


        <section class="section dashboard">
            <div class="card p-2">

                <!-- Services  Section Start  -->
                <div class="card-header d-flex justify-content-between">
                    <h4 class="text-primary fw-semibold">Add New Project</h4>
                </div>

                <div class="card-body">

                    <div class="my-3">

                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data"
                            class="dropzone" id="image-form" name="image-form">
                            <input type="hidden" id="projectId" name="projectId" value="">
                        </form>
                        <div id="content"></div>
                    </div>

                    <!-- start right side  -->
                    <div class="col-12">
                        <form action="" method="POST" class="row justify-content-between" id="data-form"
                            name="addProjectData">
                            <input type="hidden" name="addProjectData" value="addProjectData">
                            <div class="col-md-6 border rounded p-3">

                                <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="projectName" id="floatingName"
                                            placeholder="Project Name" required>
                                        <label for="floatingName">Project Name</label>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect" name="serviceTypeId"
                                            aria-label="Floating label select Parent service"
                                            onchange="getChildType(this);">
                                            <option selected disabled value="">Select Main Service</option>
                                            <?php
                                                foreach ($activeService as $eachSearvice) {
                                                    echo '<option value="'.$eachSearvice['id'].'">'.$eachSearvice['name'].'</option>';
                                                }
                                                ?>
                                        </select>
                                        <label for="floatingSelect">Parent Type</label>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="childTypeList" name="childTypeId"
                                            aria-label="Floating label select Parent service">
                                            <option selected disabled value="">Select Main Service First</option>
                                        </select>
                                        <label for="floatingSelect">Child Type</label>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-5 border rounded p-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="projectDsc"
                                            placeholder="Project Description" id="floatingTextarea"
                                            style="height: 300px;" maxlength="2000"></textarea>
                                        <label for="floatingTextarea">Project Description</label>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <button type="button" class="btn btn-primary" onclick="saveProject()">Save
                                Project</button>
                        </div>

                    </div>
                    <!-- end right side -->


                </div>
            </div>
            <!-- Services  Section Start -->

        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer>
    <!-- End Footer -->

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
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <!-- <script src="../js/jquery-3.0.0.min.js"></script> -->
    <script src="../js/jquery.min.js"></script>

    <script>
    let imageForm = document.getElementById('image-form');
    let dataForm = document.getElementById('data-form');

    Dropzone.autoDiscover = false;


    var myDropzone = new Dropzone("#image-form", {
        url: "ajax/project-image-upload.php",
        parallelUploads: 30,
        uploadMultiple: true,
        acceptedFiles: '.png,.jpg,.jpeg,.gif',
        // 'png', 'jpg', 'jpeg', 'gif', 'bmp', 'webp'
        autoProcessQueue: false,
        success: function(file, response) {
            //   console.log(response);
            if (response == 'true') {
                $('#content .message').hide();
                $('#content').append('<div class="message success">Images Uploaded Successfully.</div>');
                location.reload();
            } else {
                alert(response);
                // console.log(response);
                $('#content').append('<div class="message error">Images Can\'t Uploaded.</div>');
            }
        }
    });



    const getChildType = (t) => {
        parentType = t.value;
        $.ajax({
            url: "ajax/projects-data.php",
            type: "POST",
            data: {
                parentType: parentType
            },
            success: function(data) {
                //   alert(data);
                document.getElementById('childTypeList').innerHTML = data;
            }
        });
        //   return false;

    }

    const saveProject = () => {

        let projetcName = dataForm.elements['projectName'].value;
        if (projetcName == '') {
            alert("Please add Project Name.");
            return false;
        }
        let serviceId = dataForm.elements['serviceTypeId'].value;
        if (serviceId == '') {
            alert("Please Choose Project Service Name.");
            return false;
        }
        let childService = dataForm.elements['childTypeId'].value;
        if (childService == '') {
            alert("Please Choose Project Child Service Name.");
            return false;
        }
        let projectDsc = dataForm.elements['projectDsc'].value;
        if (projectDsc == '') {
            alert("Please Choose Project Description.");
            return false;
        }


        $.ajax({
            type: 'post',
            url: 'ajax/project-add.ajax.php',
            data: $('#data-form').serialize(),
            encode: true,
            success: function(response) {
                // alert(response);
                // console.log(response);
                let projectId = response.trim();

                if (projectId > 0) {
                    document.getElementById('projectId').value = projectId;
                    //   alert(projectId);
                    myDropzone.processQueue();
                } else {
                    alert(response);
                }
            }
        });
        //   return false;

    }
    </script>

</body>

</html>