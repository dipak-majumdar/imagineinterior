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
    <title>Portfolio | <?php echo SITE_NAME; ?></title>
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
    <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> -->
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


    <!-- portfolio section start  -->
    <div class="portfolio_section px-2 px-md-0 pb-4 mt-5">
        <div class="container">

            <!-- row start -->
            <div class="row">
                <!-- Category column start -->
                <div class="col-md-12 text-center mb-5">
                    <?php
                if (count($showServices) > 0) {
                ?>
                    <button type="button" class="btn btn-outline-primary mt-2 filter mx_sm_gp"
                        data-rel="all">All</button>
                    <?php
                        foreach ($showServices as $eachService) {
                            // print_r($eachChild['name']);
                            echo '
                            <button type="button" class="btn btn-outline-primary mt-2 filter mx_sm_gp" data-rel="'.$eachService['id'].'">'.$eachService['name'].'</button>
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
                        <div class="mb-3 pics animation all '.$eachChild['parent_id'].'">
                    <a href="projects.php?cservice='.$eachChild['id'].'">
                        <img class="img-fluid"
                            src="images/services/'.$img.'"
                            alt="Card image cap">

                        <section class="img_text">
                            <h3 class="text-light mt-auto">'.$eachChild['name'].'</h3>
                            <small class="text-light ">12 Aug, 2022</small>
                        </section>
                    </a>
                </div>
                        ';
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

    <!-- copyright section end -->
    <!-- Javascript files-->
    <!-- <script src="js/jquery-3.0.0.min.js"></script> -->

    <!--Bootstrap Css -->
    <script src="js/main-js/bootstrap.js"></script>

    <script src="js/jquery.min.js"></script>
    <!-- <script src="js/popper.min.js"></script> -->
    <!-- <script src="js/jquery-3.0.0.min.js"></script> -->
    <!-- <script src="js/plugin.js"></script> -->
    <!-- sidebar -->
    <!-- <script src="js/jquery.mCustomScrollbar.concat.min.js"></script> -->
    <!-- <script src="js/custom.js"></script> -->
    <!-- javascript -->
    <!-- <script src="js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> -->



    <script>
    $(function() {
        var selectedClass = "";
        $(".filter").click(function() {
            selectedClass = $(this).attr("data-rel");
            $("#gallery").fadeTo(100, 0.1);
            $("#gallery div").not("." + selectedClass).fadeOut().removeClass('animation');
            setTimeout(function() {
                $("." + selectedClass).fadeIn().addClass('animation');
                $("#gallery").fadeTo(300, 1);
            }, 300);
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