<section id="cd-google-map" class="jumbotron jumbotron-fluid bg-success scrollify py-0 text-primary">
    <!-- #google-container will contain the map  -->
    <div class="container py-5">
        <!-- #cd-zoom-in and #zoom-out will be used to create our custom buttons for zooming-in/out -->
        <div class="row">
            <div class="col-md-6">
                <h2 class="display-4">Across the UK</h2>
                <p class="lead">From Penzance to Perth, there are Co-operative Party members across the whole of the UK. Whether in devolved and local government, or as ordinary local party members they're working to ensure that devolution means giving local people real control over the services they use.</p>
                <div class="row my-3 text-center text-white">
                    <div class="col-4">
                        <p class=""><span class="h1 countdown">10528</span> members</p>
                    </div>
                    <div class="col-4">
                        <p class=""><span class="h1 countdown">204</span> Party branches</p>
                    </div>
                    <div class="col-4">
                        <p class=""><span class="h1 countdown">704</span> Councillors</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12"><a href="#" class="btn btn-lg btn-primary">Learn more</a> <a href="/councillors" class="ml-md-2 btn btn-lg btn-outline-primary">Stand to be a co-op councillor</a> </div>
                </div>
            </div>
            <div class="col-md-6">
                <?php /* get_template_part( 'partials/display', 'twitter' ); */ ?>
                    <ul class="hexagons">
                        <li style="mix-blend-mode:screen">
                            <div><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/local_web.png" scale="0"></div>
                        </li>
                        <li style="mix-blend-mode:lighten">
                            <div><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/local2_web.png" scale="0"></div>
                        </li>
                        <li style="mix-blend-mode:luminosity">
                            <div><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/local3_web.png" scale="0"></div>
                        </li>
                        <li style="mix-blend-mode:overlay">
                            <div><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/local4_web.png" scale="0"></div>
                        </li>
                        <li style="mix-blend-mode:lighten">
                            <div><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/local5_web.png" scale="0"></div>
                        </li>
                        <li style="mix-blend-mode:lighten">
                            <div><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/local6_web.png" scale="0"></div>
                        </li>
                        <li style="mix-blend-mode:lighten">
                            <div><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/local7_web.png" scale="0"></div>
                        </li>
                        <li style="mix-blend-mode:lighten">
                            <div><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/local8_web.png" scale="0"></div>
                        </li>
                    </ul>
            </div>
        </div>
    </div>
    <div class="overlay-fade"></div>
    <div id="google-container"> </div>
</section>