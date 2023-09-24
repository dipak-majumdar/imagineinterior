<?php
require_once "./inc/reqHeader.php";

require_once "./classes/services.class.php";


$Services   = new Services();


$allServices = $Services->activeServices();
$showServices = $Services->showServices();
$childServices = $Services->showChildServicesByLimit(12);



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
    <title>Interior Design</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/main-css/bootstrap.css">


    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/custom-style.css">
    <link rel="stylesheet" type="text/css" href="css/contact.css">
    <link rel="stylesheet" type="text/css" href="css/services.css">
    <link rel="stylesheet" type="text/css" href="css/portfolio.css">
    <link rel="stylesheet" type="text/css" href="css/testimonial.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css">

    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/logo/<?= $favcon ?>" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Scrollbar Custom CSS -->
    <!-- <link rel="stylesheet" href="vendors/sweetalert2/dist/sweetalert2.css"> -->
    <!-- Tweaks for older IEs-->
    <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> -->
    <!-- owl stylesheets -->
    <!-- <link rel="stylesheet" href="css/owl.carousel.min.css"> -->
    <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"media="screen"> -->
</head>

<body onload="load()">
    <!-- header section start -->
    <?php require_once "partials/nav-bar.php"; ?>
    <!-- header section end -->



    <!-- banner section start -->
    <div class="banner_section layout_padding mt-5">
        <!-- d-flex -->
        <div class="container row m-auto">
            <div class="col-md-5 banner_left">
                <div class="header_form">
                    <div class="frm_heading">
                        <h2 class="text-center">Talk to designer</h2>
                    </div>
                    <form action="ajax/query-form-submit.ajax.php" method="POST" class="g-3 needs-validation"
                        novalidate>
                        <div class="mb-2">
                            <input type="text" class="custom_inp form-control" id="" placeholder="Name" name="name"
                                required>
                            <div class="invalid-feedback">
                                Name can't be blank!
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-2">
                            <input type="text" class="custom_inp form-control" id="" name="contact"
                                placeholder="Contact No" required>
                            <div class="invalid-feedback">
                                Contact no can't be blank!
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-2">
                            <input type="email" class="custom_inp form-control" id="" name="email" placeholder="Email">
                            <div class="valid-feedback">
                                Email is optional!
                            </div>
                        </div>
                        <div class="mb-2">
                            <select class="custom_inp form-select" name="design-for" id="" required>
                                <option selected disabled value="">Design for</option>
                                <option value="Home">Home</option>
                                <option value="office">Office</option>
                                <option value="outdore">Outdore</option>
                                <option value="others">Others</option>
                            </select>
                            <div class="invalid-feedback">
                                Please choose one.
                            </div>
                        </div>
                        <div class="mb-2">
                            <select class="custom_inp form-select" name="budget" id="" required>
                                <option selected disabled value="">Budget</option>
                                <option value="1L">1L</option>
                                <option value="2L">2L</option>
                                <option value="Not Fixed">Not Fixed</option>
                            </select>
                            <div class="invalid-feedback">
                                Please choose one.
                            </div>
                        </div>
                        <div class="mb-2">
                            <?php
                        if (isset($_GET['qform'])) {
                            if ($_GET['qform'] == 1) {
                                echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <strong>Thank You!</strong> We will get back to  you soon.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }
                        }
                        ?>
                        </div>
                        <div class="m_frm_btn d-flex my-3">
                            <button class="m-auto" type="submit">Submit</button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="col-md-7 banner_right">
                <div class="header_banner">
                    <div class="banner_text">
                        <h2 class="banner_main_text">Lorem ipsum dolor</h2>
                        <p class="banner_dsc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati,
                            suscipit?</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- banner section end -->


    <!-- portfolio section start  -->
    <?php require_once 'incs/portfolio.inc.php'; ?>
    <!-- portfolio section end  -->

    <!-- services section start -->
    <?php require_once "incs/our-services.php"; ?>
    <!-- services section end -->

    <!-- planning section start  -->
    <div class="new_section layout_padding">
        <div class="container">
            <h1 class="sec_heading">How we deliver</h1>
            <p class="sec_heading_dsc mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum error similique ullam.</p>
            <div class="row justify-content-center sub_layout_padding">
                <div class="col-9 col-md-3 p-2">

                    <div class="text-center px-2 py-5 my_card">
                        <div class="planning_icon">
                            <img src="images/planning/planning.png" alt="" class="plan_sec_img">
                        </div>
                        <h3 class="mt-3 pb-0">Planning</h3>
                        <span class="planning_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt,
                            aut!</span>
                    </div>

                </div>
                <div class="col-9 col-md-3 p-2">

                    <div class="text-center px-2 py-5 my_card">
                        <div class="planning_icon">
                            <img src="images/planning/designing.png" alt="" class="plan_sec_img">
                        </div>
                        <h3 class="mt-3 pb-0">Designing</h3>
                        <span class="planning_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt,
                            aut!</span>
                    </div>

                </div>
                <div class="col-9 col-md-3 p-2">

                    <div class="text-center px-2 py-5 my_card">
                        <div class="planning_icon">
                            <img src="images/planning/building.png" alt="" class="plan_sec_img">
                        </div>
                        <h3 class="mt-3 pb-0">Building</h3>
                        <span class="planning_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt,
                            aut!</span>
                    </div>

                </div>
                <div class="col-9 col-md-3 p-2">

                    <div class="text-center px-2 py-5 my_card">
                        <div class="planning_icon">
                            <img src="images/planning/delivery.png" alt="" class="plan_sec_img">
                        </div>
                        <h3 class="mt-3 pb-0">Delivery</h3>
                        <span class="planning_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt,
                            aut!</span>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <!-- planning section end  -->




    <!-- planning section start  -->
    <div class="new_section layout_padding">
        <div class="container">
            <h1 class="sec_heading">Our Numbers</h1>
            <p class="sec_heading_dsc mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum error similique ullam.</p>

            <div class="row justify-content-center sub_layout_padding counter_sec">

                <div class="col-8 col-md-3 p-2">
                    <div class="border text-center number_card"
                        style="border-radius: 25% 75% 44% 56% / 29% 30% 70% 71% ;">
                        <div class="counter_img">
                            <img src="images/icons/calender.png" alt="" class="plan_sec_img">
                        </div>
                        <h1 class="text-dark pt-3"><span id='years'>0</span>+</h1>
                        <h3 class="pb-0">Years of experience</h3>
                    </div>
                </div>

                <div class="col-8 col-md-3 p-2">
                    <div class="border text-center number_card"
                        style="border-radius: 45% 75% 44% 61% / 61% 49% 72% 62%;">
                        <div class="counter_img">
                            <img src="images/icons/projects.png" alt="" class="plan_sec_img">
                        </div>
                        <h1 class="text-dark pt-3"><span id='projects'>0</span>+</h1>
                        <h3 class="pb-0">Completed Projects</h3>
                    </div>
                </div>

                <div class="col-8 col-md-3 p-2">
                    <div class="border text-center number_card"
                        style="border-radius: 91% 39% 70% 56% / 56% 89% 44% 71%;">
                        <div class="counter_img">
                            <img src="images/icons/handshake.png" alt="" class="plan_sec_img">
                        </div>
                        <h1 class="text-dark pt-3"> <span id='clients'>12</span>+</h1>
                        <h3 class="pb-0">Happy Clients</h3>
                    </div>
                </div>

                <div class="col-8 col-md-3 p-2">
                    <div class="border text-center number_card"
                        style="border-radius: 75% 25% 44% 56% / 29% 30% 69% 71%;">
                        <div class="counter_img">
                            <img src="images/icons/team - 2.png" alt="" class="plan_sec_img">
                        </div>
                        <h1 class="text-dark pt-3"><span id='experts'>0</span>+</h1>
                        <h3 class="pb-0">Desining experts</h3>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- planning section end  -->


    <!-- client section start -->
    <div class="new_section layout_padding">
        <div class="container">
            <h1 class="sec_heading">Our Claient Says</h1>
            <p class="sec_heading_dsc mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum error
                similique ullam.</p>

            <div class="row sub_layout_padding counter_sec">

                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner testimonial_sec">
                        <div class="carousel-item active">
                            <img class="testimonial_img" src="images/img-8.png" alt="">
                            <h2 class="testimonial_heading">Rahul Majumdar</h2>
                            <blockquote class="testimonial_quote">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem odit consectetur
                                aperiam eius ullam molestiae quis, quidem, animi reprehenderit tenetur iste
                                distinctio autem. Ea unde consectetur, corrupti quas vel natus?
                            </blockquote>
                        </div>
                        <div class="carousel-item">
                            <img class="testimonial_img" src="images/img-8.png" alt="">
                            <h2 class="testimonial_heading">Rahul Majumdar</h2>
                            <blockquote class="testimonial_quote">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem odit consectetur
                                aperiam eius ullam molestiae quis, quidem, animi reprehenderit tenetur iste
                                distinctio autem. Ea unde consectetur, corrupti quas vel natus?
                            </blockquote>
                        </div>
                        <div class="carousel-item">
                            <img class="testimonial_img" src="images/img-8.png" alt="">
                            <h2 class="testimonial_heading">Rahul Majumdar</h2>
                            <blockquote class="testimonial_quote">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem odit consectetur
                                aperiam eius ullam molestiae quis, quidem, animi reprehenderit tenetur iste
                                distinctio autem. Ea unde consectetur, corrupti quas vel natus?
                            </blockquote>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- client section end -->


    <!-- contact section start -->
    <div class="new_section layout_padding">
        <div class="container">
            <h1 class="sec_heading">Our Claient Says</h1>
            <p class="sec_heading_dsc mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum error
                similique ullam.</p>
            <div class="sub_layout_padding">
                <?php require_once "incs/contact-form.php"; ?>
            </div>
        </div>
    </div>

    <!-- contact section end -->

    <!-- Feedback Button Start -->
    <!-- <style>
    #mybutton {
        position: fixed;
        bottom: -4px;
        right: 10px;
    }

    .feedback {
        background-color: #31B0D5;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
        border-color: #46b8da;
    }
    </style>
    <div id="mybutton">
        <button class="feedback">Feedback</button>
    </div> -->
    <!-- Feedback Button Start -->

    <!-- footer section start -->
    <?php require_once "partials/footer.php"; ?>
    <!--  footer section end -->

    <script src="js/jquery.min.js"></script>

    <script>
    // $('#purpose').select2({
    //     dropdownParent: $('#myModal')
    // });
    </script>
    <script>
    function animate(obj, initVal, lastVal, duration) {
        let startTime = null;

        //get the current timestamp and assign it to the currentTime variable
        let currentTime = Date.now();

        //pass the current timestamp to the step function
        const step = (currentTime) => {

            //if the start time is null, assign the current time to startTime
            if (!startTime) {
                startTime = currentTime;
            }

            //calculate the value to be used in calculating the number to be displayed
            const progress = Math.min((currentTime - startTime) / duration, 1);

            //calculate what to be displayed using the value gotten above
            obj.innerHTML = Math.floor(progress * (lastVal - initVal) + initVal);

            //checking to make sure the counter does not exceed the last value (lastVal)
            if (progress < 1) {
                window.requestAnimationFrame(step);
            } else {
                window.cancelAnimationFrame(window.requestAnimationFrame(step));
            }
        };
        //start animating
        window.requestAnimationFrame(step);
    }
    let years = document.getElementById('years');
    let projects = document.getElementById('projects');
    let clients = document.getElementById('clients');
    let experts = document.getElementById('experts');
    const load = () => {
        animate(years, 0, 5, 3000);
        animate(projects, 0, 250, 7000);
        animate(clients, 0, 110, 7000);
        animate(experts, 0, 25, 5000);

    }
    </script>

    <script>
    const greenIcon = (t) => {
        t.firstChild.src = "images/icons/call-icon-green.png";
    }

    const whiteIcon = (t) => {
        t.firstChild.src = "images/icons/call-icon-white.png";
    }
    </script>

    <script>
    const reset = () => {
        // document.getElementById("myForm").;
        document.forms["contactForm"].reset();

    }
    const validateForm = () => {

        let formBox = document.forms["contactForm"];

        let name = document.forms["contactForm"]["name"].value;
        if (name == "") {
            formBox.childNodes[1].childNodes[3].classList.remove("d-none");
            return false;
        }
        if (name != "") {
            formBox.childNodes[1].childNodes[3].classList.add("d-none");
        }

        let email = document.forms["contactForm"]["email"].value;
        if (email == "") {
            formBox.childNodes[3].childNodes[3].classList.remove("d-none")
            return false;
        }
        if (email != "") {
            formBox.childNodes[3].childNodes[3].classList.add("d-none");
        }

        let contNo = document.forms["contactForm"]["contact-no"].value;
        if (contNo == "") {
            formBox.childNodes[5].childNodes[3].classList.remove("d-none")
            return false;
        }
        if (contNo != "") {
            if (contNo.length < 10 || contNo.length > 10) {
                formBox.childNodes[5].childNodes[3].classList.remove("d-none")
                return false;
            } else {
                formBox.childNodes[5].childNodes[3].classList.add("d-none")
            }
        }

        let msg = document.forms["contactForm"]["msg"].value;
        if (msg == "") {
            formBox.childNodes[7].childNodes[3].classList.remove("d-none")
            return false;
        }
        if (msg != "") {
            formBox.childNodes[7].childNodes[3].classList.add("d-none")
        }

        return true
    }
    </script>

    <!--Bootstrap Css -->
    <script src="js/main-js/bootstrap.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="vendors/ajax.custom-lib.js"></script>
    <!-- <script src="vendors/sweetalert2/dist/sweetalert2.css"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>
    <script src="js/script.js"></script>


    <!--======================================================================== -->
    <!-- Portfolio Section Jquery Start-->
    <!--======================================================================== -->

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()

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
</body>

</html>