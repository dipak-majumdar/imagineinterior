<?php
require_once "./inc/reqHeader.php";

require_once "./classes/services.class.php";

$Services   = new Services();

// echo '<pre>';
// print_r($_GET);exit;

if (isset($_GET['slug'])) {
    $serviceSlug = $_GET['slug']; 
}

$service = $Services->showServiceBySlug($serviceSlug);
$serviceId         = $service['id'];
$serviceName       = $service['name'];
$serviceSlug       = $service['slug'];
$serviceDesc       = $service['descreption'];
$fullContent       = $service['content'];
$child_services    = $service['child_services'];
$projects_nos      = $service['projects_nos'];
$serviceIcon       = $service['icon'];
$serviceStatus     = $service['status'];
$serviceEdited     = $service['edited'];
$serviceCreated    = $service['created'];

$childServices  = $Services->activeChildServicesByParent($serviceId);
// print_r($service);

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
    <title>Services - <?php echo SITE_NAME; ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?= URL?>css/main-css/bootstrap.css">

    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="<?= URL?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= URL?>css/services.css">
    <link rel="stylesheet" type="text/css" href="<?= URL?>css/custom-style.css">

    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/logo/<?= $favcon ?>" type="image/gif" />
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

    <!-- services section start -->
    <div class="mt-5">
        <?php // require_once "incs/our-services.php"; ?>
        <div class="page_heading_sec mt-2 mt-md-3 mb-3 p-5">
            <h1 class="sec_heading"><?= $serviceName ?></h1>
            <p class="sec_heading_dsc"><?= $serviceDesc ?></p>
        </div>
        <div class="services_section layout_padding pt-0">
            <div class="container">

                <div class="new_section sub_layout_padding service_content">
                    <?= $fullContent; ?> 
                </div>
                <?php
                if (count($childServices) > 0) {
                ?>
                <div class="services_section3 sub_layout_padding">

                    <div class="new_section mb-4 pt-0">
                        <h3 class="fs-3 text-center text-md-start">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                        <p class="small_para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae
                            odio,
                            esse sunt, nisi impedit
                            fugit veritatis dolorem totam dicta saepe autem repudiandae? Nobis eveniet sunt velit sit
                            ipsum voluptates ut iure odio nihil molestias! Soluta quae ullam ipsa aut voluptatibus
                            molestias, maiores illo magni provident aspernatur, sit minus ducimus recusandae! Ex,
                            laboriosam quisquam. Debitis sit ea et, eos illum molestias animi odio! Ad similique fugiat
                            consequuntur recusandae rem quod reprehenderit architecto soluta, necessitatibus, cum, neque
                            repudiandae ullam aperiam. Ratione totam sunt id magni rem reiciendis nihil omnis! Quae
                            veritatis, illo sunt inventore aspernatur neque commodi ex soluta suscipit delectus dolorum
                            repudiandae exercitationem, eius accusantium sit doloribus reprehenderit voluptates
                            consequuntur officiis libero iusto eaque non unde? Illum!</p>
                    </div>

                    <div class="row mt-5">
                        <?php
                            foreach ($childServices as $eachChild) {
                                echo '<div class="col-6 col-md-2">
                                        <a href="'.URL.'projects/'.$eachChild['slug'].'">
                                            <div class="serv_dtls">
                                                <img src="'.URL.'images/services/'.$eachChild['icon'].'" alt="">
                                            <p >'.$eachChild['name'].'</p>
                                            <span class="viewbtn">View</span>
                                            </div>
                                        </a>
                                    </div>';
                            }
                        ?>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>

    </div>

    <div class="new_section layout_padding px-2 px-md-0">
        <div class="">
            <!-- bg_dark_white -->
            <div class="container">
                <h2 class="sub_headig fs-2 fw-semibold">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>
                <p class="sec_heading_dsc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint,
                    incidunt placeat! Quisquam sunt modi soluta aliquam nobis, consectetur iure mollitia doloremque
                    labore distinctio iusto minus?
                </p>
            </div>

            <div class="container-fluid">
                <div class="row justify-content-center mt-4">

                    <div class="col-12 col-md-5 m-2 mini_sec">
                        <div class="d-sm-none d-block">
                            <img src="<?= IMGURL?>services/bedroom.png" alt="">
                        </div>
                        <h4 class="fs-4 text-center text-md-start">Lorem ipsum dolor sit.</h4>
                        <div class="d-flex align-items-center">
                            <img class="d-none d-sm-inline-flex" src="<?= IMGURL?>services/bedroom.png" alt="">
                            <p class="">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Distinctio est numquam soluta
                                odit necessitatibus aliquid animi quibusdam optio perspiciatis id quia tempora
                                repellendus labore, doloremque, possimus, ut earum iusto quo.</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-5 m-2 mini_sec">
                        <div class="d-sm-none d-block">
                            <img src="<?= IMGURL?>services/bedroom.png" alt="">
                        </div>
                        <h4 class="fs-4">Lorem ipsum dolor sit.</h4>
                        <div class="d-flex align-items-center">
                            <img class="d-none d-sm-inline-flex" src="<?= IMGURL?>services/bedroom.png" alt="">
                            <p class="">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Distinctio est numquam soluta
                                odit necessitatibus aliquid animi quibusdam optio perspiciatis id quia tempora
                                repellendus labore, doloremque, possimus, ut earum iusto quo.</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-5 m-2 mini_sec">
                        <div class="d-sm-none d-block">
                            <img src="<?= IMGURL?>services/bedroom.png" alt="">
                        </div>
                        <h4 class="fs-4">Lorem ipsum dolor sit.</h4>
                        <div class="d-flex align-items-center">
                            <img class="d-none d-sm-inline-flex" src="<?= IMGURL?>services/bedroom.png" alt="">
                            <p class="">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Distinctio est numquam soluta
                                odit necessitatibus aliquid animi quibusdam optio perspiciatis id quia tempora
                                repellendus labore, doloremque, possimus, ut earum iusto quo.</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-5 m-2 mini_sec">
                        <div class="d-sm-none d-block">
                            <img src="<?= IMGURL?>services/bedroom.png" alt="">
                        </div>
                        <h4 class="fs-4">Lorem ipsum dolor sit.</h4>
                        <div class="d-flex align-items-center">
                            <img class="d-none d-sm-inline-flex" src="<?= IMGURL?>services/bedroom.png" alt="">
                            <p class="">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Distinctio est numquam soluta
                                odit necessitatibus aliquid animi quibusdam optio perspiciatis id quia tempora
                                repellendus labore, doloremque, possimus, ut earum iusto quo.</p>
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