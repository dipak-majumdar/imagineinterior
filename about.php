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
                    <p class="font-italic text-muted mb-4">Welcome to the <strong class="fw-semibold">IMAGINE
                            INTERIOR</strong>, where we transform spaces
                        into extraordinary living experiences. With a passion for design and a keen eye for detail, we
                        bring dreams to life within the walls of your home.</p><a href="<?= URL ?>"
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
                        Embark on a journey through our completed projects, revealing stories of design mastery and
                        client satisfaction. Each space is a testament to our commitment to excellence.
                    </p>
                    <a href="<?= URL ?>services" class="btn btn-light px-5 rounded-pill shadow-sm">Explore Now</a>
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
            <h1 class="sec_heading">What Makes Us Special ?</h1>
            <p class="sec_heading_dsc mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo vel harum id
                voluptate accusantium ex?</p>
            <div class="row align-items-center mb-2">
                <div class="col-md-6 order-2 order-md-1 mt-3 mt-md-0">
                    <h1>Crafting Timeless Spaces with Imagine Interior</h1>
                    <p>At Imagine Interior, we believe every space has a story. Our team of seasoned designers and
                        architects work tirelessly to understand your unique vision, integrating functionality with
                        aesthetics to create everywhere that truly resonates with you.</p>

                    <p>With years of experience in the industry, we&#39;ve honed our skills across various styles, from
                        modern chic to timeless elegance. Our expertise extends beyond aesthetics; we take pride in
                        crafting designs that seamlessly integrate with your lifestyle. And it ensures comfort and
                        practicality are never compromised.</p>
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
                    <h1>Designing Together: Transparent Collaboration</h1>
                    <p>Transparency and collaboration are at the heart of our work approach. We value your input
                        of emotions and staying with you in every step of the design journey, from concept to
                        execution. Thus, this ensures that not only does the final result meet, but we will respect
                        your expectations.</p>
                </div>
            </div>

            <div class="row align-items-center mb-2">
                <div class="col-md-6 order-2 order-md-1 mt-3 mt-md-0">
                    <h1>Explore Now: West Bengal to India</h1>
                    <p>However, we believe that sustainability is more than a craze; it&#39;s a loyalty. We provide our
                        services in West Bengal, and all over India.
                        We invite you to explore our portfolio and let our work speak for you. Whether revamping a
                        single room or transforming an entire home, trust Imagine Interior to turn your vision into a
                        living reality.</p>
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