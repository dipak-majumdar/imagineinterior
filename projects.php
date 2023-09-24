<?php
require_once "./inc/reqHeader.php";

require_once "classes/projects.class.php";
require_once "classes/services.class.php";

$Projects   = new Projects();
$Services   = new Services();

// print_r($_GET);exit;

if (isset($_GET['cservice'])) {
    $childServiceSlug = $_GET['cservice'];
}else {
    header("Location: portfolio.php");
    exit;
}

$childService = $Services->childServiceBySlug($childServiceSlug);
// print_r($childService);exit;
$childServiceId = $childService['id'];
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
    <link rel="stylesheet" href="<?= URL ?>css/main-css/bootstrap.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="<?= URL ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= URL ?>css/projects.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="<?= URL ?>css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/logo/<?= $favcon ?>" type="image/gif" />

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?= URL ?>css/jquery.mCustomScrollbar.min.css">
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
    </style>
</head>

<body>
    <!-- header section start -->
    <?php require_once "partials/nav-bar.php"; ?>
    <!-- header section end -->


    <!-- portfolio section start  -->
    <div class="portfolio_section px-2 px-md-0 pb-2 mt-2">
        <div class="container">
            <!-- <h1 class="fs-1 fw-semibold text-center text-primary py-3"> Projects</h1> -->
            <div class="banner_text text-center">
                <h2 class="banner_main_text">Projects</h2>
                <p class="banner_dsc text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati,
                    suscipit?</p>
            </div>
            <!-- <h1 class="sec_heading">Our Designes</h1>
            <p class="sec_heading_dsc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat deserunt
                veritatis
                corporis.</p> -->

            <?php if (count($showProjects) > 0) {?>

            <!-- Portfolio Gallery Grid -->
            <div class="row">
                <?php
                foreach ($showProjects as $eachProject) {

                    $featureImage   = $Projects->showProjectFeatureImage($eachProject['id']);
                    // print_r($featureImage);
                    $fileNameOnly 		= pathinfo($featureImage['image'], PATHINFO_FILENAME);
                    $fullName           = $fileNameOnly.'.webp';
                    echo '
                    <div class="col-6 col-md-4 col-lg-3 p-1">
                        <a href="'.URL.'project/'.$eachProject['slug'].'">
                            <div class="projects_images"
                                style="background-image: url('.IMGURL.'projects/'.$fullName.');">
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
    <div class="new_section layout_padding px-2 px-md-0">
        <?php require_once "incs/lets-talk-sec.php"; ?>
    </div>
    <!-- Lets Talk Section End  -->

    <!-- footer section start -->
    <?php require_once "partials/footer.php"; ?>
    <!--  footer section end -->

    <!--Bootstrap Css -->
    <script src="<?= URL ?>js/main-js/bootstrap.js"></script>
    <script src="<?= URL ?>js/jquery.min.js"></script>

</body>

</html>