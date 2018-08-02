        <section class="jumbotron jumbotron-fluid bg-warning v-33 scrollify">
                            <div class="container">
                                <div class="row align-items-end">
                                    <div class="col-md-6 pr-md-4">
                                        <h2 class="display-4">Our ideas</h2>
                                        <p class="lead">Our principles don't stop at the shopfront.</p>
                                        <p>As co-operators, we believe that the principles that lie behind successful co-operatives - giving everyone an equal say and a share in the profits - out to extend to the wider economy and society.</p>
                                        <p>The Party's policy platform draws on the experience of our members, subscribing co-op societies, and our wider movement, with an opportunity for members feed in at each year's Annual Conference.</p>
                                        <?php 
                            $terms = get_terms( array(
    'taxonomy' => 'policyarea',
    'hide_empty' => false,
) );
                            if($terms):
                            echo '<form class="my-4"><h5>See where we stand on</h5><select class="selectpicker" onchange="if (this.value) window.location.href=this.value">';
                            foreach($terms as $term):
                            echo '<option class="fit-width" value="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</option>';
                            endforeach;
                            echo '</select></form>';
                            endif;
                            ?> <a href="#" class="btn-lg btn btn-danger mr-md-2">Learn more about our ideas</a><a href="/policy2017" class="btn px-5 mb-2 btn-lg mb-sm-0 btn-outline-danger">Policy process</a> </div>
                                    <div class="col-md-6 px-md-3">
                                        <?php
                            $c = 0;
                            $class= '';
                            $the_query = new WP_Query( array( 'tax_query' => array(
		array(
            'taxonomy' => 'publication_type',
			'field'    => 'term_id',
			'terms'    => 846,
        ),),
                                                             'post_type' => 'publication',
                                                             'posts_per_page' =>3 ) );
                             if ( $the_query->have_posts() ) :
                            echo '<div class="row">';
                            while ( $the_query->have_posts() ) : $the_query->the_post();
                            get_template_part( 'loop-templates/card', 'cover-publication' );
                            endwhile;
                            echo '</div>';
                            endif;?> <a class="mt-3 btn btn-outline-primary btn-lg btn-block" href="/publications">View all recent publications</a> </div>
                                </div>
                            </div>
                        </section>