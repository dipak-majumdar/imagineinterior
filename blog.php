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
</head>

<body>
    <!-- header section start -->
    <?php require_once "partials/nav-bar.php"; ?>
    <!-- header section end -->

    <!-- furnitures section start -->
    <div class="new_section mt-5">
        <div class="blog_construction">
            <div class="row">
                <div class="col-lg-5 d-flex align-items-center | justify-content-lg-start justify-content-center | order-2 order-lg-1">
                    <div class="d-flex flex-column">
                        <div>
                            <h1 class="coming_soon"><?= SITE_NAME ?> Blog <br> Coming Soon...</h1>
                            <!-- <p class="coming_soon_dsc">"Exciting news! Our Imagine Interior website blog is currently in the works and will be launching soon. Stay tuned as we prepare to bring you a wealth of inspiration and insights into the world of interior design. Thank you for your patience as we put the finishing touches on our upcoming blog!"</p> -->
                        </div>

                        <div class="mail_req">
                            <h3>Request For Notification</h3>
                            <div class="d-flex flex-column">
                                <input type="text" placeholder="Enter Your Mail" id="main-subscribe">
                                <button type="button" onclick="subscribeMail()">Get Notified</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 order-1 order-lg-2">
                    <img src="<?= IMGURL ?>constructing-bg.jpg" alt="">
                </div>
            </div>

        </div>
    </div>
    <!-- footer section start -->
    <?php require_once "partials/footer.php"; ?>
    <!--  footer section end -->
    <!--Bootstrap Css -->
    <script src="js/main-js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="vendors/ajax.custom-lib.js"></script>
    <script src="js/script.js"></script>

</body>

</html>