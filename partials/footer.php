<div class="footer_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-12">
                <div class="fooer_logo"><img src="images/logo/imagine-Interior-footer-logo-2.png"></div>
                <p class="footer_dsc">There are many variat
                    ions of passages of L
                    orem Ipsum available
                    , but the majority h
                    ave suffered altera
                    tion in some form, by
                </p>
            </div>
            <div class="col-lg-4 col-sm-6">
                <h1 class="customer_text">Address</h1>
                <ul class="footer_dsc">
                    <li>
                        <a href="tel:<?php echo $site['contact1']; ?>"><img class="footer_cont_icon" src="images\icons\call-icon-white.png" alt="">
                            <?php echo $site['contact1']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:<?php echo $site['email']; ?>"><img class="footer_cont_icon" src="images\icons\mail-icon-white.png" alt="">
                            <?php echo $site['email']; ?>
                        </a>
                    </li>
                    <li>
                        <a href=""><img class="footer_cont_icon" src="images\icons\location-icon-white.png" alt="">
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
                    <li><a href="">Services</a></li>
                    <li><a href="">Portfolio</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">Terms & Conditions</a></li>

                </ul>
            </div>
        </div>
        <div class="input-group mb-3 subscribe_sec">
            <input type="text" class="form-control" placeholder="Enter your email" aria-label="Enter your email"
                aria-describedby="basic-addon2">
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
        </div>
    </div>
    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container py-3">
            <div class="d-flex ">
                <p class="copyright_text col-md-6">2022 All Rights Reserved.
                    <!-- Design by <a href="https://html.design">Free html  Templates</a> -->
                </p>
                <div class="footer_social_icon col-md-6">
                    <ul>
                        <li><a href="#"><img src="images/social-media-icons/facebook2x.png"></a></li>
                        <li><a href="#"><img src="images/social-media-icons/instagram2x.png"></a></li>
                        <li><a href="#"><img src="images/social-media-icons/pinterest2x.png"></a></li>
                        <li><a href="#"><img src="images/social-media-icons/twitter2x.png"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>