<?php global $class;?>
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