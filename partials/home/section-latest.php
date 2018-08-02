<section class="jumbotron d-flex jumbotron-fluid bg-white scrollify v-75">
    <div class="container align-self-center">
        <div class="row">
            <h2 class="col mb-3 display-4 text-muted">Latest</h2></div>
        <div class="row align-items-start">
            <div class="col-lg-6">
                <?php
                            $c = 0;
                            $class= '';
                            $sticky = get_option('sticky_posts');                
                            $the_query = new WP_Query( array( 'cat' => 3, 'posts_per_page' =>4, 'post__in' => $sticky ) );
                            if ( $the_query->have_posts() ) : ?>
                    <div id="carouselExampleIndicators" class="carousel slide py-1" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <?php  while ( $the_query->have_posts() ) : $the_query->the_post();
                                        $c++;
                                        $class = ($c == 1) ? 'active' : '';
                                        ?>
                                <div class="carousel-item <?php echo $class;?>">
                                    <div class="col-md-12 post-thumb-wrap p-0">
                                        <a href="<?php the_permalink();?>">
                                            <?php 
        echo get_the_post_thumbnail( $post->ID, '16by9', array( 'class' => 'img-fluid m-0' )  ); ?>
                                                <div class="carousel-caption d-none d-md-block">
                                                    <?php the_title( '<h4>','</h4>' ); ?> </div>
                                        </a>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                        <ol class="outside carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>
                    </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <?php
                            $c = 0;
                            $class= '';
                            $the_query = new WP_Query( array( 'cat' => 3, 'posts_per_page' =>3, 'ignore_sticky_posts' =>1, 'post__not_in' => $sticky ) );
                            if ( $the_query->have_posts() ) :
                            while ( $the_query->have_posts() ) : $the_query->the_post();
                                        $c++;
                                        $class = ($c == 1) ? 'active' : '';
                                         get_template_part( 'loop-templates/list', 'small-post' );
                            endwhile; endif;?>
                        <div class="col mt-3 align-self-end"><a href="/blog" class="btn btn-block btn-lg btn-secondary text-muted">View all recent blog posts</a></div>
                </div>
            </div>
        </div>
        <?php wp_reset_postdata();
                    endif;?>
    </div>
</section>