<?php
require_once "./_config/dbconnect.php";

require_once "./inc/constants.inc.php";
require_once "classes/projects.class.php";

$Projects   = new Projects();


if (isset($_GET['cservice'])) {
    $childServiceId = $_GET['cservice'];
}else {
    header("Location: portfolio.php");
    exit;
}
$showProjects = $Projects->showProjectByChildServiceId($childServiceId);
// print_r($showProjects);exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--googleoff: all-->
    <META NAME="robots" CONTENT="noindex,nofollow">
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Projects | <?php echo SITE_NAME; ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/main-css/bootstrap.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/projects.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">
    <!-- owl stylesheets -->
    <!-- <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">

    <style>
    .row {
        margin: 10px -16px;
    }

    /* Add padding BETWEEN each column */
    .row,
    .row>.column {
        padding: 8px;
    }

    /* Create three equal columns that floats next to each other */
    .column {
        float: left;
        width: 33.33%;
        display: none;
        /* Hide all elements by default */
    }

    /* Clear floats after rows */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Content */
    .content {
        background-color: white;
        padding: 10px;
    }

    /* The "show" class is added to the filtered elements */
    .show {
        display: block;
    }

    .btn:hover {
        background-color: #ddd;
    }

    .btn.active {
        background-color: #0d6efd;
        color: white;
    }
    </style>
</head>

<body>
    <!-- header section start -->
    <?php require_once "partials/nav-bar.php"; ?>
    <!-- header section end -->


    <!-- portfolio section start  -->
    <div class="portfolio_section pb-4 mt-5">
        <div class="container">
            <?php if (count($showProjects) > 0) {?>

            <div class="d-flex justify-content-center mb-4">
                <div id="myBtnContainer">
                    <button class="btn btn-outline-primary active" onclick="filterSelection('all')"> Show all</button>
                    <button class="btn btn-outline-primary" onclick="filterSelection('nature')"> Nature</button>
                    <button class="btn btn-outline-primary" onclick="filterSelection('cars')"> Cars</button>
                    <button class="btn btn-outline-primary" onclick="filterSelection('people')"> People</button>
                </div>
            </div>

            <!-- Portfolio Gallery Grid -->
            <div class="row">
                <?php
                foreach ($showProjects as $eachProject) {

                    $featureImage   = $Projects->showProjectFeatureImage($eachProject['id']);

                    echo '
                    <div class="column animation nature">
                        <a href="project.php?pid='.$eachProject['id'].'">
                            <div class="projects_images" style="background-image: url(images/projects/'.$featureImage['image'].');">
                                <div class="projects_txt_box">
                                    <section class="img_text">
                                        <h3 class="text-light mt-auto">'.$eachProject['name'].'</h3>
                                        <small class="text-light ">12 Aug, 2022</small>
                                    </section>
                                </div>
                            </div>
                        </a>
                    </div>
                    ';
                }
                ?>
            </div>
            <!-- Portfolio Gallery Grid End -->
            <?php }else { ?>
                <div class="container border border-primary rounded bg-light">
                    <h2 class="text-center text-danger py-5"> No Projects</h2>
                </div>
            <?php } ?>


        </div>
    </div>
    <!-- portfolio section end  -->

    <!-- Lets Talk Section Start  -->
    <div class="new_section layout_padding">
        <?php require_once "incs\lets-talk-sec.php"; ?>
    </div>
    <!-- Lets Talk Section End  -->

    <!-- footer section start -->
    <?php require_once "partials/footer.php"; ?>
    <!--  footer section end -->

    <!--Bootstrap Css -->
    <script src="js/main-js/bootstrap.js"></script>
    <script src="js/jquery.min.js"></script>

    <script>
    filterSelection("all")

    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("column");
        if (c == "all") c = "";
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    }

    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }


    // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
    </script>

</body>

</html>