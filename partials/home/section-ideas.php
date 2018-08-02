<section class="jumbotron jumbotron-fluid bg-white v-33 scrollify">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-12 pr-md-4">
                <h2 class="display-4 text-primary">Ideas to change Britain</h2>
                <?php 
                            $terms = get_terms( array(
    'taxonomy' => 'policyarea',
    'hide_empty' => false,
) );
                            if($terms):
                            echo ' <ul class="flex-grid row mb-md-3 row">';
                            foreach($terms as $term):
                $image = wp_get_attachment_image_src(get_field('banner_image', $term), 'square-md');
                            echo '<li class="flex-grid-item half image col-lg-4 col-hd-3 col-md-6 col-12"> <a style="
                                        background-image: url('. $image[0] .');"
                                        class="flex-grid-content flex-column" href="' . esc_url( get_term_link( $term ) ) . '"><h3>' . $term->name . '</h3><div class="description">' . $term->description . '</div></a></li>';
                            endforeach;
                            echo '</ul>';
                            endif;
                ?> <a href="/ideas" class="btn-lg btn btn-primary mr-md-2">Learn more about our ideas</a><a href="/publications" class="btn px-5 mb-2 btn-lg mb-sm-0 btn-outline-primary">See our recent publications</a></div>
        </div>
    </div>
</section>