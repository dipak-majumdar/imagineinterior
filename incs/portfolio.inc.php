<!-- portfolio section start  -->
<div class="portfolio_section px-2 px-md-0 pb-4 mt-0">
    <div class="container">

        <!-- row start -->
        <div class="row">
            <!-- Category column start -->
            <div class="col-md-12 text-center mb-5">
                <?php
                if (count($showServices) > 0) {
                ?>
                    <button type="button" class="btn btn-outline-primary rounded-0 mt-2 filter mx_sm_gp" data-rel="all">All</button>
                    <?php
                        foreach ($showServices as $eachService) {
                            // print_r($eachChild['name']);
                            echo '
                            <button type="button" class="btn btn-outline-primary rounded-0 mt-2 filter mx_sm_gp" data-rel="'.$eachService['id'].'">'.$eachService['name'].'</button>
                            ';
                        }
                }
                    ?>
            </div>
            <!-- Category column start -->

        </div>
        <!-- row end -->

        <!-- Gallery start -->
        <div class="gallery" id="gallery">

            <?php
                    foreach ($childServices as $eachChild) {
                        // print_r($eachChild);
                        $img = $eachChild['feature_image'];
                        if ($img == null) {
                            $img = $eachChild['icon'];
                        }
                        echo '
                        <div class="mb-3 pics animation all '.$eachChild['parent_id'].'">
                        <a href="projects/'.$eachChild['slug'].'">
                            <img class="img-fluid"
                                src="images/services/'.$img.'"
                                alt="Card image cap">

                            <section class="img_text">
                                <h3 class="text-light mt-auto">'.$eachChild['name'].'</h3>
                                <small class="text-light ">12 Aug, 2022</small>
                            </section>
                        </a>
                        </div>
                        ';
                    }
            ?>

        </div>
        <!-- Gallery end -->
    </div>
</div>
<!-- portfolio section end  -->