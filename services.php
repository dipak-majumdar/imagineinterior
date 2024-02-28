<?php
require_once "./inc/reqHeader.php";

require_once "./classes/services.class.php";
require_once "./classes/projects.class.php";


$Services   = new Services();
$Projects   = new Projects;

$allServices    = $Services->activeServices();
$images         = $Projects->showRandomImages();

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
    <!-- fevicon -->
    <link rel="icon" href="<?= URL ?>logo/<?= $favcon ?>" type="image/gif" />
    <!-- fevicon -->
    <link rel="icon" href="<?= URL ?>logo/<?= $favcon ?>" type="image/gif" />

    <!-- site metas -->
    <title>Services - <?php echo SITE_NAME; ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/main-css/bootstrap.css">

    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="<?= URL ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= URL ?>css/services.css">
    <link rel="stylesheet" type="text/css" href="<?= URL ?>css/custom-style.css">
    <link rel="stylesheet" type="text/css" href="<?= URL ?>css/portfolio.css">

    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">
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

    <!-- services section start -->
    <div class="mt-5">
        <?php // require_once "incs/our-services.php"; ?>
        <div class="page_heading_sec mb-3 p-5">
            <h1 class="sec_heading">our services</h1>
            <p class="sec_heading_dsc">There are many variations of passages of Lorem Ipsum </p>
        </div>
        <div class="services_section layout_padding pt-0">
            <div class="container">

                <div class="new_section sub_layout_padding">
                    <h3 class="text-center text-md-start fs-3">Elevate Your Space: Interior Designing and Decoration Services in Kolkata</h3>
                    <p class="small_para">Welcome to our Interior Designing and Decoration Services in Kolkata! Transform your living or working space into a personalized sanctuary that reflects your style and enhances functionality. Our team of expert designers is here to guide you through every step of the process, from conceptualization to execution, ensuring a seamless experience and stunning results..</p>
                </div>
                <div class="new_section sub_layout_padding p-0">
                    <div class="row justify-content-evenly">
                        <?php
                            foreach ($allServices as $eachSearvice) {
                                echo '<div class="col-lg-3 col-sm-6 py-4">
                                        <a href="'.URL.'service/'.$eachSearvice['slug'],'">
                                            <div class="service_icon_bx">
                                                <img src="'.IMGURL.'services/'.$eachSearvice['icon'].'">
                                            </div>
                                            <h2 class="service_name">'.$eachSearvice['name'].'</h2>
                                            <p class="service_dsc text-center">'.$eachSearvice['descreption'].'</p>
                                        </a>
                                    </div>';
                            }
                            ?>
                    </div>
                </div>

                <div class="services_section3 sub_layout_padding">

                    <div class="new_section mb-4 pt-0">
                        <h3 class="fs-3 text-center text-md-start">Why Choose Our Services?</h3>
                        <p class="small_para">
                            <ul>
                                <li><b>Personalized Approach:</b> We tailor our designs to your unique preferences, ensuring that your space reflects your personality and lifestyle.</li>
                                <li><b>Professional Expertise:</b> Our team consists of experienced designers with a keen eye for detail and a passion for creating beautiful, functional spaces.</li>
                                <li><b>Quality Materials:</b> We use only the highest quality materials and furnishings to ensure durability, longevity, and aesthetic appeal.</li>
                                <li><b>Budget-Friendly Solutions:</b> We work within your budget constraints to deliver exceptional results without breaking the bank.</li>
                            </ul>
                        </p>
                    </div>

                    <div class="new_section mb-4 pt-0">
                        <h3 class="fs-3 text-center text-md-start">Our Services</h3>
                        <p class="small_para">
                            <ul>
                                <li>Interior Design Consultation</li>
                                <li>Space Planning and Layout</li>
                                <li>Furniture Selection and Placement</li>
                                <li>Color Consultation</li>
                                <li>Lighting Design</li>
                                <li>Custom Window Treatments</li>
                                <li>Accessory and Art Selection</li>
                            </ul>
                        </p>
                    </div>

                    <div class="portfolio-item row">
                        <?php
                        foreach ($images as $eachImage) {
                            $altName 		= pathinfo($eachImage, PATHINFO_FILENAME);
                            echo '
                            <div class="item selfie col-sm col-6 col-md-4 col-lg-3">
                                <a href="'.IMGURL.'projects/'.$eachImage.'"
                                    class="fancylight popup-btn" data-fancybox-group="light">
                                    <img class="img-fluid image_fit"
                                        src="'.IMGURL.'projects/'.$eachImage.'"
                                        alt="'.$altName.'">
                                </a>
                            </div>
                            ';
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="new_section layout_padding px-2 px-md-0">
        <div class="">
            <!-- bg_dark_white -->
            <div class="container">
                <h2 class="sub_headig fs-2 fw-semibold">FAQs</h2>
                <p class="sec_heading_dsc">Got questions about our process, timelines, or budget? We've got you covered! Explore our FAQs to learn how we can transform your space into your dream sanctuary. Ready to start? Let's dive in!
                </p>
            </div>

            <div class="container-fluid">
                <div class="row justify-content-center mt-4">

                    <div class="col-12 col-md-5 m-2 mini_sec">
                        <div class="d-sm-none d-block">
                            <img src="<?= IMGURL ?>icons/question-mark-red-bg.png" alt="">
                        </div>
                        <h4 class="fs-4 text-center text-md-start">What is the difference between interior design and interior decoration?</h4>
                        <div class="d-flex align-items-center">
                            <img class="d-none d-sm-inline-flex" src="<?= IMGURL ?>icons/question-mark-red-bg.png" alt="">
                            <p class="">Interior designing involves planning and designing the layout of a space, including architectural elements, while interior decoration focuses on selecting and arranging furnishings, colors, and accessories to enhance the aesthetics of the space.</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-5 m-2 mini_sec">
                        <div class="d-sm-none d-block">
                            <img src="<?= IMGURL ?>icons/question-mark-red-bg.png" alt="">
                        </div>
                        <h4 class="fs-4">How long does the interior design process take?</h4>
                        <div class="d-flex align-items-center">
                            <img class="d-none d-sm-inline-flex" src="<?= IMGURL ?>icons/question-mark-red-bg.png" alt="">
                            <p class="">The duration of the interior design process varies depending on the scope of the project and the client's timeline. On average, it can take anywhere from a few weeks to several months from initial consultation to project completion.</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-5 m-2 mini_sec">
                        <div class="d-sm-none d-block">
                            <img src="<?= IMGURL ?>icons/question-mark-red-bg.png" alt="">
                        </div>
                        <h4 class="fs-4">Do I need to purchase new furniture for my space?</h4>
                        <div class="d-flex align-items-center">
                            <img class="d-none d-sm-inline-flex" src="<?= IMGURL ?>icons/question-mark-red-bg.png" alt="">
                            <p class="">Not necessarily. Our designers can work with your existing furniture and suggest ways to repurpose or reupholster pieces to fit the new design scheme.</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-5 m-2 mini_sec">
                        <div class="d-sm-none d-block">
                            <img src="<?= IMGURL ?>icons/question-mark-red-bg.png" alt="">
                        </div>
                        <h4 class="fs-4">Can you work with a limited budget?</h4>
                        <div class="d-flex align-items-center">
                            <img class="d-none d-sm-inline-flex" src="<?= IMGURL ?>icons/question-mark-red-bg.png" alt="">
                            <p class="">Absolutely! We understand that every client has different budgetary constraints, and we strive to deliver innovative solutions that meet your needs without compromising on quality.</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-5 m-2 mini_sec">
                        <div class="d-sm-none d-block">
                            <img src="<?= IMGURL ?>icons/question-mark-red-bg.png" alt="">
                        </div>
                        <h4 class="fs-4">Do you provide 3D visualizations of the proposed design?</h4>
                        <div class="d-flex align-items-center">
                            <img class="d-none d-sm-inline-flex" src="<?= IMGURL ?>icons/question-mark-red-bg.png" alt="">
                            <p class="">Yes, we offer 3D renderings to help you visualize the proposed design and make informed decisions before implementation.</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-5 m-2 mini_sec">
                        <div class="d-sm-none d-block">
                            <img src="<?= IMGURL ?>icons/question-mark-red-bg.png" alt="">
                        </div>
                        <h4 class="fs-4">Can you incorporate sustainable design practices into my space?</h4>
                        <div class="d-flex align-items-center">
                            <img class="d-none d-sm-inline-flex" src="<?= IMGURL ?>icons/question-mark-red-bg.png" alt="">
                            <p class="">Yes, we are committed to promoting sustainable design practices and can incorporate eco-friendly materials and solutions into your design.</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-5 m-2 mini_sec">
                        <div class="d-sm-none d-block">
                            <img src="<?= IMGURL ?>icons/question-mark-red-bg.png" alt="">
                        </div>
                        <h4 class="fs-4">Do I need to be present during the design process?</h4>
                        <div class="d-flex align-items-center">
                            <img class="d-none d-sm-inline-flex" src="<?= IMGURL ?>icons/question-mark-red-bg.png" alt="">
                            <p class="">While your input and feedback are valuable to us, you do not need to be present throughout the entire design process. We will keep you updated on progress and consult with you as needed.</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-5 m-2 mini_sec">
                        <div class="d-sm-none d-block">
                            <img src="<?= IMGURL ?>icons/question-mark-red-bg.png" alt="">
                        </div>
                        <h4 class="fs-4">Can you work with a specific design style?</h4>
                        <div class="d-flex align-items-center">
                            <img class="d-none d-sm-inline-flex" src="<?= IMGURL ?>icons/question-mark-red-bg.png" alt="">
                            <p class="">Yes, our designers are proficient in a wide range of design styles, from traditional to contemporary, and can accommodate your preferences.</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-5 m-2 mini_sec">
                        <div class="d-sm-none d-block">
                            <img src="<?= IMGURL ?>icons/question-mark-red-bg.png" alt="">
                        </div>
                        <h4 class="fs-4">What happens if I am not satisfied with the final design?</h4>
                        <div class="d-flex align-items-center">
                            <img class="d-none d-sm-inline-flex" src="<?= IMGURL ?>icons/question-mark-red-bg.png" alt="">
                            <p class="">Customer satisfaction is our top priority. If you are not satisfied with the final design, we will work with you to make revisions until you are happy with the results..</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="new_section layout_padding px-2 px-md-0">
        <?php require_once "incs/lets-talk-sec.php"; ?>
    </div>

    <!-- footer section start -->
    <?php require_once "partials/footer.php"; ?>
    <!--  footer section end -->

    <!--Bootstrap Css -->
    <script src="js/main-js/bootstrap.js"></script>
</body>

</html>