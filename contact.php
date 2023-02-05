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
    <title>Contact | <?php echo SITE_NAME; ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/main-css/bootstrap.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/contact-us.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <!-- <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css"> -->
    <!-- Tweaks for older IEs-->
    <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> -->
    <!-- owl stylesheets -->
    <!-- <link rel="stylesheet" href="css/owl.carousel.min.css"> -->
    <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" 
        media="screen">-->
</head>

<body>
    <!-- header section start -->
    <?php require_once "partials/nav-bar.php"; ?>
    <!-- header section end -->


    <!-- contact section start -->
    <!-- Details Section Start -->
    <div class="contact1 contact_section layout_padding mt-5">
        <div class="container-contact1">

            <!-- Address Section Start -->
            <div class="contact_left">
                <!-- <img src="images/img-01.png" alt="IMG"> -->
                <h1>Visit Us</h1>
                <p><a href=""><img class="" src="images/icons/call-icon-dark.png" alt=""> 76997753019</a></p>
                <p><a href=""><img class="" src="images/icons/mail-icon-black.png" alt="">imagineinterior@gmail.com</a>
                </p>
                <p><a href=""><img class="" src="images/icons/location-icon-black.png" alt="">Chapadali, Barasat
                        <br> Kolkata, 700124
                        <br> West Bengal, India</a>
                </p>
            </div>
            <!-- Address Section End -->

            <!-- Form Section Start -->
            <form class="contact1-form validate-form contact_right">
                <span class="contact1-form-title">
                    Get in touch
                </span>

                <div class="wrap-input1 validate-input" data-validate="Name is required">
                    <input class="input1" type="text" name="name" placeholder="Name">
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input1" type="text" name="email" placeholder="Email">
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1 validate-input" data-validate="Subject is required">
                    <input class="input1" type="text" name="subject" placeholder="Subject">
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1 validate-input" data-validate="Message is required">
                    <textarea class="input1" name="message" placeholder="Message"></textarea>
                    <span class="shadow-input1"></span>
                </div>

                <div class="container-contact1-form-btn">
                    <button class="contact1-form-btn">
                        <span>
                            Send Email
                        </span>
                    </button>
                </div>
            </form>
            <!-- Form Section Start -->

        </div>
    </div>
    <!-- Details Section End -->

    <!-- map section start -->
    <div class="new_section">
        <div class="map_section">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3473.7011682262305!2d88.4842418475273!3d22.718644828592705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f8a20f8a036465%3A0x86863ea8c2927419!2sSuncity%20Mall!5e0!3m2!1sen!2sin!4v1666609689659!5m2!1sen!2sin"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <!-- map section end -->
    <!-- contact section start -->




    <!-- footer section start -->
    <?php require_once "partials/footer.php"; ?>
    <!--  footer section end -->

    <!--Bootstrap Css -->
    <script src="js/main-js/bootstrap.js"></script>
</body>

</html>