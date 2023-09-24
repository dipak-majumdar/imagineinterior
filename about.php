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
    <!-- site metas -->
    <title>About | <?php echo SITE_NAME; ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/main-css/bootstrap.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/about.css">

    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/logo/<?= $favcon ?>" type="image/gif" />
    
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> -->

    <!-- Fontawsome Link -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.0/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.0/css/sharp-solid.css">

    <!-- owl stylesheets -->
    <!-- <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">

</head>

<body>
    <!-- header section start -->
    <?php require_once "partials/nav-bar.php"; ?>
    <!-- header section end -->

    <div class="bg-light about_section layout_padding p-0">
        <div class="container py-5">
            <div class="row h-100 align-items-center py-5">
                <div class="col-md-6 mb-4 mb-xl-0">
                    <h1 class="display-4">About <br><span class="fw-bold">Imagine Interior</span></h1>
                    <p class="lead text-muted mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
                </div>
                <div class="col-md-6">
                    <img src="images/about-us-main-bg.jpg" alt="" class="img-fluid about_featured_img">
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-5">
        <div class="container py-5">
            <div class="row align-items-center mb-5">
                <div class="col-md-6 order-2 order-md-1 about_sec_dsc">
                    <h2 class="font-weight-light">
                        <span>
                            <i class="fa fa-bar-chart text-primary"></i>
                        </span>
                        Explore Our Services
                    </h2>
                    <p class="font-italic text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><a href="#"
                        class="btn btn-light px-5 rounded-pill shadow-sm">Explore Now</a>
                </div>
                <div class="col-md-5 px-5 mx-auto order-1 order-md-2"><img src="images/explore-services.png" alt=""
                        class="img-fluid mb-4"></div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-5 px-5 mx-auto">
                    <img src="images/project-completed.png" alt="" class="img-fluid mb-4">
                </div>
                <div class="col-md-6 about_sec_dsc">
                    <h2 class="font-weight-light">
                        <span>
                            <i class="fa fa-leaf text-primary"></i>
                        </span>
                        Explore Our Completed Projects
                    </h2>
                    <p class="font-italic text-muted mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </p>
                    <a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Explore Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- CEO and Founders section Start  -->
    <div class="bg-light">
        <div class="container mb-5">
            <div class="row align-items-center mb-4">
                <div class="col-md-6 order-2 order-md-1 left_area about_sec_dsc">
                    <h1 class="font-weight-light">Jhon Done</h1>
                    <h3 class="text-uppercase">CEO - Founder</h3>
                    <div>
                        <ul class="social list-inline my-3">
                            <li class="list-inline-item">
                                <a href="#" class="social-link">
                                    <i class="fa-brands fa-facebook-f fs-4"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="social-link">
                                    <i class="fa-brands fa-twitter fs-4"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="social-link">
                                    <i class="fa-brands fa-instagram fs-4"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="social-link">
                                    <i class="fa-brands fa-linkedin-in fs-4"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <p class="font-italic text-muted mb-4">Lorem ipsum dolor sit, amet consectetur
                        adipisicing elit. Reprehenderit ea eaque, ipsum hic repellat rem aspernatur,
                        similique molestiae quidem voluptas itaque quia quaerat nesciunt est necessitatibus
                        odit, doloribus magni tenetur!</p>
                </div>
                <div class="col-md-5 px-5 mx-auto order-1 order-md-2 right_area">
                    <div class="bg-white rounded-sm py-5 px-4">
                        <img src="images/dummy-men.jpg" alt="" class="person_img">
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-5 px-5 mx-auto left_area">
                    <div class="bg-white rounded-sm py-5 px-4">
                        <img src="images/dummy-men.jpg" alt="" class="person_img">
                    </div>
                </div>
                <div class="col-md-6 right_area about_sec_dsc">
                    <!-- <i class="fa fa-leaf fa-2x mb-3 text-primary"></i> -->
                    <h1 class="font-weight-light">Jhon Done</h1>
                    <h3 class="text-uppercase">CEO - Founder</h3>
                    <div>
                        <ul class="social list-inline my-3">
                            <li class="list-inline-item">
                                <a href="#" class="social-link">
                                    <i class="fa-brands fa-facebook-f fs-4"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="social-link">
                                    <i class="fa-brands fa-twitter fs-4"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="social-link">
                                    <i class="fa-brands fa-instagram fs-4"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="social-link">
                                    <i class="fa-brands fa-linkedin-in fs-4"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <p class="font-italic text-muted mb-4">Lorem ipsum dolor sit, amet consectetur
                        adipisicing elit. Reprehenderit ea eaque, ipsum hic repellat rem aspernatur,
                        similique molestiae quidem voluptas itaque quia quaerat nesciunt est necessitatibus
                        odit, doloribus magni tenetur!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- CEO and Founders section End  -->

    <div class="bg-light">
        <div class="container mb-5">
            <h1 class="sec_heading">Lorem ipsum dolor sit amet.</h1>
            <p class="sec_heading_dsc mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo vel harum id
                voluptate accusantium ex?</p>
            <div class="row align-items-center mb-2">
                <div class="col-md-6 order-2 order-md-1 mt-3 mt-md-0">
                    <h1>Lorem ipsum dolor sit.</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt et praesentium, tenetur eos
                        libero consectetur. Similique in asperiores voluptatum aut illo, enim earum praesentium odio
                        alias! Voluptatem dolorem nulla itaque modi quis possimus beatae aperiam laboriosam laudantium!
                        Esse ad perferendis dolores, ducimus dolorem error illum mollitia maxime voluptatem ipsum
                        sapiente?</p>
                </div>
                <div class="col-md-6 order-1 order-md-2 mt-4 mt-md-0">
                    <div class="about_sec_img">
                        <img src="images/about-us-main-bg.jpg" alt="">
                    </div>
                </div>
            </div>


            <div class="row align-items-center mb-2">
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="about_sec_img">
                        <img src="images/about-us-main-bg.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                    <h1>Lorem ipsum dolor sit.</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt et praesentium, tenetur eos
                        libero consectetur. Similique in asperiores voluptatum aut illo, enim earum praesentium odio
                        alias! Voluptatem dolorem nulla itaque modi quis possimus beatae aperiam laboriosam laudantium!
                        Esse ad perferendis dolores, ducimus dolorem error illum mollitia maxime voluptatem ipsum
                        sapiente?</p>
                </div>
            </div>

            <div class="row align-items-center mb-2">
                <div class="col-md-6 order-2 order-md-1 mt-3 mt-md-0">
                    <h1>Lorem ipsum dolor sit.</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt et praesentium, tenetur eos
                        libero consectetur. Similique in asperiores voluptatum aut illo, enim earum praesentium odio
                        alias! Voluptatem dolorem nulla itaque modi quis possimus beatae aperiam laboriosam laudantium!
                        Esse ad perferendis dolores, ducimus dolorem error illum mollitia maxime voluptatem ipsum
                        sapiente?</p>
                </div>
                <div class="col-md-6 order-1 order-md-2 mt-4 mt-md-0">
                    <div class="about_sec_img">
                        <img src="images/about-us-main-bg.jpg" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- footer section start -->
    <?php require_once "partials/footer.php"; ?>
    <!--  footer section end -->

    <!--Bootstrap Css -->
    <script src="js/main-js/bootstrap.js"></script>
</body>

</html>