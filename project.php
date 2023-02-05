<?php
require_once "./inc/reqHeader.php";

require_once "classes/projects.class.php";

$Projects   = new Projects();


if (isset($_GET['pid'])) {
    $projectId = $_GET['pid'];
}else {
    header("Location: portfolio.php");
    exit;
}
$showProject    = $Projects->showProjectById($projectId);
$showImages     = $Projects->showProjectImageByPId($projectId);
$featureImage   = $Projects->showProjectFeatureImage($projectId);

if (count($showProject) < 1) {
    header("Location: portfolio.php");
    exit;
}
// print_r($featureImage);exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Project | <?php echo SITE_NAME; ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/main-css/bootstrap.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/portfolio.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">

    <style>
    .project_section {
        width: 100%;
        float: left;
    }

    .project-header {
        margin: 3rem 0;
        background-color: #FFF;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    .header-details {
        background-image: radial-gradient(#00000030, #00000059);
        /* background: rgba(50, 70, 80, 0.7); */
        overflow: hidden;
        height: 100%;
        padding: 3rem 0;
    }

    .header-details h1 {
        text-align: center;
        font-size: 3rem;
        font-weight: 700;
        color: #fff;
    }

    .project-summary {
        font-size: 1.1rem;
        color: #000;
        padding: 1rem;
    }

    .portfolio-item {
        /*width:100%;*/
    }

    .portfolio-item .item {
        float: left;
        margin-bottom: 15px;
    }

    .image_fit {
        object-fit: cover;
        width: 100%;
        height: 250px;
    }
    </style>

</head>

<body>
    <!-- header section start -->
    <?php require_once "partials/nav-bar.php"; ?>
    <!-- header section end -->


    <!-- section start  -->
    <div class="project_section mt-5">
        <div class="container">
            <div class="project-header"
                style="background-image: url('images/projects/<?php echo $featureImage['image'];?>')">

                <div class="header-details">
                    <h1><?php echo $showProject['name'];?></h1>
                </div>

            </div>

            <p class="project-summary"><?php echo $showProject['dsc'];?></p>

            <div class="portfolio-item row">
                <?php
                foreach ($showImages as $eachImage) {
                    echo '
                    <div class="item selfie col-sm col-6 col-md-4 col-lg-3">
                        <a href="images/projects/'.$eachImage['image'].'"
                            class="fancylight popup-btn" data-fancybox-group="light">
                            <img class="img-fluid image_fit"
                                src="images/projects/'.$eachImage['image'].'"
                                alt="">
                        </a>
                    </div>
                    ';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- section end  -->


    <!-- footer section start -->
    <?php require_once "partials/footer.php"; ?>
    <!--  footer section end -->
    <!--Bootstrap Css -->
    <script src="js/main-js/bootstrap.js"></script>
</body>

</html>