<!-- Feedback Button Start -->
<style>
#mybutton {
    position: fixed;
    bottom: 50px;
    right: -35px;
    rotate: -90deg;
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
    <button class="feedback" data-bs-toggle="modal" data-bs-target="#feedbackModal">Feedback</button>
</div>
<!-- Feedback Button End -->

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="feedbackModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="feedbackModalLabel">Submit Feedback</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" class="g-3 needs-validation" novalidate>
                <div class="modal-body">

                    <div class="mb-3">
                        <input type="text" class="custom_inp form-control shadow-none" id="" placeholder="Name"
                            required>
                        <div class="invalid-feedback">
                            Name can't be blank!
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="custom_inp form-control shadow-none" id=""
                            placeholder="Email Address" required>
                        <div class="invalid-feedback">
                            Please enter yiur email here!
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea class="custom_inp form-control shadow-none" id="" style="height: 150px;"
                            placeholder="Write feedback here" required></textarea>
                        <div class="invalid-feedback">
                            Please write a feedback to us!
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="footer_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-12">
                <div class="fooer_logo"><img src="<?= IMGURL ?>logo/imagine-Interior-footer-logo-2.png"></div>
                <p class="footer_dsc">As an interior designer, we bring spaces to life with creativity and functionality.We blend colors, textures, and furniture to craft harmonious environments. By understanding clients' needs, Imagine Interior creates personalized designs that reflect their style and enhance their lifestyle. Each project is a unique journey, transforming dreams into reality.
                </p>
            </div>
            <div class="col-lg-4 col-sm-6">
                <h1 class="customer_text">Address</h1>
                <ul class="footer_dsc">
                    <li>
                        <a href="tel:<?php echo $site['contact1']; ?>">
                            <img class="footer_cont_icon" src="<?= IMGURL ?>icons/call-icon-white.png" alt="">
                            <?php echo $site['contact1']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:<?php echo $site['email']; ?>">
                            <img class="footer_cont_icon" src="<?= IMGURL ?>/icons/mail-icon-white.png" alt="">
                            <?php echo $site['email']; ?>
                        </a>
                    </li>
                    <li>
                        <a href=""><img class="footer_cont_icon" src="<?= IMGURL ?>icons/location-icon-white.png"
                                alt="">
                            <?php
                                    $comma = ', ';
                                    if ($site['address1'] == null) {
                                        $comma = '';
                                    }
                                    echo $site['address1'].$comma.$site['address2'];
                                ?>
                            <br>
                            <span class="ms-4">
                                <?php
                                    $comma = ', ';
                                    if ($site['city'] == null) {
                                        $comma = '';
                                    }
                                    echo $site['city'].$comma.$site['state'];
                                ?>
                            </span>
                            <br>
                            <span class="ms-4">
                                <?php
                                    $comma = ', ';
                                    if ($site['pin'] == null) {
                                        $comma = '';
                                    }
                                    echo $site['pin'].$comma.$site['country'];
                                ?>
                            </span>
                        </a>
                    </li>
                    <!-- <li><a href=""><img src="" alt="">Kolkata, 700124</a></li> -->
                    <!-- <li><a href=""><img src="" alt="">West Bengal, India</a></li> -->
                </ul>
            </div>
            <div class="col-lg-3 col-sm-6">
                <h1 class="customer_text">INFORMATION</h1>
                <ul class="footer_dsc">
                    <li><a href="<?= URL ?>services">Services</a></li>
                    <li><a href="<?= URL ?>portfolio">Portfolio</a></li>
                    <li><a href="<?= URL ?>about">About Us</a></li>
                    <li><a href="<?= URL ?>blog">Blog</a></li>
                    <li><a href="<?= URL ?>contact">Contact</a></li>
                    <li><a href="<?= URL ?>terms-and-conditions">Terms & Conditions</a></li>

                </ul>
            </div>
        </div>
        <div class="input-group mb-3 subscribe_sec">
            <input type="text" class="form-control shadow-none border-0" id="main-subscribe" placeholder="Enter your email"
                aria-label="Enter your email" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <span class="input-group-text cursor_pointer" id="basic-addon2" onclick="subscribeMail()">
                    Subscribe
                </span>
            </div>
        </div>
    </div>
    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container py-3">
            <div class="d-flex ">
                <p class="copyright_text col-md-6"><?= date('Y') ?> All Rights Reserved.
                    <!-- Design by <a href="https://html.design">Free html  Templates</a> -->
                </p>
                <div class="footer_social_icon col-md-6">
                    <ul>
                        <li><a href="#"><img src="<?= IMGURL ?>social-media-icons/facebook2x.png"></a></li>
                        <li><a href="#"><img src="<?= IMGURL ?>social-media-icons/instagram2x.png"></a></li>
                        <li><a href="#"><img src="<?= IMGURL ?>social-media-icons/pinterest2x.png"></a></li>
                        <li><a href="#"><img src="<?= IMGURL ?>social-media-icons/twitter2x.png"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>