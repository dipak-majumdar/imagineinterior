<div class="services_section layout_padding">
    <div class="container">
        <h1 class="sec_heading">our services</h1>
        <p class="sec_heading_dsc">There are many variations of passages of Lorem Ipsum </p>
        <div class="new_section sub_layout_padding">
            <div class="row justify-content-evenly">
                <?php
            foreach ($allServices as $eachSearvice) {
                echo '<div class="col-lg-3 col-sm-6" data-bs-toggle="modal" data-bs-target="#contactModal">
                        <div class="service_icon_bx">
                            <img src="images/services/'.$eachSearvice['icon'].'">
                        </div>
                        <h2 class="furnitures_text">'.$eachSearvice['name'].'</h2>
                        <p class="dummy_text">'.$eachSearvice['descreption'].'</p>
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


<!-- Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="header_form border-0 shadow-none">
                    <div class="frm_heading">
                        <h2 class="text-center">Talk to designer</h2>
                    </div>
                    <form action="">
                        <div class="mb-2">
                            <input class="custom_inp" type="text" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="mb-2">
                            <input class="custom_inp" type="text" id="contact" name="contact" placeholder="Contact No">
                        </div>
                        <div class="mb-2">
                            <input class="custom_inp" type="email" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="mb-2">
                            <select class="custom_inp" name="purpose" id="purpose">
                                <option value="">Designe for</option>
                                <option value="Home">Home</option>
                                <option value="office">Office</option>
                                <option value="outdore">Outdore</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <select class="custom_inp" name="purpose" id="purpose">
                                <option value="">Budget</option>
                                <option value="1L">1L</option>
                                <option value="2L">2L</option>
                                <option value="Not Fixed">Not Fixed</option>
                            </select>
                        </div>
                        <div class="m_frm_btn d-flex my-3">
                            <button class="m-auto" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>