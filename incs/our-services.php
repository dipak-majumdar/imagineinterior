<div class="services_section layout_padding">
    <div class="container">
        <h1 class="sec_heading">our services</h1>
        <p class="sec_heading_dsc">Elevate spaces with our comprehensive interior design services, combining style and functionality seamlessly.</p>
        <div class="new_section sub_layout_padding">
            <div class="row justify-content-evenly">
                <?php
            foreach ($allServices as $eachSearvice) {
                echo '<div class="col-lg-3 col-sm-6">
                        <a href="'.URL.'service/'.$eachSearvice['slug'].'">
                            <div class="service_icon_bx">
                                <img src="images/services/'.$eachSearvice['icon'].'">
                            </div>
                            <h2 class="service_name">'.$eachSearvice['name'].'</h2>
                            <p class="service_dsc text-center">'.$eachSearvice['descreption'].'</p>
                        </a>
                    </div>';
            }
            ?>
            </div>

        </div>
        <?php
        if (count($childServices) > 0) {
        ?>
        <div class="services_section3 sub_layout_padding">
            <h2 class="sub_headig">Lorem ipsum dolor sit amet</h2>
            <div class="row justify-content-center mt-5">
                <?php

                foreach ($childServices as $eachChild) {
                    echo '<div class="col-6 col-md-2">
                            <div class="serv_dtls">
                                <img src="images/services/'.$eachChild['icon'].'" alt="">
                                <p >'.$eachChild['name'].'</p>
                            </div>
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