<div class="<?php the_cc_css_classes( 'card' ); ?>">
    <?php if ( get_cc_data( 'image' ) ) : ?> <a class="card-img-top" href="<?php the_cc_data( 'url', 'esc_url' ); ?>" <?php the_cc_target(); ?>>
					<?php the_cc_image( 'full' ); ?>
				</a>
        <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title"> 
			<?php the_cc_data( 'title' ); ?>
		</h5>
                <p class="card-text">
                    <?php the_cc_data( 'description' ); ?>
                </p>
            </div>
            <div class="card-footer">
                <?php if ( get_cc_data('favicon') ) : ?><img src="<?php the_cc_data( 'favicon', 'esc_url' ); ?>" alt="<?php the_cc_data( 'site_name', 'esc_attr' ); ?>" class="content_cards_favicon" />
                    <?php endif; ?>
                        <?php the_cc_data( 'site_name' ); ?>
            </div>
</div>