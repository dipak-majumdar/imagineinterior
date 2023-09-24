<?php
require_once "./inc/reqHeader.php";

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
    <!-- Favcon -->
    <link rel="icon" href="images/logo/<?= $favcon ?>" type="image/gif" />

    <!-- site metas -->
    <title>Blogs | <?php echo SITE_NAME; ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/main-css/bootstrap.css">

    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/blog.css">

    <!-- fevicon -->
    <!-- <link rel="icon" href="images/fevicon.png" type="image/gif" /> -->
    <!-- Scrollbar Custom CSS -->
    <!-- <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css"> -->
    <!-- Tweaks for older IEs-->
    <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> -->
    <!-- owl stylesheets -->
    <!-- <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen"> -->
</head>

<body>
    <!-- header section start -->
    <?php require_once "partials/nav-bar.php"; ?>
    <!-- header section end -->

    <!-- furnitures section start -->
    <div class="new_section mt-5">
        <div class="blog_construction">
            <div class="row">
                <div class="col-lg-6">
                    <div class="d-flex flex-column">
                        <div>

                            <h1 class="coming_soon">Coming Soon...</h1>
                            <p class="coming_soon_dsc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod
                                deleniti modi hic commodi cupiditate quo.</p>
                        </div>

                        <div class="mail_req">
                            <h3>Request For Notification</h3>
                            <form action="" class="d-flex flex-column">
                                <input type="text" placeholder="Enter Your Mail">
                                <button type="submit">Get Notified</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- <div class="furnitures_section layout_padding">
        <div class="container">
            <h1 class="our_text">OUR furnitures</h1>
            <p class="ipsum_text">There are many variations of passages of Lorem Ipsum </p>
            <div class="furnitures_section2 layout_padding">
                <div class="row">
                    <div class="col-md-6">
                        <div class="container_main">
                            <img src="images/img-2.png" alt="Avatar" class="image">
                            <div class="overlay">
                                <a href="#" class="icon" title="User Profile">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
                        </div>
                        <h3 class="temper_text">Tempor incididunt ut labore et dolore</h3>
                        <p class="dololr_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi </p>
                    </div>
                    <div class="col-md-6">
                        <div class="container_main">
                            <img src="images/img-3.png" alt="Avatar" class="image">
                            <div class="overlay">
                                <a href="#" class="icon" title="User Profile">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
                        </div>
                        <h3 class="temper_text">Tempor incididunt ut labore et dolore</h3>
                        <p class="dololr_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi </p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- furnitures section end -->

    <!-- footer section start -->
    <?php require_once "partials/footer.php"; ?>
    <!--  footer section end -->
    <!--Bootstrap Css -->
    <script src="js/main-js/bootstrap.js"></script>
</body>

</html>