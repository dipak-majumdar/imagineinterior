<div class="contact_form_bx form mx-auto mb-5">
    <div class="form-background">
        <div class="contact-container">
            <div class="screen">
                <div class="screen-header">
                </div>
                <div class="screen-body">
                    <div class="screen-body-item left">
                        <div class="app-title">
                            <span>CONTACT US</span>
                        </div>
                        <div class="contact-dtls">
                            <div class="app-contact-title">Contact Info:</div>
                            <div class="app-contact mt-2">
                                <img src="<?= URL ?>images/icons/call-icon-pink.png" alt="">
                                <a href="tel:<?php echo $site['contact1']; ?>"><?php echo $site['contact1']; ?></a>
                            </div>
                            <div class="app-contact">
                                <img src="<?= URL ?>images/icons/mail-icon-pink.png" alt="">
                                <a href="mailto:<?php echo $site['email']; ?>"><?php echo $site['email']; ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="screen-body-item">
                        <?php
                        if (isset($_GET['cform'])) {
                            if ($_GET['cform'] == 1) {
                                echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> We will get back to you soon.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }
                        }
                        ?>
                        <div class="app-form">
                            <form action="ajax/contact-form-submit.ajax.php" method="POST" onsubmit="return validateForm()" name="contactForm">

                                <div class="app-form-group">
                                    <input class="app-form-control contact-input" name="name" id="name" placeholder="NAME">
                                    <span class="text-danger d-none">Please Enter Full Name.</span>
                                </div>

                                <div class="app-form-group">
                                    <input class="app-form-control contact-input" name="email" id="email" placeholder="EMAIL">
                                    <span class="text-danger d-none">Please Enter Email Address.</span>
                                </div>

                                <div class="app-form-group">
                                    <input class="app-form-control contact-input" name="contact-no" id="contact-no" placeholder="CONTACT NO">
                                    <span class="text-danger d-none">Please Enter Correct Number.</span>
                                </div>

                                <div class="app-form-group message">
                                    <input class="app-form-control contact-input" name="msg" id="msg" placeholder="MESSAGE">
                                    <span class="text-danger d-none">Please Write Your Message Here.</span>
                                    <!-- <span class="text-danger d-none">Write Message with Minimum 30 Characters.</span> -->
                                </div>
                                <div class="app-form-group buttons">
                                    <button name="contactSubmit" class="app-form-button contact-button">SEND</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>