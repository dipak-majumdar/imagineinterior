<div class="header_section">
    <div class="container-fluid">


        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                <div class="logo"><a href="/"><img src="<?= URL?>images/logo/imagine Interior-logo-2.png"></a></div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
                <?php
                $page =  $_SERVER['PHP_SELF'];
                ?>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link <?php if (str_contains($page, 'index')) { echo 'active'; }?>" href="<?php echo URL ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (str_contains($page, 'services')) { echo 'active'; }?>" href="<?php echo URL ?>services.php">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (str_contains($page, 'portfolio')) { echo 'active'; }?>" href="<?php echo URL ?>portfolio.php">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (str_contains($page, 'about')) { echo 'active'; }?>" href="<?php echo URL ?>about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (str_contains($page, 'blog')) { echo 'active'; }?>" href="<?php echo URL ?>blog.php">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (str_contains($page, 'contact')) { echo 'active'; }?>" href="<?php echo URL ?>contact.php">Contact</a>
                        </li>
                        <li class="nav-item call_us">
                            <a onmouseover="greenIcon(this)" onmouseout="whiteIcon(this)" class="nav-link"
                                href="tel:7699753019"><img id="call_icon" class="call_icon"
                                    src="images/icons/call-icon-white.png" alt=""> Call Us</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </div>
</div>