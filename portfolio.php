<?php
require_once "./inc/reqHeader.php";

require_once "./classes/services.class.php";

$Services   = new Services();

$showServices = $Services->showServices();
$childServices = $Services->showChildServices();

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
    <title>Portfolio - <?php echo SITE_NAME; ?></title>
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
    <link rel="icon" href="images/logo/<?= $favcon ?>" type="image/gif" />

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

    <style>
        button:active {
            background-color: blueviolet;
        }
    </style>
</head>

<body>
    <!-- header section start -->
    <?php require_once "partials/nav-bar.php"; ?>
    <!-- header section end -->

    <div class="mt-5">
        <div class="page_heading_sec mt-2 mt-md-3 mb-3 p-5">
            <h1 class="sec_heading">our portfolio</h1>
            <p class="sec_heading_dsc">There are many variations of passages of Lorem Ipsum </p>
        </div>
    </div>

    <!-- portfolio section start  -->
    <div class="portfolio_section px-2 px-md-0 pb-4 pt-0">
        <div class="container">

            <!-- row start -->
            <div class="row">
                <!-- Category column start -->
                <div class="col-md-12 text-center mb-5" id="btnsDiv">
                    <?php
                    if (count($showServices) > 0) {
                    ?>
                        <button type="button" class="btn btn-outline-primary rounded-0 mt-2 filter mx_sm_gp" data-rel="all">All</button>
                    <?php
                        foreach ($showServices as $eachService) {

                            echo '
                            <button type="button" class="btn btn-outline-primary rounded-0 mt-2 filter mx_sm_gp" data-rel="' . $eachService['id'] . '">' . $eachService['name'] . '</button>
                            ';
                        }
                    }
                    ?>
                </div>
                <!-- Category column start -->

            </div>
            <!-- row end -->

            <!-- Gallery start -->
            <div class="gallery" id="gallery">

                <?php
                foreach ($childServices as $eachChild) {
                    // print_r($eachChild);
                    $img = $eachChild['feature_image'];
                    if ($img == null) {
                        $img = $eachChild['icon'];
                    }

                    echo '
                        <div class="mb-3 pics animation all ' . $eachChild['parent_id'] . '">
                            <a href="projects/' . $eachChild['slug'] . '">
                                <img class="img-fluid"
                                    src="' . IMGURL . 'services/' . $img . '"
                                    alt="Card image cap">

                                <section class="img_text">
                                    <h3 class="text-light mt-auto">' . $eachChild['name'] . '</h3>
                                    <small class="text-light ">12 Aug, 2022</small>
                                </section>
                            </a>
                        </div>
                        ';
                }

                foreach ($showServices as $eachService) {
                    $imageResponse = $Services->showServiceGallery($eachService['id']);
                    if ($imageResponse['status'] == 1 && !empty($imageResponse['result'])) {
                        foreach ($imageResponse['result'] as $eachImage) {

                            echo '
                                <div class="mb-3 pics animation all ' . $eachService['id'] . '">
                                    <a href="' . URL . 'service/' . $eachService['slug'] . '">
                                        <img class="img-fluid"
                                            src="' . IMGURL . 'services/' . $eachImage . '"
                                            alt="Card image cap">
                                    </a>
                                </div>';
                        }
                    }
                }
                ?>

            </div>
            <!-- Gallery end -->
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
    <script src="js/main-js/bootstrap.js"></script>

    <script src="js/jquery.min.js"></script>

    <!-- btnsDiv -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var selectedClass = "";
            var filterButtons = document.querySelectorAll(".filter");
            var gallery = document.getElementById("gallery");
            var galleryItems = gallery.querySelectorAll("div");

            filterButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    // Remove btn-primary class from all buttons
                    filterButtons.forEach(function(btn) {
                        btn.classList.remove("btn-primary");
                        btn.classList.add("btn-outline-primary");
                    });

                    // Add btn-primary class to the clicked button
                    this.classList.add("btn-primary");
                    this.classList.remove("btn-outline-primary");

                    selectedClass = this.getAttribute("data-rel");
                    gallery.style.opacity = 0.1;

                    galleryItems.forEach(function(item) {
                        if (!item.classList.contains(selectedClass)) {
                            item.style.display = "none";
                            item.classList.remove('animation');
                        }
                    });

                    setTimeout(function() {
                        galleryItems.forEach(function(item) {
                            if (item.classList.contains(selectedClass)) {
                                item.style.display = "block";
                                item.classList.add('animation');
                            }
                        });
                        gallery.style.opacity = 1;
                    }, 300);
                });
            });
        });
    </script>

    </script>

    <script>
        const greenIcon = (t) => {
            t.firstChild.src = "images/icons/call-icon-green.png";
        }

        const whiteIcon = (t) => {
            t.firstChild.src = "images/icons/call-icon-white.png";
        }
    </script>

</body>

</html>